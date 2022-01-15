<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function getNomeApp(){
        $stmt = $this->db->prepare("SELECT nome_app from azienda");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAppInfo($nome_app){
        $sql = "SELECT i.via, i.numero_civico, i.citta, i.cap, a.nome_azienda,
        a.email from indirizzo i,azienda a where a.nome_app = ? and i.via = a.via 
        and i.cap = a.cap and i.numero_civico = a.numero_civico;";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s",$nome_app);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLink($nome_app){
        $stmt = $this->db->prepare("SELECT link from link where nome_app = ?");
        $stmt->bind_param("s",$nome_app);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAziendaAgricolaInfo() {
        $stmt = $this->db->prepare("SELECT a.nome_azienda, u.nome,u.cognome,u.immagine, a.descrizione
         from utente u, azienda_agricola a, agricoltore agr where a.nome_azienda = agr.nome_azienda
         and agr.username = u.username");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getAziendaAgrByName($nomeAzienda){
        $stmt = $this->db->prepare("SELECT a.nome_azienda, a.descrizione, a.via, a.numero_civico, a.cap,
        i.citta from azienda_agricola a, indirizzo i where i.cap =a.cap and a.nome_azienda =?");
        $stmt->bind_param("s",$nomeAzienda);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

   public function getAgricoltoreOfAzienda($nomeAzienda) {
    $stmt = $this->db->prepare("SELECT u.immagine, u.num_telefono, u.email, u.nome, u.cognome from utente u, agricoltore a
     where a.nome_azienda = ? and a.username = u.username");
    $stmt->bind_param("s",$nomeAzienda);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);

   }
   public function checkLogin($username, $password){
    $query = "SELECT immagine, username FROM utente WHERE username = ? AND password = ?";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param('ss',$username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}

    public function checkAgricoltore($username) {
        $query = "SELECT  username FROM agricoltore WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMessaggi($username) {
        $query = "SELECT  testo,data,ora, tag_letto FROM messaggio WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getZuccaByName($nome_zucca){
        $query="SELECT * from zucca z where z.nome_zucca=? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$nome_zucca);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getPopularPumpkins(){
        $query="SELECT * FROM comprende,zucca WHERE comprende.nome_zucca=zucca.nome_zucca ORDER BY quantita ASC LIMIT 2";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getFirstPumpkin(){
        $query = "SELECT * FROM comprende,zucca WHERE  comprende.nome_zucca=zucca.nome_zucca ORDER BY quantita DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllPumpkins(){
        $query = "SELECT * FROM zucca";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllFarmers(){
        $query = "SELECT * FROM agricoltore";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getVendite($nome_azienda){
        $query = "SELECT data, sum(quantita) as quantita FROM comprende WHERE nome_azienda = ? GROUP BY data ORDER BY data ASC";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nome_azienda);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAziendaByUsername($username){
        $query = "SELECT nome_azienda  FROM agricoltore WHERE username = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insertNewUser($immagine = null, $num_telefono = null, $email = null,  $username = null, $password = null, $nome = null, $cognome = null){
        $query = "INSERT INTO `utente` (`immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param($immagine, $num_telefono, $email,  $username, $password, $nome, $cognome);
        $stmt->execute();
        
        return $stmt->insert_id;

    }

    public function getAllOrders($nome_azienda){
        $query = "SELECT c.nome_zucca, c.quantita,c.data,z.prezzo,u.nome,u.cognome,o.via, o.numero_civico,
        o.cap   FROM ordine o, comprende c,zucca z,utente u
         WHERE c.nome_azienda =? and z.nome_azienda = c.nome_azienda and c.nome_zucca = z.nome_zucca 
         and u.username = c.username and o.data_ordine=c.data and o.ora = c.ora
         order by c.data desc";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $nome_azienda);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

 

}
?>
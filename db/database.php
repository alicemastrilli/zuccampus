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

    
    public function getUserByUsername($username){
        $stmt = $this->db->prepare("SELECT nome,cognome,immagine from utente where username =?");
        $stmt->bind_param("s",$username);
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
        $query = "SELECT  * FROM messaggio WHERE username = ? order by data asc";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertMessage($username, $testo, $data, $ora, $link, $tag_letto){
        $query = "INSERT INTO messaggio (username, testo, data, ora, link, tag_letto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssi',$username, $testo, $data, $ora, $link, $tag_letto);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function checkMessage($username, $data, $ora){
        $query = "SELECT username, data, ora FROM messaggio WHERE username = ? AND data = ? and ora= ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss',$username, $data, $ora);
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
        $query = "SELECT o.data_ordine, sum(c.quantita) as quantita FROM comprende c, ordine o
         WHERE c.nome_azienda = ? and c.id_ordine = o.id_ordine GROUP BY o.data_ordine ORDER BY o.data_ordine ASC";
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

    //TO DO: da gestire  le var cliente e agricoltore, non dovrebbero essere NULL
    public function insertNewUser($immagine = null, $num_telefono = null, $email = null,  $username = null, $password = null, $nome = null, $cognome = null, $cliente = null, $agricoltore = null){
        $query = "INSERT INTO `utente` ( `immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdsssssss', $immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
        $stmt->execute();
        
        if($stmt->execute()){
            $msg = "Insert succeded";
        }
        else {
            $msg = $stmt->error;
        }
        return $msg;
    }

    public function insertNewAgricoltore($username = null, $nome_azienda = null){
        $query = "INSERT INTO agricoltore (username, nome_azienda) VALUES  (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $nome_azienda);
        $stmt->execute();
        


        return $stmt->insert_id;
    }

    public function insertNewAzienda($nome_azienda = NULL, $via = NULL, $numero_civico = NULL, $cap = NULL, $descrizione = NULL){
        $query = "INSERT INTO `azienda_agricola` (`nome_azienda`, `via`, `numero_civico`, `cap`, `descrizione`) VALUES  (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param($nome_azienda, $via, $numero_civico, $cap, $descrizione);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function getAllOrders($nome_azienda, $n=-1){
        $query = "SELECT c.nome_zucca, c.id_ordine, c.quantita,o.data_ordine,o.ora, z.prezzo,u.nome,u.cognome,o.via, o.numero_civico,
        o.cap   FROM ordine o, comprende c,zucca z,utente u
         WHERE c.nome_azienda =? and z.nome_azienda = c.nome_azienda and c.nome_zucca = z.nome_zucca 
          and o.id_ordine = c.id_ordine and o.username = u.username
         order by o.data_ordine desc";
         if($n >0){
            $query .= " LIMIT ?";
         }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('si', $nome_azienda,$n);
        } 
        else{
        $stmt->bind_param('s', $nome_azienda);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderById($id){
        $query = "SELECT c.nome_zucca, c.id_ordine, c.quantita,o.username, o.data_ordine,o.ora,z.prezzo, z.tipo, u.nome,u.cognome,o.via, o.numero_civico,
        o.cap   FROM ordine o, comprende c,zucca z,utente u
         WHERE c.id_ordine =? and z.nome_azienda = c.nome_azienda and c.nome_zucca = z.nome_zucca 
          and o.id_ordine = c.id_ordine and o.username = u.username
         order by o.data_ordine desc";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewZucca($nome_azienda = null, $nome_zucca = null, $tipo = null,  $immagine = null, $prezzo = null, $peso = null, $disponibilita = null, $descrizione_zucca = null){
        $query = "INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssiiis', $nome_azienda, $nome_zucca, $tipo,  $immagine, $prezzo, $peso, $disponibilita, $descrizione);
        $stmt->execute();
        
        if($stmt->execute()){
            $msg = True;
        }
        else {
            $msg = $stmt->error;
        }
        return $msg;
    }

}
?>
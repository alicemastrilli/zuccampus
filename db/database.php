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

}
?>
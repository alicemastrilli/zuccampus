<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
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
        a.email from indirizzo i,azienda a where a.nome_app = ? and i.nome_app = a.nome_app";
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
        $stmt = $this->db->prepare("SELECT a.nome_azienda, u.nome,u.cognome, a.descrizione
         from utente u, azienda_agricola a, agricoltore agr where a.nome_azienda = agr.nome_azienda
         and agr.username = u.username");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

   


}
?>
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
        $stmt = $this->db->prepare("SELECT nome,cognome,immagine,email,num_telefono, password from utente where username =?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

   public function getAgricoltoreOfAzienda($nomeAzienda) {
    $stmt = $this->db->prepare("SELECT u.username,u.immagine, u.num_telefono, u.email, u.nome, u.cognome from utente u, agricoltore a
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
        $query = "SELECT  AGRICOLTORE FROM utente WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkStudente($username) {
        $query = "SELECT  matricola FROM cliente WHERE username = ?";
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
    public function updateMessageAsRead($id_messaggio){
        $query = "UPDATE messaggio SET tag_letto = 1 WHERE id_messaggio = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id_messaggio);
        
        return $stmt->execute();
    }
    public function checkMessage($username, $data, $ora, $testo){
        $query = "SELECT username, data, ora FROM messaggio WHERE username = ? AND data = ? and ora= ? and testo=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss',$username, $data, $ora, $testo);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPaymentInfo($username){
        $query = "SELECT * FROM carta_di_credito WHERE username = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getZuccaByName($nome_zucca){
        $query="SELECT * from zucca z where z.nome_zucca=? LIMIT 1 ";
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
        $query = "SELECT * FROM zucca GROUP BY nome_zucca";
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
    public function insertNewUser($immagine = null, $num_telefono = null, $email = null,  $username = null, $password = null, $nome = null, $cognome = null, $cliente, $agricoltore){
        $query = "INSERT INTO `utente` ( `immagine`, `num_telefono`, `email`, `username`, `password`, `nome`, `cognome`, `cliente`, `agricoltore`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdsssssss', $immagine, $num_telefono, $email,  $username, $password, $nome, $cognome, $cliente, $agricoltore);
        $ris=$stmt->execute();
        
        if($ris){
            $msg = 1;
        }
        else {
            $msg = $stmt->error;
        }
        return $msg;
    }

    public function updateUser($immagine, $num_telefono, $email, $password, $nome, $cognome, $cliente, $agricoltore, $username){
        $query = "UPDATE utente SET immagine = ?, num_telefono = ?, email = ?, password = ?, nome = ?, cognome = ?, cliente = ?, agricoltore = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sdsssssss', $immagine, $num_telefono, $email, $password, $nome, $cognome, $cliente, $agricoltore, $username);
        
        return $stmt->execute();
    }

    public function insertNewAgricoltore($username = null, $nome_azienda = null){
        $query = "INSERT INTO agricoltore (username, nome_azienda) VALUES  (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $username, $nome_azienda);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $msg;
    }
    public function updateAgricoltore($nome_azienda, $username){
        $query = "UPDATE agricoltore SET nome_azienda = ? WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$nome_azienda, $username);
        
        return $stmt->execute();
    }

    public function insertNewIndirizzo($via = null, $numero_civico = null, $citta = null, $cap = null){
        $query = "INSERT INTO `indirizzo` (`via`, `numero_civico`, `citta`,`cap`) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sisi', $via, $numero_civico, $citta, $cap);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $msg;
    }

    public function updateIndirizzo($numero_civico, $citta, $cap, $via){
        $query = "UPDATE indirizzo SET numero_civico = ?, citta = ?, cap = ? WHERE via = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sisi', $numero_civico, $citta, $cap, $via);
        
        return $stmt->execute();
    }

    public function insertNewAzienda($nome_azienda = NULL, $via = NULL, $numero_civico = NULL, $cap = NULL, $descrizione = NULL, $citta){   
        $flag = $this->insertNewIndirizzo($via, $numero_civico, $citta, $cap);
        if ($flag){
            $query = "INSERT INTO `azienda_agricola` (`nome_azienda`, `via`, `numero_civico`, `cap`, `descrizione`) VALUES  (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssiis', $nome_azienda, $via, $numero_civico, $cap, $descrizione);
            $ris = $stmt->execute();

            if($ris) $msg = 1;
            else $msg = 0;
            
        }
        else $msg = 0;
        
        return $msg;
    }

    public function updateAzienda($via, $numero_civico, $cap, $descrizione, $nome_azienda){
        $query = "UPDATE azienda_agricola SET  via = ?, numero_civico = ?,  cap = ?, descrizione = ? WHERE nome_azienda = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('siiss', $via, $numero_civico, $cap, $descrizione, $nome_azienda);
        
        return $stmt->execute();
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

    public function getUserOrders($username, $n=-1){
        $query = "SELECT o.username ,c.nome_zucca, c.id_ordine, c.quantita,o.data_ordine,o.ora, z.prezzo,u.nome,u.cognome,o.via, o.numero_civico,
        o.cap   FROM ordine o, comprende c,zucca z,utente u
         WHERE o.username =? and u.username = o.username and o.id_ordine = c.id_ordine and z.nome_azienda = c.nome_azienda and c.nome_zucca = z.nome_zucca 
          order by o.data_ordine desc";
          if($n >0){
            $query .= " LIMIT ?";
         }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('si', $username,$n);
        } 
        else{
        $stmt->bind_param('s', $username);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function insertNewZucca($nome_azienda = null, $nome_zucca = null, $tipo = null,  $immagine = null, $prezzo = null, $peso = null, $disponibilita = null, $descrizione_zucca = null){
        $query = "INSERT INTO `zucca` (`nome_azienda`, `nome_zucca`, `tipo`, `immagine`, `prezzo`, `peso`, `disponibilita`, `descrizione_zucca`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssiiis', $nome_azienda, $nome_zucca, $tipo,  $immagine, $prezzo, $peso, $disponibilita, $descrizione_zucca);
        $ris = $stmt->execute();
        
        if($ris){
            $msg = True;
        }
        else {
            $msg = $stmt->error;
        }
        return $msg;
    }

    public function updateZucca($immagine, $prezzo, $peso, $disponibilita, $descrizione_zucca, $nome_azienda, $nome_zucca, $tipo){
        $query = "UPDATE zucca SET immagine = ?, prezzo = ?,  peso = ?, disponibilita = ?, descrizione_zucca = ? WHERE nome_azienda = ? AND nome_zucca = ? AND tipo = ?";
        $stmt = $this->db->prepare($query);
        if($stmt){
            $stmt->bind_param('siiissss',$immagine, $prezzo, $peso, $disponibilita, $descrizione_zucca, $nome_azienda, $nome_zucca, $tipo);
            return $stmt->execute();
        }
        else{
            $error = $this->db->errno.''.$this->db->error; 
            echo $error;
        }
        
        
    }

    public function getOrderById($id){
        $query = "SELECT c.nome_zucca, c.nome_azienda, c.id_ordine, c.quantita,o.username, o.data_ordine,o.ora,z.prezzo, z.tipo, u.nome,u.cognome,o.via, o.numero_civico,
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

    public function orderByPriceUp(){
        $query = "SELECT * FROM zucca GROUP BY nome_zucca ORDER BY prezzo ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function orderByPriceDown(){
        $query = "SELECT * FROM zucca GROUP BY nome_zucca ORDER BY prezzo DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByFarmer($nome_azienda){
        $query="SELECT * FROM zucca WHERE nome_azienda = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$nome_azienda);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProduttoriByZuccaName($nome_zucca){
        $query = "SELECT * FROM zucca z WHERE z.nome_zucca = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$nome_zucca);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByCategory($tipo){
        $query = "SELECT * FROM zucca z WHERE z.tipo = ? GROUP BY z.nome_zucca ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s",$tipo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductByFarmerAndName($nome_azienda, $nome_zucca){
        $query = "SELECT * FROM zucca z WHERE z.nome_azienda = ? AND z.nome_zucca = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$nome_azienda,$nome_zucca);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteFarmerElement($nome_azienda, $nome_zucca){
        $query = "DELETE FROM zucca WHERE nome_azienda = ? AND nome_zucca = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$nome_azienda, $nome_zucca);
        $ris = $stmt->execute();
        if($ris){
            return true;
        }
        else{
            return $stmt->error;
        }
    }

    public function getAllReviews($nome_zucca){
        $query = "SELECT * FROM recensione r WHERE r.nome_zucca = ? ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nome_zucca);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecensioneFromAzienda($nome_azienda){
        $query = "SELECT * FROM recensione r WHERE r.nome_azienda = ? order by data desc ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nome_azienda);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRecensioneFromCliente($username){
        $query = "SELECT * FROM recensione r WHERE r.username = ? order by data desc ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProduttore($nome_zucca){
        $query="SELECT nome_azienda from zucca z where z.nome_zucca=? LIMIT 1 ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nome_zucca);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrdersOfUser($username,$nome_azienda,$nome_zucca){
        $query="SELECT o.id_ordine, o.username, c.id_ordine, c.nome_zucca, c.nome_azienda  FROM ordine o, comprende c WHERE o.username = ? AND o.id_ordine = c.id_ordine AND c.nome_azienda = ? AND c.nome_zucca = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss',$username,$nome_zucca,$nome_azienda);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewCC($cvv, $nome, $numero_carta, $mese_scadenza, $anno_scadenza, $cognome, $username){
        $query = "INSERT INTO carta_di_credito (cvv, nome, numero_carta, mese_scadenza, anno_scadenza, cognome, username) VALUES  (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('isiiiss', $cvv, $nome, $numero_carta, $mese_scadenza, $anno_scadenza, $cognome, $username);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $msg;
    }

    public function insertNewOrdine($username, $data_ordine, $ora, $via, $numero_civico, $cap){
        $query = "INSERT INTO ordine (username, data_ordine, ora, via, numero_civico, cap) VALUES  (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssii', $username, $data_ordine, $ora, $via, $numero_civico, $cap);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $stmt->insert_id;
    }

    public function insertComprende($id_ordine, $nome_azienda, $nome_zucca, $quantita){
        $query = "INSERT INTO comprende (id_ordine, nome_azienda, nome_zucca, quantita) VALUES  (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issi', $id_ordine, $nome_azienda, $nome_zucca, $quantita);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $msg;
    }
    

    public function insertNewRecensione($descrizione, $punteggio, $nome_azienda, $nome_zucca, $username, $data){
        $query = "INSERT INTO recensione (descrizione, punteggio, nome_azienda, nome_zucca, username, data) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sissss', $descrizione, $punteggio,  $nome_azienda, $nome_zucca, $username, $data);
        $ris = $stmt->execute();
        
        if($ris) $msg = 1;
        else $msg = $stmt->error;
    
        return $msg;
    }

    public function getOrderId($username){
        $query = "SELECT id_ordine FROM ordine o WHERE o.username=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>
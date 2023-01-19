<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    public function getRandomPosts($n){
        $stmt = $this->db->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
    * User CRUD
    */

    public function getUserById($userId) {
        $query = "
            SELECT username, imgProfilo 
            FROM utente
            WHERE id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserFriendsById($userId) {
        $query = "
            SELECT u.id, u.username
            FROM segui s INNER JOIN utente u ON s.idSeguito = u.id
            WHERE s.idSeguace = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotificationsById($userId) {
        $query = "
            SELECT n.tipo, n.testo, p.id as postId, ui.username, ui.id as userId
            FROM notifica n INNER JOIN post p ON p.id = n.idPost INNER JOIN utente ui ON ui.id = n.idUtenteInvio
            WHERE n.idUtenteRiceve = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Post CRUD
     */

    public function getPosts($n=-1){
        $query = "
            SELECT u.id, u.username, u.imgProfilo, t.id, t.nome, p.dataora, p.testo, p.immagine, p.mipiace, p.commenti
            FROM post p INNER JOIN utente u ON p.idUtente = u.id INNER JOIN tema t ON p.idTema = t.id 
            WHERE abilitato = 1
        ";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT idautore, username, nome FROM autore WHERE attivo=1 AND username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    

}
?>
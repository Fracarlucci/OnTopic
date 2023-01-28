<?php
class DatabaseHelper{
    public $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }        
    }

    /**
    * User CRUD
    */

    public function getUserById($userId) {
        $query = "
            SELECT username, imgProfilo, nome, cognome
            FROM utente
            WHERE id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsersByUsername($slug) {
        $query = "
            SELECT id, username, imgProfilo 
            FROM utente
            WHERE username = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$slug);
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

    public function getSeguitiById($userId) {
        $query = "
            SELECT u.id, u.username
            FROM segui s INNER JOIN utente u ON s.idSeguito = u.id
            WHERE u.id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSeguaciById($userId) {
        $query = "
            SELECT u.id, u.username
            FROM segui s INNER JOIN utente u ON s.idSeguace = u.id
            WHERE s.idSeguito = ?
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

    public function getPostsbyId($userId, $n=-1){
        $query = "
            SELECT u.id, u.username, u.imgProfilo, t.id, t.nome, p.id, p.dataora, p.testo, p.immagine, p.mipiace, p.commenti
            FROM post p INNER JOIN utente u ON p.idUtente = u.id INNER JOIN tema t ON p.idTema = t.id 
            WHERE abilitato = 1
            AND u.id = ?
        ";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
 
    /* restituisce tutti i post del tema del giorno */
    public function getPostsbyTheme($theme, $n=-1){
        $query = "
            SELECT u.id, u.username, u.imgProfilo, t.id, t.nome, p.dataora, p.testo, p.immagine, p.mipiace, p.commenti
            FROM post p INNER JOIN utente u ON p.idUtente = u.id INNER JOIN tema t ON p.idTema = t.id 
            WHERE t.id = ?
        ";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->bind_param('s',$theme);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /* restituisce il tema del giorno */
    public function getThemeOfTheDay($idTheme){
        $query = "
            SELECT id, data, nome
            FROM tema
            WHERE tema.id=?
        ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idTheme);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /* restituisce i dati del giorno passato come parametro */
    public function getDays($currentDay){
            $query = "
                SELECT day, day_name, month_name
                FROM time_dimension
                WHERE time_dimension.day=?
            ";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$currentDay);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function insertPost($testo, $immagine, $tema, $utente){
        $query = "INSERT INTO post (testo, immagine, idTema, idUtente) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssii',$testo, $immagine, $tema, $utente);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updatePostById($idPost, $testo, $immagine){
        $query = "UPDATE post SET testo = ?, immagine = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi',$testo, $immagine, $idPost);
        
        return $stmt->execute();
    }

    public function incrementCommentsById($idPost){
        $query = "UPDATE post SET commenti = commenti + 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        
        return $stmt->execute();
    }

    public function decrementCommentsById($idPost){
        $query = "UPDATE post SET commenti = commenti - 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        
        return $stmt->execute();
    }

    public function incrementLikesById($idPost){
        $query = "UPDATE post SET miPiace = miPiace + 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        
        return $stmt->execute();
    }

    public function decrementLikesById($idPost){
        $query = "UPDATE post SET miPiace = miPiace - 1 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        
        return $stmt->execute();
    }

    public function deletePostById($idPost){
        $query = "UPDATE post SET abilitato = 0 WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    /**
     * Comments CRUD
     */

    public function insertComment($testo, $immagine, $post, $utente){
        $query = "INSERT INTO commento (testo, immagine, idUtente, idPost) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssii',$testo, $immagine, $utente, $post);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function getCommentsByPostId($idPost){
        $query = "
            SELECT c.id, c.dataOra, c.testo, c.immagine, u.username, u.imgProfilo 
            FROM commento c INNER JOIN utente u ON c.idUtente = u.id INNER JOIN post p ON c.idPost = p.id
            WHERE p.id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Likes CRUD
     */

    public function getLikesByPostId($idPost){
        $query = "
            SELECT mipiace
            FROM post
            WHERE id = ?
        ";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idPost);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertLike($idPost, $idUtente){
        $query = "INSERT INTO mi_piace (idPost, idUtente) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$idPost, $idUtente);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    /**
     * Theme CRUD
     */

    public function getThemes($n=-1){
        $query = "
            SELECT data, nome
            FROM tema
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
    
    /**
     * Login
     */

    public function checkLogin($username){
        $query = "SELECT id, username, password, sale FROM utente WHERE username = ? LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }   
    
    public function insertLoginAttempt($userId, $time){
        $query = "INSERT INTO login_attempts (user_id, time) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is', $userId, $time);
        $stmt->execute();

        return $stmt->insert_id;
    }   

    public function getLoginAttempts($userId, $timeThd){
        $query = "SELECT time FROM login_attempts WHERE user_id = ? AND time > ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii', $userId, $timeThd);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Register
     */

    public function insertUser($name, $surname, $username, $email, $password, $salt, $image) {
        $query = "INSERT INTO utente (nome, cognome, username, email, password, sale, imgProfilo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssss', $name, $surname, $username, $email, $password, $salt, $image);
        $stmt->execute();

        return $stmt->insert_id;
    }

}
?>
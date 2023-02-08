<?php 

    function sec_session_start() {
        $session_name = 'sec_session_id'; // Imposta un nome di sessione
        $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
        $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
        ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
        $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
        session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
        session_start(); // Avvia la sessione php.
        session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
    }

    function login($username, $password, $dbh) {
        $checkLoginResult = $dbh->checkLogin($username);
        
        if($checkLoginResult) { // se l'utente esiste

            $userId = $checkLoginResult[0]["id"];
            $username = $checkLoginResult[0]["username"];
            $dbPassword = $checkLoginResult[0]["password"];
            $salt = $checkLoginResult[0]["sale"];
    
            $password = hash('sha512', $password . $salt); // codifica la password usando una chiave univoca.

            // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
            if(checkbrute($userId, $dbh) == true) { 
                // Account disabilitato
                // Invia un e-mail all'utente avvisandolo che il suo account è stato disabilitato.
                return false;
            } else {
            if($dbPassword == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                // Password corretta!            
                $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
    
                $userId = preg_replace("/[^0-9]+/", "", $userId); // ci proteggiamo da un attacco XSS
                $_SESSION['user_id'] = $userId; 
                $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
                $_SESSION['username'] = $username;
                $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                // Login eseguito con successo.
                return true;    
            } else {
                // Password incorretta.
                // Registriamo il tentativo fallito nel database.
                $dbh->insertLoginAttempt($userId, time());
                return false;
            }
        }
        } else {
            // L'utente inserito non esiste.
            return false;
        }
    }

    function checkbrute($userId, $dbh) {
        // Recupero il timestamp
        $now = time();
        // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
        $valid_attempts = $now - (2 * 60 * 60); 
        // Verifico l'esistenza di più di 5 tentativi di login falliti.
        $attemptsResult = $dbh->getLoginAttempts($userId, $valid_attempts);

        if(count($attemptsResult) > 5) {
            return true;
        } else {
            return false;
        }
    }

    function login_check($mysqli) {
        // Verifica che tutte le variabili di sessione siano impostate correttamente
        if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
            $userId = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            $username = $_SESSION['username'];     
            $user_browser = $_SERVER['HTTP_USER_AGENT']; // reperisce la stringa 'user-agent' dell'utente.
            if ($stmt = $mysqli->prepare("SELECT password FROM utente WHERE id = ? LIMIT 1")) { 
                $stmt->bind_param('i', $userId); // esegue il bind del parametro '$userId'.
                $stmt->execute(); // Esegue la query creata.
                $stmt->store_result();
        
                if($stmt->num_rows == 1) { // se l'utente esiste
                $stmt->bind_result($password); // recupera le variabili dal risultato ottenuto.
                $stmt->fetch();
                $login_check = hash('sha512', $password.$user_browser);
                if($login_check == $login_string) {
                    // Login eseguito!!!!
                    return true;
                } else {
                    //  Login non eseguito
                    return false;
                }
                } else {
                    // Login non eseguito
                    return false;
                }
            } else {
                // Login non eseguito
                return false;
            }
        } else {
            // Login non eseguito
            return false;
        }
    }
    
    function uploadImage($path, $image){
        $imageName = basename($image["name"]);
        $fullPath = $path.$imageName;
        
        $maxKB = 500;
        $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
        $result = 0;
        $msg = "";
        //Controllo se immagine è veramente un'immagine
        $imageSize = getimagesize($image["tmp_name"]);
        if($imageSize === false) {
            $msg .= "File caricato non è un'immagine! ";
        }
        //Controllo dimensione dell'immagine < 500KB
        if ($image["size"] > $maxKB * 1024) {
            $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
        }

        //Controllo estensione del file
        $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
        if(!in_array($imageFileType, $acceptedExtensions)){
            $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
        }

        //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
        if (file_exists($fullPath)) {
            $i = 1;
            do{
                $i++;
                $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
            }
            while(file_exists($path.$imageName));
            $fullPath = $path.$imageName;
        }

        //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
        if(strlen($msg)==0){
            if(!move_uploaded_file($image["tmp_name"], $fullPath)){
                $msg.= "Errore nel caricamento dell'immagine.";
            }
            else{
                $result = 1;
                $msg = $imageName;
            }
        }
        return array($result, $msg);
    }

    function deleteFileIfExists($basePath, $fileName) {
        $fullPath = $basePath . $fileName;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    function sendNotificationEmail($from, $to, $type) {
        $messages = [
            "follow" => "L'utente <strong>" . $from . "</strong> ha iniziato a seguirti",
            "like" => "L'utente <strong>" . $from . "</strong> ha messo mi piace ad un tuo post",
            "comment" => "L'utente <strong>" . $from . "</strong> ha commentato un tuo post"
        ];

        $subject = 'Hai una nuova notifica su OnTopic';
        $headers = 'From: ontopic@info.com' . "\r\n" .
                    'Reply-To: ontopic@info.com' . "\r\n" .
                    'Content-Type: text/html' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

        return  mail($to, $subject, $messages[$type], $headers);
    }
?>
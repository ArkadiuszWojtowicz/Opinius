<?php 

class UserManager {

    function login($db) {
        $args = [
            'userName' => FILTER_SANITIZE_MAGIC_QUOTES,
            'passwd' => FILTER_SANITIZE_MAGIC_QUOTES
        ];
        $dane = filter_input_array(INPUT_POST, $args);

        $login = $dane['userName'];
        $passwd = $dane['passwd'];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) {
            //rozpocznij sesję zalogowanego użytkownika
            session_start();
            $sesId = session_id();
            //usuń wszystkie wpisy historyczne dla użytkownika o $userId
            $db->deleteById($userId, "logged_in_users");
            //ustaw datę - format("Y-m-d H:i:s");
            $db->insert("INSERT INTO logged_in_users Values('$sesId','$userId','" . date('Y-m-d H:i:s') . "')");
            //pobierz id sesji i dodaj wpis do tabeli logged_in_users
        }
        return $userId;
    }

    function logout($db) {
        session_start();
        $sesId = session_id();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }
        session_destroy();

        $db->delete("DELETE FROM logged_in_users WHERE sessionId='$sesId'");
    }

    function getLoggedInUser($db, $sessionId) {
        if ($result = $db->mysqli->query("SELECT * FROM logged_in_users WHERE sessionId='$sessionId' ")) {
            $row = $result->fetch_object();
            return $row->userId;
        } else {
            return -1;
        }
    }

}

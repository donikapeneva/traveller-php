<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Travellers/utils/Database.php";

//session_start();

class UserController {

    public static function LoginAuthenticate(){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $query = Database::getInstance()->getConnection()->prepare("
                SELECT email, username, password, id 
                FROM user 
                WHERE email = ?");
        $query->execute([$email]);
        $data = $query->fetch();

        if (isset($data["email"]) && $data["password"] == $password){
            $_SESSION["email"] = $data["email"];
            $_SESSION["userId"] = $data["id"];
            header("Location: ../index.php");
            exit;
        } else {
            session_unset();
            session_destroy();
            return 'Invalid email or password.';
        }
    }

    public static function LogOut(){
        session_unset();
        session_destroy();

        header("Location: ../index.php");
        exit;
    }

    public static function getOneById($id) {
        $sql = 'SELECT * FROM user 
                WHERE id = ?';
        $query = Database::getInstance()->getConnection()
            ->prepare($sql);
        $query->execute([$id]);

        return $query->fetch();
    }

    public static function getOneByEmail($email) {
        $sql = 'SELECT * FROM user 
                WHERE email = ?';
        $query = Database::getInstance()->getConnection()
            ->prepare($sql);
        $query->execute([$email]);

        return $query->fetch();
    }

    public static function create($data) {
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $first_name = $data['firstName'];
        $last_name = $data['lastName'];

        $query = Database::getInstance()->getConnection()->prepare("
            INSERT INTO user ( username, email, password, first_name, last_name, is_active)
            VALUES ( ?, ?, ?, ?, ?, ?)
            ");
        $query->execute([$username, $email, $password, $first_name, $last_name, true]);
//        $res = $query->fetch();
//        echo $res;
        $_SESSION["email"] = $email;
        $_SESSION["userId"] = $data["id"];
        header("Location: ../index.php");

//        return $res;
    }

    public static function delete($id) {

        $query = Database::getInstance()->getConnection()->prepare("
            UPDATE adventure 
            SET  is_deleted = ?
            WHERE id = ?
            ");
        $query->execute([true, $id]);

        header("Location: ../index.php");
    }
}
?>

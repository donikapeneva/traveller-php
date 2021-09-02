<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Travellers/utils/Database.php";

class UserController {

//    public static function getAll() {
//        $sql = 'SELECT * FROM user
//                ORDER BY time DESC';
//
//        $query = Database::getInstance()->getConnection()
//            ->prepare($sql);
//        $query->execute([false]);
//        $adventures =$query->fetchAll();
////        echo json_encode($adventures);
//        return $adventures;
//    }

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
        $password = $data['passwd'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $is_active = $data['is_active'];

        $query = Database::getInstance()->getConnection()->prepare("
            INSERT INTO user ( username, email, password, first_name, last_name, is_active)
            VALUES ( ?, ?, ?, ?, ?, ?)
            ");
        $query->execute([$username, $email, $password, $first_name, $last_name, true]);

        header("Location: ../index.php");
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

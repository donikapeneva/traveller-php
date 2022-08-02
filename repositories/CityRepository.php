<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Travellers/utils/Database.php";

class CityRepository {

    public static function getAll() {
        $sql = 'SELECT * FROM city
                ORDER BY name';

        $query = Database::getInstance()->getConnection()
            ->prepare($sql);
        $query->execute();
        $cities =$query->fetchAll();
        return $cities;
    }
}
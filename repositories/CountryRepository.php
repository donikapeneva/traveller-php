<?php

require_once $_SERVER['DOCUMENT_ROOT']."/Travellers/utils/Database.php";

class CountryRepository {

    public static function getAll() {
        $sql = 'SELECT * FROM country
                ORDER BY name';

        $query = Database::getInstance()->getConnection()
            ->prepare($sql);
        $query->execute();
        $countries =$query->fetchAll();
        return $countries;
    }
}
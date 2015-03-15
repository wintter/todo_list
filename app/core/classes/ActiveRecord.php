<?php
namespace app\core\classes;

Class ActiveRecord {

    public function getPdoConn() {
        return new \PDO('mysql:host='.PDO_HOST.';dbname='.PDO_BASE_NAME, PDO_USER, PDO_PASS);
    }

}
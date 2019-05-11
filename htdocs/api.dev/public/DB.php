<?php
    require_once 'config.php';
    require_once 'Upload.php';

    Class DB {

        public $pdo;

        function __construct() {
            $this->pdo = new PDO("mysql:host={".MYSQL_HOST."};dbname={".MYSQL_DATABASE."}", MYSQL_USER, MYSQL_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function create($file) {
            $sql = "INSERT INTO uploads (type, mime, name) VALUES ('jpg', 'image/jpg', 'name')";
            $result = $this->pdo->query($sql);
        }

        function list() {
            $sql = "SELECT * FROM uploads";
            $sth = $this->pdo->prepare($sql);
            $sth->execute();

            $result = $sth->fetchAll(PDO::FETCH_CLASS, "Upload");
            var_dump($result);
        }
    }
?>
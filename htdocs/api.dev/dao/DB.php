<?php
    require_once '../config/config.php';
    require_once '../model/Upload.php';

    Class DB {

        public $pdo;

        function __construct() {
            $this->pdo = new PDO(
                "mysql:host=" . MYSQL_HOST . ":" . MYSQL_PORT . ";dbname=" . MYSQL_DATABASE, 
                MYSQL_USER, 
                MYSQL_PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function get($hash) {
            $stmt = $this->pdo->prepare('SELECT * from uploads WHERE hash = :hash');
            $stmt->execute(array(
                ':hash' => $hash,
            ));
            $result = $stmt->fetchAll(PDO::FETCH_FUNC, "Upload::buildFromPdo");
            return $result;
        }

        function create($upload) {
            $stmt = $this->pdo->prepare('INSERT INTO uploads (hash, mime, name, type) VALUES (:hash, :mime, :name, :type)');
            $stmt->execute(array(
                ':hash' => $upload->hash,
                ':name' => $upload->name,
                ':mime' => $upload->mime,
                ':type' => $upload->type,
            ));
        }

        function list() {
            $sql = "SELECT * FROM uploads";
            $sth = $this->pdo->prepare($sql);
            $sth->execute();

            $result = $sth->fetchAll(PDO::FETCH_FUNC, "Upload::buildFromPdo");
            return $result;
        }
    }
?>
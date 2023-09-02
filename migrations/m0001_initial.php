<?php 

class m0001_initial {
    public function up() {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
          )";
        $db->pdo->exec($sql);
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $sql = "DROP TABLE users";
        $db->pdo->exec($sql);
    }
}
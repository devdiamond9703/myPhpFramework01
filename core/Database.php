<?php 
namespace app\core;

class Database {
    public \PDO $pdo;

    public function __construct($config) {
        $dsn = $config['dsn'] ?? '';
        $user = $config['user'] ?? '';
        $password = $config['password'] ?? '';
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations() {
        $this->createMigrationsTable();
        $appliedMigrations = $this->appliedMigrations();
        $files = scandir(Application::$ROOT_DIR.'/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach($toApplyMigrations as $migration) {
            if($migration === '.' || $migration === '..') {
                continue;
            }
            require_once Application::$ROOT_DIR.'/migrations/'.$migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $instance->up(); 
            $nevMigrations[] = $migration;
        }

        if(!empty($nevMigrations)) {
            $this->saveMigrations($nevMigrations);
        } else {
            echo "All migrations are applied";
        }
    }

    public function createMigrationsTable() {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          );");
    }

    public function appliedMigrations() {
        $statment = $this->pdo->prepare("SELECT migration FROM migrations");
        $statment->execute();
        return $statment->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations($migrations) {
        $str = implode(",", array_map(fn($m) => "('$m')", $migrations));
        $statment = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES $str");
        $statment->execute();
        $this->pdo->prepare("INSERT INTO migrations (migration)");
    }
}
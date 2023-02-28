<?php


require '../vendor/autoload.php';


class Database
{

    private string $host = '127.0.0.1';
    private string $db_name = 'test';
    private string $username = 'root';
    private string $password = 'jkljkljkl';

    public ?PDO $conn = null;

    public function getConnection(): ?PDO
    {

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf-8");
            $statement = $this->conn->query('SELECT * FROM names');
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                echo $row['id'] . ' ' . $row['name'] . ' ' . $row['username'] . ' ' . $row['city_id'];
            }
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

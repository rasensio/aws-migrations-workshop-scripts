<?php
declare(strict_types=1);

namespace App;

class DbRepository
{
    /**
     * @var \PDO;
     */
    protected $db;

    public function __construct(string $host, string $user, string $pass, string $name)
    {
        $this->db = new \PDO("mysql:dbname=$name;host=$host", $user, $pass);
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        $this->db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function getMessages(int $page = 1) : array
    {
        $stm = $this->db->prepare('SELECT * FROM messages ORDER BY created_at DESC LIMIT ? OFFSET ?');
        $stm->execute([10, max(0, ($page - 1) * 10)]);
        return $stm->fetchAll();
    }

    public function insertMessage(string $fullName, string $message, string $pictureFilename = null) : bool
    {
        $stm = $this->db->prepare('INSERT INTO messages (full_name, message, picture_filename, created_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP)');
        return $stm->execute([$fullName, $message, $pictureFilename]);
    }
}

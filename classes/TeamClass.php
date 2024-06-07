<?php
require_once ('classes/DatabaseClass.php');

class TeamClass {
    private $db;
    private $conn;

    public function __construct() {
        $this->db = new DatabaseClass();
        $this->conn = $this->db->connect();
    }

    public function getTeams() {
        $query = 'SELECT * FROM timy';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTeam($klub, $vyhry, $vp, $pp, $prehry, $skore, $body) {
        $query = 'INSERT INTO timy (klub, vyhry, vp, pp, prehry, skore, body) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$klub, $vyhry, $vp, $pp, $prehry, $skore, $body]);
    }

    public function deleteTeam($id) {
        $query = 'DELETE FROM timy WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
    }

    public function editTeam($id, $klub, $vyhry, $vp, $pp, $prehry, $skore, $body) {
        $query = 'UPDATE timy SET klub = ?, vyhry = ?, vp = ?, pp = ?, prehry = ?, skore = ?, body = ? WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$klub, $vyhry, $vp, $pp, $prehry, $skore, $body, $id]);
    }
}
?>
<?php
require_once 'config/Database.php';

class User {
    private static $db;

    public static function connect() {
        if (!self::$db) {
            $database = new Database();
            self::$db = $database->getConnection();
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }

    public static function getAll() {
        $stmt = self::connect()->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $stmt = self::connect()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function insert($data) {
        $stmt = self::connect()->prepare("INSERT INTO users (name, email, password,  profile) VALUES (?, ?,  ?, ?)");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT), 
            $data['profile']
        ]);
    }

    public static function update($id, $data) {
        $stmt = self::connect()->prepare("UPDATE users SET name = ?, email = ? , profile = ? WHERE id = ?");
        return $stmt->execute([
            $data['name'],
            $data['email'],
           
            $data['profile'],
            $id
        ]);
    }

    public static function delete($id) {
        $stmt = self::connect()->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
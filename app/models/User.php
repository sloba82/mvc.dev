<?php

class User
{

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }


    public function getByEmail($email)
    {
        $this->db->query("SELECT * FROM users where email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function create($data)
    {
        $this->db->query('INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, :created_at)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':created_at', date("Y/m/d"));

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function validateUser($data){

        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->db->query("SELECT * FROM users where email = :email AND password = :password");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $hashedPassword);

        return $this->db->single();
    }
}

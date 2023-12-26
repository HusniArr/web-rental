<?php

class User_model extends Database {

    public function create($username, $email, $password)
    {
        $sql = "INSERT INTO users(username, email, pass) VALUES(:username, :email, :pass)";
        $data = array(
            'username'=> $username,
            'email' => $email,
            'pass' => password_hash($password, PASSWORD_BCRYPT)
        );

        $this->query($sql, $data);
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM users WHERE username = :username OR email= :email";

        $data = array(
            'username' => $username,
            'email' => $username
        );
        $this->query($sql, $data);
        return $this->singleSet();
    }
}
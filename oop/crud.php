<?php

class crud
{
    private $conn;

    public function __construct($server, $username, $password, $db_name)
    {
        $this->conn = new mysqli($server, $username, $password, $db_name);
    }

    public function read($table, $id = null, $values = '*')
    {

        if ($values != '*') {
            $values = implode(',', $values);
        }

        if ($id == null) {
            $sql = "SELECT $values FROM $table";
            $result = $this->conn->query($sql);
        } else {
            $sql = "SELECT $values FROM $table WHERE id = '$id'";
            $result = $this->conn->query($sql);
        }
        $result = $result->fetch_all();
        return $result;
    }


    public function create($table, $values)
    {
        $keys = implode(',', array_keys($values));
        $values = implode("','", array_values($values));

        $sql = "INSERT INTO `$table`($keys) VALUES ('$values')";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = '$id'";
        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($table, $id, $values)
    {
        $sql = "UPDATE `$table` SET $values WHERE id = '$id'";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}


$crud = new crud('localhost', 'root', '', 'crud_oop');
$users = $crud->read('users', 1, ['username', 'email']);

// $createData = $crud->create('users', ['username' => 'muhammad', 'email' => 'muhammad@email.com', 'address' => 'muhammad ka address']);

// print_r($createData);


// $delete = $crud->delete('users', 5);


$update = $crud->update('users', 2, "`username`='ali ahmed',`email`='aliahmed@email.com',`address`='ali ahmed ka address'");

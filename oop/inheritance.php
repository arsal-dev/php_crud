<?php


class user
{
    public $name;
    public $email;
    public $address;
    public $password;
    public $access = 'limited';

    public function __construct($name, $email, $address, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
    }

    public function info()
    {
        echo "Name: $this->name <br>";
        echo "Email: $this->email <br>";
        echo "Address: $this->address <br>";
        echo "Access: $this->access <br>";
    }
}

class admin extends user
{
    public function __construct($name, $email, $address, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
        $this->access = 'Unlimited';
    }
}


$user1 = new user('abdullah', 'abdullah@email.com', 'address', '12345678');
$user2 = new user('ahmed', 'ahmed@email.com', 'address', '12345678');

// echo $user2->info();


$admin1 = new admin('admin', 'admin@email.com', 'address', 12345678);

echo $admin1->info();

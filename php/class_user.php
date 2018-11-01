<?php

    include("database.php");

class User {
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    private $password;
    public $validation_code;
    public $active;
    public $conn;

    public function __construct($DSN, $USR, $PSSWD) {
        try {
            $this->conn = new PDO($DSN, $USR, $PSSWD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function add_user ($kwargs)                                   // à tester avant de rajouter si l'username ou l'adresse mail n'existe pas deja
    {
        $req = "SELECT * FROM `users` WHERE `username` = '".$username."'";
        try {
            $tmp = $this->conn->prepare($req);
            $tmp2= $tmp->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        if (!$tmp)
        {
            $req = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `validation_code`, `active`, `comments`) VALUES (NULL, '".$kwargs['first_name']."', '".$kwargs['last_name']."', '".$kwargs['username']."', '".$kwargs['email']."', '".$kwargs['password']."', '".$kwargs['validation_code']."', '".$kwargs['active']."', '".$kwargs['comments']."')";
            try {
                $this->conn->prepare($req)->execute();

            } catch (PDOException $e) {
            var_dump($e->getMessage());
            return 0;
        }
        else
            return 1;
    }

    public function get_info ($username) {                                    // à tester le retour
        $req = "SELECT * FROM `users` WHERE `username` = '".$username."'";
        try {
            $tmp = $this->conn->prepare($req);
            $tmp2= $tmp->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
        return $tmp->fetchObject();
    }

    public function del_user ($sesusername) {
        $req = "DELETE FROM `users` WHERE `username` = '".$username."'";
        try {
            $tmp = $this->conn->prepare($req);
            $tmp2= $tmp->execute();

        } catch (PDOException $e) {
            var_dump($e->getMessage());
            return (1);
        }
        return (0);
    }

  public function modif_user($sesusername, $args) {
    $infos = $this->get_info($sesusername);
    echo $infos->username;
    if (isset($args['username']))
      $infos->username = $args['username'];
    if (isset($args['oldpassword']))
    {
      if (hash('whirlpool', $args['oldpassword']) == $infos->password)
        $infos->password = hash('whirlpool', $args['newpassword']);
    }
        if (isset($args['comments']))
        {
            $infos->comments = $args['comments'];
        }
    $req = "UPDATE `users` set `username` = '".$infos->username."', `password` = '".$infos->password."', `email` = '".$infos->email."', `comments` = '".$infos->comments."' WHERE `username` = '".$sesusername."'";
    try {
      $tmp = $this->conn->prepare($req);
      $tmp2= $tmp->execute();
      $infos = $this->get_info($args['username']);
      echo $infos->username;
      echo $infos->password;

    } catch (PDOException $e) {
      var_dump($e->getMessage());
      return (1);
    }
    return (0);
  }


}

$test = new User($DB_DSN, $DB_USER, $DB_PASSWORD);
echo ($test->add_user( array('first_name' => " albert", 'last_name' => 'tutu', 'username' => 'askertxx', 'email' => 'tete@tete.fr', 'password' => 'bite', 'validation_code' => 'OLLKJDK', 'active' => '0')));
// $tmp = $test->get_info('askerto');
// if (!$tmp)
//     echo "error";
// else
//     echo $tmp->validation_code;
// $test->del_user('seliasbe');
// $test->modif_user('askertx', array('username'=>'askertxx', 'oldpassword'=>'2891284b993a6bdde032d0f844bf2abde4502c149846588f9d7c4a21c761e01ff716cc03fc145d225068ccba6bd2954973eb912e287b511b798a10f764bcf946', 'newpassword'=>'yoyonegro'));

 ?>

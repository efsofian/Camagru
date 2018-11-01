<?php
include("database.php");

class Photo {
  public function __construct($DSN, $USR, $PSSWD) {
    try {
      $this->conn = new PDO($DSN, $USR, $PSSWD);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      var_dump($e->getMessage());
    }
  }

  public function add_photo ($kwargs)                                   // à tester avant de rajouter si l'username ou l'adresse mail n'existe pas deja
	{
		$req = "INSERT INTO `photos` (`id`, `id_user`, `created`) VALUES (NULL, '".$kwargs['id_user']."', '".$kwargs['t']."')";
		try {
			$this->conn->prepare($req)->execute();

		} catch (PDOException $e) {
			var_dump($e->getMessage());
		}
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

	public function del_user ($sesusername) {                                      //erreur de syntaxe, pourrait provenir de closecursor sur les req précedentes
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
    $req = "UPDATE `users` set `username` = '".$infos->username."', `password` = '".$infos->password."', `email` = '".$infos->email."' WHERE `username` = '".$sesusername."'";
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
 ?>

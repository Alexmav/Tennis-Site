<?php
// Classe de connexion à une base de données
// S'inspire du pattern singleton pour n'ouvrir qu'une seule connexion
// Utilisation :
//    $bd = MaBD::getInstance(); // $bd est un objet PDO

//// VERIF AVEC AII

class MaBD {
	//Params pour accès BDD
	static private $host     = "5.196.143.39";			//MODIF
	static private $base     = "Ace";      					//MODIF
	static private $user     = "root";				  		//MODIF
	static private $password = "biologie69";				//MODIF

	static private $pdo = null; // Le singleton

	// Obtenir le singleton
	static function getInstance() {
		if(self::$pdo == null){
			$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$host, self::$base);
			try{
				self::$pdo = new PDO($dsn, self::$user, self::$password);
			}catch (PDOException $e){
			    exit('<p class="erreur">Erreur de connexion au serveur '.self::$host.' ('.self::$user.')<br/>'.$e->getMessage().'</p>');
			}
		}
		return self::$pdo;
	}
}
?>

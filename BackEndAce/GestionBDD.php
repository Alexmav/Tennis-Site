<?php
include("MaBD.php");



 // getAll Méthodes
 function getAll($bddLabel){
   $bd    = MaBD::getInstance();

   $stmt  = $bd->query("SELECT * FROM " . $bddLabel);
   $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);

   return json_encode($liste);
 }



  function getAllAdmins(){
    return getAll("Admin");
  }
  function getAllArbitres(){
    return getAll("Abitre");
  }
  function getAllJeux(){
    return getAll("Jeu");
  }
    function getAllJoueursM(){
        $bd    = MaBD::getInstance();

        $stmt  = $bd->query("SELECT personne.Prenom, personne.Nom, personne.Nationalite, joueur.Rang FROM joueur INNER JOIN personne ON joueur.IdPersonne = personne.IdPersonne WHERE personne.Sexe=\"M\" ORDER BY joueur.Rang ASC");

        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($liste);
  }
    function getAllJoueursF(){
    $bd    = MaBD::getInstance();

    $stmt  = $bd->query("SELECT personne.Prenom, personne.Nom, personne.Nationalite, joueur.Rang FROM joueur INNER JOIN personne ON joueur.IdPersonne = personne.IdPersonne WHERE personne.Sexe=\"F\" ORDER BY joueur.Rang ASC");

    $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($liste);
}
  function getAllMatchs(){
    $bd    = MaBD::getInstance();

    $stmt  = $bd->query("SELECT match.IdTournoi, match.IdJoueur1, match.IdJoueur2, match.Resultat, match.Vainqueur FROM match INNER JOIN joueur ON match.IdJoueur1,match.IdJoueur2 = joueur.IdJoueur  ORDER BY joueur.Rang ASC");

    $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($liste);
  }
  function getAllOrganisateurs(){
    return getAll("Organisateur");
  }
  function getAllPersonnes(){
    return getAll("Personne");
  }
  function getAllSets(){
    return getAll("Sets");
  }
  function getAllTournois(){
    return getAll("Tournoi");
  }

  // COMMON --------------------------------------------------------------------
  function connexion($login, $password){
    return "TODO";
  }

  // ADMIN ---------------------------------------------------------------------
  function connexionForAdmin($login, $password){
    $bd    = MaBD::getInstance();

    $stmt  = $bd->prepare("SELECT idAdmin FROM Admin WHERE login = :login AND password = :password");

    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($tmp[0]);
  }
  function addAdmin($login, $password){
    $bd = MaBD::getInstance();
    $return = "";

    try{
      $stmt = $bd->prepare("INSERT INTO Admin SET login = :login, password = :password");

      $stmt->bindParam(':login', $login);
      $stmt->bindParam(':password', $password);

      $stmt->execute();
    }catch(Exception $e){
      $return = $e;
    }

    return json_encode($return);
  }
  function changeAdminPassword($idAdmin, $newPassword){
    $bd = MaBD::getInstance();
    $rslt = "";

    try{
      $stmt = $bd->prepare("UPDATE Admin SET password = :password WHERE idAdmin = :idAdmin");

      $stmt->bindParam(':password', $newPassword);
      $stmt->bindParam(':idAdmin', $idAdmin);

      $stmt->execute();

    }catch(Exception $e){
      $rst = $e;
    }

    return json_encode($rslt);
  }

  // ARBITRE -------------------------------------------------------------------
  function connexionForArbitre($login, $password){
    $bd    = MaBD::getInstance();

    $stmt  = $bd->prepare("SELECT IdArbitre, idPersonne FROM Arbitre WHERE Login = :login AND password = :password");

    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($tmp[0]);
  }
  function getArbitrePersonne($idArbitre){
    $bd = MaBD::getInstance();
    $result = "";

    try{

      $stmt = $bd->prepare("SELECT idPersonne FROM Arbitre WHERE IdArbitre = :idArbitre");
      $stmt->bindParam(':idArbitre', $idArbitre);
      $stmt->execute();

      $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $tmp = $tmp[0];

      $stmt = $bd->prepare("SELECT * FROM Personne WHERE IdPersonne = :idPersonne");
      $stmt->bindParam(':idPersonne', $tmp);
      $stmt->execute();

      $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $result = $tmp[0];

    }catch(Exception $e){
      $result = $e;
    }

    return json_encode($result);
  }
  /*function changeAdminPassword($idArbitre, $idPersonne, $newPassword){
    $bd = MaBD::getInstance();
    $rslt = "";

    try{

      if(isset($idArbitre)){
        $stmt = $bd->prepare("UPDATE Arbitre SET password = :password WHERE Idrbitre = :idArbitre");

        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':idArbitre', $idArbitre);
      }elseif (isset($idPersonne)) {
        $stmt = $bd->prepare("UPDATE Arbitre SET password = :password WHERE idPersonne = :idPersonne");

        $stmt->bindParam(':password', $newPassword);
        $stmt->bindParam(':idPersonne', $idPersonne);
      }

      $stmt->execute();

    }catch(Exception $e){
      $rst = $e;
    }

    return json_encode($rslt);
  }/*
  /*function addArbitre($login, $password, $firstName, $lastName, $country, $gender){


    try{
      $idPers = addPersonne($firstName, $lastName, $country, $gender);

      $stmt = $bd->prepare("INSERT INTO Arbitre SET idPersonne = :idPers, login = login, password = :password");
      $stmt->bindParam(':idPersonne', $idPers);
      $stmt->bindParam(':login', $login);
      $stmt->bindParam(':password', $password);
      $stmt->execute();
    }catch(Exception $e){
      $rslt = $e;
    }

    return $rslt;
  }*/

  // JEU -----------------------------------------------------------------------
  function getScore($idJeu){
    $bd = MaBD::getInstance();
    $result = "";

    try{

      $stmt = $bd->prepare("SELECT * FROM Jeu WHERE idJeu = :idJeu");
      $stmt->bindParam(':idJeu', $idJeu);
      $stmt->execute();

      $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $result = $tmp[0];

    }catch(Exception $e){
      $result = $e;
    }

    return json_encode($result);
  }
  function getJeuSet($idJeu){
    $bd = MaBD::getInstance();
    $result = "";

    try{

      $stmt = $bd->prepare("SELECT idSets FROM Jeu WHERE idJeu = :idJeu");
      $stmt->bindParam(':idJeu', $idJeu);
      $stmt->execute();

      $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $tmp = $tmp[0];

      $stmt = $bd->prepare("SELECT * FROM Sets WHERE idSets = :idSets");
      $stmt->bindParam(':idSets', $tmp);
      $stmt->execute();

      $tmp = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $result = $tmp[0];

    }catch(Exception $e){
      $result = $e;
    }

    return json_encode($result);
  }


  function addPersonne($firstNam, $lastName, $country, $gender)
  {
    return 0;
  }


  function addNewDevise($label){
      $bd = MaBD::getInstance();

      //try{
      $stmt = $bd->prepare("INSERT INTO devise SET labelDevise = :labelDevise");
      $stmt->bindParam(':labelDevise', $label);
      $stmt->execute(); //or die ('ERREUR SQL! <br>'.mysql_error());
      /*echo $stmt;
      die ('');

    }catch (Exception $e){
      return $e;
    }*/
    //return $stmt;
  }

  function addNewConvertValue($idDevise1, $idDevise2, $convVal){
    $bd = MaBD::getInstance();

    $stmt = $bd->prepare("	INSERT INTO convertvalue SET fromConvert = :fromConvert, toConvert = :toConvert, valueConvert = :valueConvert");
    $stmt->bindParam(':fromConvert', $idDevise1);
    $stmt->bindParam(':toConvert', $idDevise2);
    $stmt->bindParam(':valueConvert', $convVal);
    $stmt->execute() or die ('ERREUR SQL! <br>'.mysql_error());
  }

  function getAllDevise(){
    $bd = MaBD::getInstance();

    $stmt = $bd->query("SELECT * FROM devise");
    $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $liste;
  }

  function convertValue($idDevise1, $idDevise2, $convVal){
    try{
      $bd = MaBD::getInstance();

      /*$stmt = $bd->prepare("SELECT * FROM convertvalue WHERE fromConvert = :fromConvert AND toConvert = :toConvert");
      $stmt->bindParam(':fromConvert', $idDevise1);
      $stmt->bindParam(':toConvert', $idDevise2);

      $valueConvert = $stmt->execute();
*/

      $stmt = $bd->query("SELECT valueConvert  FROM convertvalue WHERE fromConvert = " . $idDevise1 . " AND toConvert = " . $idDevise2);
      $valueConvert = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $v = $valueConvert[0];

    } catch (Exception $e) {
      echo $e;
    }
    $valueConvert = 0.0;
    $valToRet = 0.0;

    if(!empty($convVal) && $convVal > 0){

      if(!empty($v["valueConvert"]) && $v["valueConvert"] > 0){
        $convVal = floatval($convVal);
        $valueConvert = floatval($v["valueConvert"]);

        $valToRet = $convVal * $valueConvert;
        $message = "Conversion : " . $valToRet;
      } else {
        $message = "Aucun taux de change trouvé";
      }
    }else{
      $message = "Merci de donnée une valeur à convertir";
    }

    return array('tauxChg' => $valueConvert, 'convertedValue' => $valToRet, 'message' => $message);


  }



?>

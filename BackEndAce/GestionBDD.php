<?php
include("MaBD.php");

class ConvertFunctions
{

  function getAllPersonnes(){
    $bd    = MaBD::getInstance();

    $stmt  = $bd->query("SELECT * FROM Personne");
    $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $liste;
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

}

?>

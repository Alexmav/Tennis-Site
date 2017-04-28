<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../style.css">

<body>
  <div class="w3-top">
      <div class="w3-bar w3-red w3-card-2 w3-left-align w3-large">
          <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
          <a href="../../home.php" class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
          <a href="./index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large  w3-white" >Joueur</a>
          <a href="../cup/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tournoi</a>
          <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
          <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
      </div>
  </div>



<?php
include "../common/header.php";
?>

  <?php
  include"../../BackEndAce/GestionBDD.php";
  $datasm = array();
  $datasm = json_decode(getAllJoueursM(),true);
  $datasf = array();
  $datasf = json_decode(getAllJoueursF(),true);
  ?>


<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <h1>Classement Homme</h1>
            <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
                <thead>
                <tr class="w3-red">
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Rang</th>
                </tr>
                </thead>

                <tbody>
                <!-- Corps du tableau -->
                <?php
                foreach($datasm as $data){
                    echo "<tr>";
                    echo "<th>".$data["Prenom"]."</th>";
                    echo "<th>".$data["Nom"]."</th>";
                    echo "<th>".$data["Nationalite"]."</th>";
                    echo "<th>".$data["Rang"]."</th>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="w3-third w3-center">
            <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
        </div>
    </div>
</div>


<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
    <div class="w3-content">
        <div class="w3-twothird">
            <h1>Classement Femme</h1>
            <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
                <thead>
                <tr class="w3-red">
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Rang</th>
                </tr>
                </thead>

                <tbody>
                <!-- Corps du tableau -->
                <?php
                foreach($datasf as $data){
                    echo "<tr>";
                    echo "<th>".$data["Prenom"]."</th>";
                    echo "<th>".$data["Nom"]."</th>";
                    echo "<th>".$data["Nationalite"]."</th>";
                    echo "<th>".$data["Rang"]."</th>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Quote of the day: live life</h1>
</div>

<?php include "./page/common/footer.php" ?>

<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

</body>
</html>

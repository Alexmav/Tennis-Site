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
          <a href="../../home.php"   class="w3-bar-item w3-button w3-padding-large w3-hover-white">Home</a>
          <a href="./index.php"      class="w3-bar-item w3-button w3-hide-small w3-padding-large  w3-white" >Joueur</a>
          <a href="../cup/index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Tournoi</a>
          <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 3</a>
          <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Link 4</a>
      </div>
  </div>

<!-- PHP -->
<?php
  include "../../../BackEndAce/GestionBDD.php";

  if (!empty($_GET["search"])){
    if (isset($_GET["search"]))
    {

    }
  }else{

  }
?>

<?php
include "../common/header.php";
?>

<div class="w3-row-padding w3-black w3-opacity w3-padding-32 w3-container">
    <div class="w3-content">
      <p class="w3-large" >Recherche</p>

      <form action="index.php" method="GET">


        <!-- FirstName -->
        <div class="w3-twothird w3-container">
            <div class="w3-half">
              <p>Nom :</p>
            </div>
            <div class="w3-half w3-padding-16">
              <input type="text" name="firstName" id="playerFirstName" class="w3" value="" />
            </div>
        </div>

        <!-- LastName -->
        <div class="w3-twothird w3-container">
            <div class="w3-half">
              <p>Prénom :</p>
            </div>
            <div class="w3-half w3-padding-16">
              <input type="text" name="lastName" id="playerLastName" class="w3" value="" />
            </div>
        </div>

        <!-- Gender -->
        <div class="w3-twothird w3-container">
            <div class="w3-half">
              <p>Sexe :</p>
            </div>
            <div class="w3-half w3-padding-16">
              <input type="radio" name="gender" value="femme"> Femme<br>
              <input type="radio" name="gender" value="male" > Male
            </div>
        </div>

        </div>
        <div class="w3-third w3-center">
          <input type="submit" name="search" class="w3-button w3-white w3-padding-large w3-large w3-margin-top" value="Valider"/>
        </div>

      </form>

    </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64  w3-container">
    <div class="w3-content">
        <div class="w3-center">

          <table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
            <thead>
              <tr class="w3-red">
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nationnalite</th>
                <th>Sexe</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>Joueur1</td>
                <td>Joueur1</td>
                <td>France</td>
                <td>H</td>
              </tr>
              <tr>
                <td>Joueur2</td>
                <td>Joueur2</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur3</td>
                <td>Joueur3</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur4</td>
                <td>Joueur4</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur5</td>
                <td>Joueur5</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur6</td>
                <td>Joueur6</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur1</td>
                <td>Joueur1</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur1</td>
                <td>Joueur1</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur1</td>
                <td>Joueur1</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
              <tr>
                <td>Joueur1</td>
                <td>Joueur1</td>
                <td>Angleterre</td>
                <td>F</td>
              </tr>
            </tbody>
          </table>

        </div>
    </div>
</div>


<?php include "../common/footer.php" ?>

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

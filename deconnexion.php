
<?php
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["passwrd"]);
    header("Location:Index.php?msg= Vous vous etes déconnecté");
   
?>
<form action="Index.php" method ="POST">
        <fieldset>
            <legend>Page d'insertion</legend> <br>
            <input type="text" name="Prenom"  placeholder = "Prenom"> <br> <br>
            <input type="text" name="Nom"  placeholder = "Nom"> <br> <br>
            <input type="text" name="login"  placeholder = "Login"> <br> <br>
            <input type="password" name ="mdp" placeholder = "Mot de passe"> <br> <br>
            <input type="text" name="Email"  placeholder = "Email"> <br> <br>
            <input type="text" name="Adresse"  placeholder = "Adresse"> <br> <br>
            <input type="number" name="Telephone"  placeholder = "Telephone"> <br> <br>
            
            <input type="submit" value ="Inserez">
        </fieldset>
    </form>
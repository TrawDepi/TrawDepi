<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Index</title>
</head>
<body>
    
    <form action="Index.php" method ="POST">
        <fieldset>
            <legend>Page de connexion</legend> <br>
            <input type="text" name="login"  placeholder = "login"> <br> <br>
            <input type="password" name ="mdp" placeholder = "Mot de passe"> <br> <br>
            <input type="submit" value ="Se Connecter">
        </fieldset>
    </form>

    <?php
    include("Conn.php");
    try { 
        //CONNEXION AU SERVER DE BD
        $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp);  
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if(isset($_REQUEST["login"])){
            $login=$_REQUEST["login"];
            $mdp=$_REQUEST["mdp"];
            $sql = "SELECT * FROM etudiants where Login ='$login' and Mdp='$mdp' ";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) { 
                $_SESSION["login"]=$_REQUEST["login"];
                $_SESSION["mdp"]=$_REQUEST["mdp"];
                header("Location: Admin.php?msg=Bienvenue à la page d'administration du site");
            }
            else{
                echo"<span style='color : bleu'>Login ou mot de passe incorrect</span>";
            }
        }
            if(isset($_REQUEST["msg"])){
                echo "<br>";
                $b=$_REQUEST["msg"];
                echo"<span style='color : red'>$b</span>";
            }
            if(isset($_REQUEST["msg1"])){
                echo "<br>";
                $c=$_REQUEST["msg1"];
                echo"<span style='color : yellow'>$c</span>";
            }
        }
            catch(PDOException $e)
            { 
                echo "Connection failed: " . $e->getMessage(); 
            }
    ?>
    
</body>
</html>
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
    <title>Supprimer</title>
</head>
<body>
<?php
    include("Conn.php");
    try { 
        $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        if(isset($_REQUEST["Id"])){
            $id=$_REQUEST["Id"];
            $sql = "DELETE FROM etudiants where Id ='$id' ";
            $result = $conn->query($sql);
            if($result->rowCount() > 0) 
                { 
                    echo 'Suppression effectuer !'; 
                }
                else
                {
                    echo 'Suppression non effectuer !'; 
                }
        }
        }
    
            catch(PDOException $e)
                { 
                    echo "Connection failed: " . $e->getMessage(); 
                }
?>
</body>
</html>
    

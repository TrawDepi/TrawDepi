<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Liste des etudiants</title>
    <style>
        table, th,td {
            border : 1px solid black;
            text-align : center;
            margin-left : 5px
        }
        p{
            text-align : center;
        }
    </style>
</head>
<body>
<br>
<p style='font-size : 35px'>Page d'administration</p>
<?php
include("Conn.php");
try { 
    $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
    // Définir le mode d'erreur PDO comme l'exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $name = "%".$_REQUEST["name"]."%";
                    $id = "%".$_REQUEST["id"]."%";
                    $prenom = "%".$_REQUEST["prenoms"]."%" ;
                    $email = "%".$_REQUEST["email"]."%" ;
                    $adresse = "%".$_REQUEST["adresse"]."%" ;
                    $telephone = "%".$_REQUEST["telephone"]."%" ;
                    if (($name !== "")and($id !== "")and($prenom !== "")and($adresse !== "")and($email !== "")and($telephone !== ""))
                     {// Recherche toutes les propositions de array si $ q est différent de ""   
            $sql = ("SELECT * FROM etudiants Where Nom Like '$name' OR Prenom Like '$prenom' OR Email Like '$email'
            OR Adresse Like '$adresse' OR Telephone Like '$telephone' OR Id Like '$id' ORDER BY Id"); 
            $result= $conn->query($sql);
                    if($result->rowCount() > 0) 
                    { 
                        echo "<table>
                              <tr>    
                              <th>Id</th>
                              <th>Prenom</th>
                              <th>Nom</th>
                              <th>Login</th>
                              <th>Mdp</th>
                              <th>Email</th>
                              <th>Adresse</th>
                              <th>Telephone</th>
                              <th>Modifier</th>
                              <th>Suprimer</th>
                              </tr>"; 
                              while($row = $result->fetch()) 
                                {   
                                  $id=$row["Id"];
                                    echo "<tr><td><a href='details.php?Id=$id'>$id</a></td>
                                    <td>".$row["Prenom"]."</td>
                                    <td>".$row["Nom"]."</td>
                                    <td>".$row["Login"]."</td>
                                    <td>".$row["Mdp"]."</td>
                                    <td>".$row["Email"]."</td>
                                    <td>".$row["Adresse"]."</td>
                                    <td>".$row["Telephone"]."</td>
                                    <td><a href='Modifier.php?Id=$id'>$id</a></td>
                                    <td><a href='Supprimer.php?Id=$id'>$id</a></td></tr>";
                                }
                              echo "</table>";
                            } else{
                                echo "Aucun résultat";
                            }
                                }    
                        

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}  
?>
</body>
</html>


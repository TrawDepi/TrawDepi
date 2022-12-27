<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Detailst</title>
    <style>
        table, th,td {
            border : 1px solid black;
        }
    </style>
</head>
<body>
    
<?php
    session_start();
    include("Conn.php");
    try { 
        $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $mdp); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        echo "Connected successfully";
        if(isset($_REQUEST["Id"])){
            $id=$_REQUEST["Id"];
            $sql = "SELECT * FROM etudiants where Id ='$id' ";
            $result = $conn->query($sql);
            if($result->rowCount() > 0) 
        { 
        echo "<table>
                <tr>    
                    <th>Id</th>
                    <th>Prenom</th>    
                    <th>Nom</th>                 
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                </tr>";  
    while($row = $result->fetch()) 
        {   
           
            echo "<tr>
                <td>".$row["Id"]."</td>
                <td>".$row["Prenom"]."</td>
                <td>".$row["Nom"]."</td>
                <td>".$row["Email"]."</td>
                <td>".$row["Adresse"]."</td>
                <td>".$row["Telephone"]."</td>
                </tr>"; 
            }
                echo "</table>";
            } 
            else 
                {
                    echo "0 results"; 
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
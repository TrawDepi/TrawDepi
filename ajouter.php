<form action="ajouter.php" method="post">
        <fieldset id="fied">
        <legend > Ajout De Nouveu Etudiant</legend> 
        <br><input type="text" name="Prenom" placeholder="Prenom" ><br>
        <br><input type="text" name="Nom" placeholder="Nom" ><br>
        <br><input type="text" name="Login" placeholder="Login" ><br>
        <br><input type="password" name="Mdp" placeholder="Mot De Passe" ><br>
        <br><input type="text" name="Email" placeholder="Email" ><br>
        <br><input type="text" name="Adresse" placeholder="Adresse" ><br>
        <br><input type="text" name="Telephone" placeholder="Telephone" ><br>
        <br><input type="submit" value="Ajouter"><br>
        </fieldset>
        </form>
    </form>
</body>
</html>
<?php
        session_start();
        include("conn.php");
    try {
        $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
        // Définir le mode d'erreur PDO comme l'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_REQUEST['Prenom'])){
            $prenom=$_REQUEST['Prenom'];
            $nom=$_REQUEST['Nom'];
            $login=$_REQUEST['Login'];
            $mdp=$_REQUEST['Mdp'];
            $email=$_REQUEST['Email'];
            $adresse=$_REQUEST['Adresse'];
            $telephone=$_REQUEST['Telephone'];
            $sql = "INSERT INTO etudiants (Id,Prenom,Nom,Login,Mdp,Email,Adresse,Telephone)
            VALUES ('','$prenom', '$nom','$login','$email' ,'$email','$adresse','$telephone')";
            // On utilise exec () car aucun résultat n'est retourné
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo " Ajout faites avec succès.</br> La dernière Id : " . $last_id;
        }
    } catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
?>
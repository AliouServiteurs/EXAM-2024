<?php 
    require_once "connexion.php";

    // require_once(realpath(dirname(__FILE__) . '../VUES/connexion.php'));

    class C_connexion {
    
        function inscription($prenom, $nom, $email, $motdepasse){

            // appel de fonction de connexion dans la base de données
            $connexionPDO = connexionPDO_BD();
            $requetePDO = "SELECT email, prenom, nom,`mot de passe` FROM TCOMPTES WHERE email = :email";
            $resultatPreparePDO = $connexionPDO->prepare($requetePDO);
            $resultatPreparePDO->bindParam(':email', $email, PDO::PARAM_STR);
            $resultatPreparePDO->execute();
                  
            $lignes = $resultatPreparePDO->fetch(PDO::FETCH_ASSOC);
            if($lignes) {
               echo "L'addresse e-mail est déjà utiliser !";
            }else{                    
                $requetePDO = "INSERT INTO TCOMPTES(prenom, nom, email, `mot de passe`) VALUES (:p, :n, :e, :m)";
                $resultatPreparePDO = $connexionPDO->prepare($requetePDO);
                $resultatPreparePDO->bindValue(":p", $prenom);
                $resultatPreparePDO->bindValue(":n", $nom);
                $resultatPreparePDO->bindValue(":e", $email);
                $resultatPreparePDO->bindValue(":m", password_hash($motdepasse, PASSWORD_DEFAULT));
                $resultatPreparePDO->execute();    
            }       
        }

        // permet de vérifier si le user à un compte ou pas.
        // Si oui il le redirige vers la page de cryptage (cryptage.php) sinon vers la page de connexion (connexion.php)
        function Connexion ($email, $mdpasse) {
                // appel de fonction de connexion dans la base de données
                $connexionPDO = connexionPDO_BD();

                $requetePDO = "SELECT email, prenom, nom,`mot de passe` FROM TCOMPTES WHERE email = :email";
                $resultatPreparePDO = $connexionPDO->prepare($requetePDO);
                $resultatPreparePDO->bindParam(':email', $email, PDO::PARAM_STR);
                $resultatPreparePDO->execute();
                  
                $lignes = $resultatPreparePDO->fetch(PDO::FETCH_ASSOC);
                
                echo "<br>";
                if($lignes) {
                    echo "<br>L'addresse e-mail est déjà utiliser !<br>";
                    
                    if (password_verify($mdpasse, $lignes["mot de passe"])) {
                        $_SESSION["email"] =  $lignes["email"];
                        $_SESSION["nom"] =  $lignes["nom"];
                        $_SESSION["prenom"] = $lignes["prenom"];
                        echo "Connexion à la page réussit !";
                        // header("Location: Page_connexion.php");
                    }else{
                        echo "<p style='color:red;'> Mot de passe incorrecte ! </p>";
                    }

                }else{
                    echo "l'addrsse n'est pas disponoble dans la base!";
                }
        }
    }
?>
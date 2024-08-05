<?php
        // Dans le fichier connexion.php mettre le code PHP pour établir une connexion PDO avec la base 
        // de données en localhost avec le user root sans mot de passe. Le port par défaut est 3306.
        function connexionPDO_BD(){
            $utilisateurBase = 'root';
            $modpasse = "";
            // $baseDonne = 'BDPROJET2024';
        
            $definirPDO = 'mysql:host=localhost;port=3306;dbname=BDPROJET2024;charset=utf8mb4';
            $optionPDO =[
                PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE  =>  PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];
    
            try {
                // tentative de connexion ainsi vérification de l'exitence du mail
                $connexionPDO = new PDO($definirPDO, $utilisateurBase, $modpasse, $optionPDO);
                return   $connexionPDO;
    
            } catch (PDOException  $th) {
                echo "Echec de connexion BD : ";
            }

        }
?>
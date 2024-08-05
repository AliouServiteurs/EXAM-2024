<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Connexion</title>
</head>
<body class="bg-light">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center"> Connexion</h2>
                <p class="text-center text-muted lead"> Se connecter à WWW </p>

                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i> 
                        </span>
                        <input type="text" class="form-control" placeholder="Adresse e-mail  " name="email" require>
                    </div>
                
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i> 
                        </span>
                        <input type="text" class="form-control" placeholder="Mot de passe " name="mdpasse" require>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" name="submit">Se connecter</button>
                       
                        <p class="text-center">
                              vous n'avez pas de compte ?<a href="Page_Inscription.php"> Inscription </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php
        require_once "../CLASS/Connexion.class.PHP";

        if (isset($_POST["submit"])) {
            if(!empty($_POST["mdpasse"])&&!empty($_POST["email"])){
                $inscriptionInformation = new C_connexion();
                $inscriptionInformation->Connexion($_POST["email"], $_POST["mdpasse"]);
            }else{
                echo "Veiller renseigner tout les champs !";
            }
        }
    ?>
</body>
</html>
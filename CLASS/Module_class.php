<?php
    class Module_class {

        // cette fonction prend un texte en entrée et retourne le même texte mis en MAJUSCULE.
        function MettreTextMAJ ($texte){
            return strtoupper($texte);
        }
        // Cette fonction prend un text en entrée et retourne un tableau contenant les caractères du texte
        function MettreTextTAB($texte){
            // return explode(" ", $texte);
            return str_split($texte);
        }
        // cette fonction retourne le nombre d’element d’un tableau.
        function CompterNombreElementTab ($TAB){
            return sizeof($TAB);
        }
        // Cette fonction ajoute un caractère à la fin du tableau TAB
        function AjouterCelluleTab($TAB, $caractere){
            array_push($TAB, $caractere);
            return $TAB;
        }
        // Cette fonction coupe un tableau en deux sous tableaux de même taille $TAB1 et $TAB2 
        // Il recolle les deux sous tableaux en mettant devant cette fois $TAB2
        function InverserTAB ($TAB){
            $taille = sizeof($TAB);
            $modulo = $taille % 2;
            $TAB1 = []; 
            $TAB2 = []; 
            if($modulo>0){
                //  deuxieme partie du tableau
                for ($i= (int)($taille/2) + 1 ; $i < $taille; $i++) { 
                    array_push($TAB2, $TAB[$i]);
                }
                $TAB2[] = $TAB[(int)($taille/2)];
                //  premier partie du tableau
                for ($i= 0 ; $i <= (int)($taille/2) - 1; $i++) { 
                    array_push($TAB1, $TAB[$i]);
                } 
                return array_merge($TAB2, $TAB1);

            }else{
                //  deuxieme partie du tableau
                for ($i= (int)($taille/2) ; $i < $taille; $i++) { 
                    array_push($TAB2, $TAB[$i]);
                }
                for ($i=0 ; $i <= (int)($taille/2) - 1; $i++) { 
                    array_push($TAB1, $TAB[$i]);
                }
                return array_merge($TAB2, $TAB1);
            }
        }
        // Cette fonction crypte un texte suivant la fonction de Jules Cesar par pas de 4
        function CryptageJulesCesar ($texte){
            $resultat = "";
            $moduloCaractere = 4 % 26; // Pour gérer les décalages supérieurs à 26
        
            for ($i = 0; $i < strlen($texte); $i++) {
                $caractere = $texte[$i];
        
                // Vérifier si le caractère est une lettre
                if (ctype_alpha($caractere)) {
                    $codeAsci = ord($caractere);
                    $majulculeOUpas = ctype_upper($caractere);
        
                    // Calculer le décalage
                    $decalage = $codeAsci + $moduloCaractere;
        
                    // Gérer le dépassement de l'alphabet
                    if ($majulculeOUpas){
                        if ($decalage > ord('Z')) {
                            $decalage -= 26;
                        }
                    } else {
                        if ($decalage > ord('z')) {
                            $decalage -= 26;
                        }
                    }
        
                    $resultat .= chr($decalage);
                } else {
                    $resultat .= $caractere; // Conserver les caractères non alphabétiques
                }
            }
            return $resultat;

        }
        // Cette fonction décrypte un texte suivant la fonction de Jules Cesar par pas de 4.
        function DecrypteJulesCesar ($texte) {
            $resultat = "";
            $moduloCaractere = 4 % 26; // Pour gérer les décalages supérieurs à 26
        
            for ($i = 0; $i < strlen($texte); $i++) {
                $caractere = $texte[$i];
        
                // Vérifier si le caractère est une lettre
                if (ctype_alpha($caractere)) {
                    $codeAsci = ord($caractere);
                    $majulculeOUpas = ctype_upper($caractere);
        
                    // Calculer le décalage
                    $decalage = $codeAsci - $moduloCaractere;
        
                    // Gérer le dépassement de l'alphabet
                    if ($majulculeOUpas) {
                        if ($decalage < ord('A')) {
                            $decalage += 26;
                        }
                    } else {
                        if ($decalage < ord('a')) {
                            $decalage += 26;
                        }
                    }
        
                    $resultat .= chr($decalage);
                } else {
                    $resultat .= $caractere; // Conserver les caractères non alphabétiques
                }
            }
        
            return $resultat;
        }
        // Cette fonction crypte un message en respectant les étapes du tableau suivant
        function Crypter ($message){

        }
        // Cette fonction décrypte un message crypté en respectant le sens inverse des 
        // étapes du tableau ci-haut (point 10)
        function DeCrypter ($message){

        }
        
    }

    $objetJule = new Module_class();
    $TAB = ["aliou", "modou", "fatou", "abasa", "amdy"];
    print_r($objetJule->InverserTAB($TAB));
    
?>
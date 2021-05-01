<?php
    # Fonction pour générer des no de facture aléatoires
    function nofacture_alea() {
        
        $annee = date("Y");
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $num = "0123456789";
        $caracalea = $alphabet[mt_rand(0,25)];
        $nbralea = "";
        for ($i = 0; $i < 4; $i ++) {
            $nbralea .= $num[mt_rand(0,9)];
        }
        
        return($caracalea.$annee."-".$nbralea);
    }
    # Fonction pour générer des date d'échéances aléatoires
    function echeance_alea() {
    
        $anneeressource = array("20","21");
        $moisressource = array("01","02","03","04","05","06","07","08","09","10","11","12");
        $jourressource = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
        $annee = $anneeressource[mt_rand(0,1)];
        $mois = $moisressource[mt_rand(0,11)];
        if ($mois == 02) {
            $jour = $jourressource[mt_rand(0,27)];
        }
        else
        $jour = $jourressource[mt_rand(0,30)];
    
        return($jour."/".$mois."/".$annee);
    }
?>
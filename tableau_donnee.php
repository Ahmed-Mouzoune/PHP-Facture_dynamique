<?php 
# Tableau avec info entreprise
$entreprise = array(
    "nom" => "Mongi Assistance",
    "courriel" => "mongifour@gmail.com",
    "telephone" => "0620011029",
    "adresse" => "10 place andre malraux",
    "ville" => "Villeneuve-la-garenne, 92390",
    "siren" => "488665399",
    "ape" => "3312Z",
    "logo" => "https://static4.pagesjaunes.fr/media/ugc/mongi_assistance_villeneuve_la_garenne_logo_blanc__154431253"
    );
# Tableau avec commentaires
$commentaire = array(
    "En votre aimable règlement.",
    "Ce fut un plaisir, d'avoir fait affaire avec vous.",
    "Merci de régler la facture avant la date d'échéance.",
    "N'hésitez pas à me recontacter."
); 

# Tableau avec info client
$client = array(
    "nom" => "Boulangerie Baraka",
    "adresse" => "109 rue de l'ambassadeur",
    "ville" => "Conflant saint Honore, 78700",
    "courriel" => "mongifour@gmail.com",
    "telephone" => "0620011029"
    );   

# Tableau avec les produits
$produit = array(
    array(
        "nom" => "Déplacement IDF<80km",
        "ref" => "DEPIDF>80",
        "prixunitaire" => 78,
        "quantite" => 1
    ),
    array(
        "nom" => "Forfait MAIN D'OEUVRE",
        "ref" => "MO",
        "prixunitaire" => 78,
        "quantite" => 1
    ),
    array(
        "nom" => "Canne a buée Four zucchelli",
        "ref" => "ZUPRC62",
        "prixunitaire" => 140,
        "quantite" => mt_rand(1,5)
    ),
    array(
        "nom" => "Résistance 1500w PRC50 ronde (four zucchelli)",
        "ref" => "ZUPRC50",
        "prixunitaire" => 160,
        "quantite" => mt_rand(1,5)
    ),
    array(
        "nom" => "Bride complete 8 trous pour A.buée",
        "ref" => "ZUCBR10TROUS",
        "prixunitaire" => 700,
        "quantite" => mt_rand(1,5)
    ),
    array(
        "nom" => "repose-paton",
        "ref" => "RP",
        "prixunitaire" => 24,
        "quantite" => mt_rand(1,5)
    )
    );

# Variables date facture
$datefacture = date("d/m/y");
#Variable dynamique pour le commentaire
$commentairealea = $commentaire[mt_rand(0,3)];

?>
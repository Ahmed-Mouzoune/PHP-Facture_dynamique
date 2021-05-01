<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./style.css">
    <?php
    # Ajout du fichier avec les données entreprises et clients
    include ("tableau_donnee.php");
    # Ajout du fichier avec les fonctions
    include ("fonction.php");
    ?>
    <title>Facture</title>
</head>
    <body>
        <section id="main">
            <header class="conteneur_largeur_page">
                <div class="conteneur_header_logo_nomentreprise">
                    <div>
                        <h1><?php echo($entreprise["nom"]) ?></h1>
                        <h2 id="sous_titre_facture">Facture</h2>
                    </div>
                    <!--Logo entreprise-->
                    <div>
                        <img id="logo" src ="<?php echo($entreprise["logo"])?>" alt="logo <?php echo($entreprise["nom"])?>">
                    </div>
                </div> 
                <div class="conteneur_header_facture_client">
                    <!--Info Client-->
                    <div>
                        <h3 class="h3facture conteneur_margin_auto">Facture à l'intention de :</h3>
                        <table>
                            <tr>
                                <td>Nom : </td><td><?php echo($client["nom"])?></td>
                            </tr>
                            <tr>
                                <td>Adresse : </td><td><?php echo($client["adresse"])?></td>
                            </tr>
                            <tr>
                                <td>Ville : </td><td><?php echo($client["ville"])?></td>
                            </tr>
                            <tr>
                                <td>Mail : </td><td><?php echo($client["courriel"])?></td>
                            </tr>
                            <tr>
                                <td>Téléphone : </td><td><?php echo($client["telephone"])?></td>
                            </tr>
                        </table>    
                    </div>
                    <!--Info Facture-->
                    <div>
                        <h3 class="h3facture conteneur_margin_auto">Facture :</h3>
                        <table>
                            <tr>
                                <td>No de facture : <?php echo(nofacture_alea())?></td>
                            </tr>
                            <tr>
                                <td>Date de facture : <?php echo($datefacture)?></td>
                            </tr>
                            <tr>
                                <td>Date d'échéance : <?php echo(echeance_alea())?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </header>
            <main class="conteneur_largeur_page">
                <!--Titre facture du tableau-->
                <div class="conteneur_largeur_page h3facture conteneur_margin_top">
                    <h3 id="titre_tableau" class="conteneur_margin_auto text-center">FACTURE</h3>
                </div>
                <!--Tableau-->
                <div class="conteneur_largeur_page">
                    <table id="tableau">
                        <thead>
                            <tr>
                                <th class="border_cellule_tableau largeurcolref color_celluleth_tableau">Référence</th>
                                <th class="border_cellule_tableau largeurcoldesignation color_celluleth_tableau">Désignation</th>
                                <th class="border_cellule_tableau text-center largeurcolqte color_celluleth_tableau">Qté</th>
                                <th class="border_cellule_tableau text-center largeurcolpht color_celluleth_tableau">PU HT €</th>
                                <th class="border_cellule_tableau text-center largeurcolpht color_celluleth_tableau">PT HT €</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                # Variable pour le montant total HT
                                $totalht = 0;                 
                                foreach ($produit as $prod) {
                                    echo("<tr>");
                                        echo("<td class=\"border_cellule_tableau text-center\">".$prod["ref"]."</td>\n");
                                        echo("<td class=\"border_cellule_tableau padding_coldesignation\">".$prod["nom"]."</td>\n");
                                        echo("<td class=\"border_cellule_tableau text-center\">".$prod["quantite"]."</td>\n");
                                        echo("<td class=\"border_cellule_tableau text-center\">".$prod["prixunitaire"]."</td>\n");
                                        echo("<td class=\"border_cellule_tableau text-center\">".$prod["prixunitaire"]*$prod["quantite"]."</td>\n");
                                    echo("<tr>\n");

                                    $totalht += $prod["prixunitaire"]*$prod["quantite"]; 
                                }
                                #Variable tva dynamique
                                $tva = 20;
                                # Variable Total tva pour le calcul TTC
                                $totaltva = ($totalht/100)*$tva;
                            ?>
                        </tbody>
                    </table>
                </div>
                <!--HT,TVA et TTC-->
                <div class="divTotal conteneur_margin_top">
                    <table>
                        <!--HT-->
                        <tr>
                            <th>Total HT €</th>
                            <td class="border_cellule_tableau text-center"><?php echo($totalht) ?></td>
                        </tr>
                        <!--TVA-->
                        <tr>
                            <th>TVA <?php echo($tva) ?>%</th>
                            <td class="border_cellule_tableau text-center"><?php echo($totaltva) ?></td>
                        </tr>
                        <!--TTC-->
                        <tr>
                            <th>Total TTC €</th>
                            <td class="border_cellule_tableau text-center"><?php echo($totalht+$totaltva) ?></td>
                        </tr>
                    </table>
                </div>
                <!--Commentaire-->
                <div id="div_commentaire" class="conteneur_largeur_page conteneur_margin_top">
                    <h3 id="titre_commentaire" class="border_cellule_tableau">Commentaires</h3>
                    <p id="commentaire" class="border_cellule_tableau"><?php echo($commentairealea) ?></p>
                </div>
            </main>
            <footer class="conteneur_largeur_page">
                <!--Mention légales-->
                <div>
                    <p>
                        Conformément à la loi n°92-1442 du 31/12/92, il est précisé que faute de paiement à la date d'échéance, un intérêt de retard égal à 1,5 fois le taux légal sera appliqué, sans préjudice de tous autres dommages et intérêts et frais.
                        <br>
                        En cas de retard de paiement indemnité forfaitaire légale pour frais de recouvrement : 40 €
                    </p>
                </div>
                <!--Info Entreprise-->
                <div class="conteneur_footer_infoentreprise">
                    <div>
                        <table>
                            <tr>
                                <td><?php echo($entreprise["nom"])?></td>
                            </tr>
                            <tr>
                                <td><?php echo($entreprise["adresse"]." ".$entreprise["ville"])?></td>
                            </tr>
                            <tr>
                                <td>SIREN : <?php echo($entreprise["siren"])?> / Code APE : <?php echo($entreprise["ape"])?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="conteneur_marginleft_auto">
                        <table>
                            <tr>
                                <td>Email : </td><td><?php echo($entreprise["courriel"])?></td>
                            </tr>
                            <tr>
                                <td>Tél : </td><td><?php echo($entreprise["telephone"])?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </footer>
        </section>
    </body>
</html>
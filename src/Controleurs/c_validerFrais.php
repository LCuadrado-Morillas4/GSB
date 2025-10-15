<?php
/** BY LC4
 * Vue Accueil Comptable
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * 
 */

$lesVisiteurs = $pdo->getLesVisiteurs();
$visiteurASelectionner = "Ayot";

$lesMois = array();
$listeMois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin" , "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
foreach($listeMois as $unMois) {
    $cpt = 1;
    $lesMois[] = array(
        'mois' => $unMois,
        'numMois' => $cpt
    );
    $cpt++;
}
$moisASelectionner = "Janvier";

require PATH_VIEWS . 'v_validerFrais.php';
<?php
/** 
 * Vue Suivi de fiche de frais
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
 * TODO  
 */
use Outils\Utilitaires;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$lesVisiteurs = $pdo->getLesVisiteurs();

$idVisiteur = filter_input(INPUT_POST, 'visiteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$leMois = filter_input(INPUT_POST, 'mois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($idVisiteur)) {
    $visiteurASelectionner = $pdo->getInfosVisiteurById($idVisiteur);
    $moisASelectionner = $leMois;
    $lesMois = $pdo->getLesMoisDisponiblesARembourser($idVisiteur, "VA");
    if (isset($leMois)) {
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);

        $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        $pVehicule = $lesInfosFicheFrais['pVehicule'];
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    }
}

switch ($action) {
    case 'selectionnerFiche' :

        include PATH_VIEWS . 'v_listeVisiteursASuivre.php';
        include PATH_VIEWS . 'v_listeMoisASuivre.php';
        break;

    case 'afficherFrais':

        include PATH_VIEWS . 'v_listeVisiteursASuivre.php';
        include PATH_VIEWS . 'v_listeMoisASuivre.php';
        include PATH_VIEWS . 'v_suivrePaiement.php';
        break;

    case 'rembourserFiche':
        
        $pdo->majEtatFicheFrais($idVisiteur, $leMois, "RB");

        include PATH_VIEWS . 'v_listeVisiteursASuivre.php';
        include PATH_VIEWS . 'v_listeMoisASuivre.php';
        include PATH_VIEWS . 'v_suivrePaiement.php';
        break;
}
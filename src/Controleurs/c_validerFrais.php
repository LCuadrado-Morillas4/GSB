<?php

/**
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
/*
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case 'selectionnerVisiteur' :
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $visiteurASelectionner = $lesVisiteurs[0];
        include PATH_VIEWS . 'v_listeVisiteurs.php';
    case 'selectionnerMois' :
        $lesMois = $pdo->getLesMoisDisponibles($visiteur['id']);
        include PATH_VIEWS . 'v_listeMois.php';
}*/

$lesVisiteurs = $pdo->getLesVisiteurs();
$visiteurASelectionner = $lesVisiteurs[0];

$lesMois = $pdo->getLesMoisDisponibles($visiteur['id']);
$lesMois = $pdo->getLesMoisDisponibles($_POST['visiteur']['nom']);



require PATH_VIEWS . 'v_validerFrais.php';

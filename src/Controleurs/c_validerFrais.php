<?php

/**
 * Gestion validation des frais
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

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

switch ($action) {
    case 'selectionnerFiche' :
        $lesVisiteurs = $pdo->getLesVisiteurs();
        $leVisiteur = filter_input(INPUT_POST, 'visiteur', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (isset($leVisiteur)) {$visiteurASelectionner = $pdo->getInfosVisiteurById($leVisiteur);}
        $lesMois = $pdo->getLesMoisDisponibles($leVisiteur);
        include PATH_VIEWS . 'v_listeVisiteurs.php';
        include PATH_VIEWS . 'v_listeMoisValider.php';
}
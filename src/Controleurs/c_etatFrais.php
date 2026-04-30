<?php

/**
 * Gestion de l'affichage des frais
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
 */
use Outils\Utilitaires;
use Outils\fpdf;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$idVisiteur = $_SESSION['id'];
switch ($action) {
    case 'selectionnerMois':
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        $lesCles = array_keys($lesMois);
        $moisASelectionner = $lesCles[0];
        include PATH_VIEWS . 'v_listeMois.php';
        break;
    case 'voirEtatFrais':
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur);
        $moisASelectionner = $leMois;
        include PATH_VIEWS . 'v_listeMois.php';
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $leMois);
        $lesFraisForfait = $pdo->getLesFraisForfait($idVisiteur, $leMois);
        if ($pdo->isSetPuissanceVehicule($idVisiteur, $leMois)) {
            $lesInfosFicheFrais = $pdo->getToutesLesInfosFicheFrais($idVisiteur, $leMois);
            $pVehicule = $lesInfosFicheFrais['pVehicule'];
        } else {
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur, $leMois);
        }
        $numAnnee = substr($leMois, 0, 4);
        $numMois = substr($leMois, 4, 2);
        $libEtat = $lesInfosFicheFrais['libEtat'];
        $montantValide = $lesInfosFicheFrais['montantValide'];
        $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
        $dateModif = Utilitaires::dateAnglaisVersFrancais($lesInfosFicheFrais['dateModif']);
        include PATH_VIEWS . 'v_etatFrais.php';
        break;
    case 'genererPDF':
        if (ob_get_length()) {
            ob_end_clean();
        }

        $mois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $matricule = $idVisiteur;
        $infosVisiteur = $pdo->getNomEtPrenomVisiteur($idVisiteur);
        $nom = mb_strtoupper($infosVisiteur[0]) . ' ' . $infosVisiteur[1];
        $moisComplet = Utilitaires::getDateTextuelle($mois);

        // Nom du fichier
        $nomFichier = 'FICHEFRAIS' . mb_strtoupper($infosVisiteur['nom'], 'utf-8') . mb_strtoupper($infosVisiteur['prenom'], 'utf-8') . '_' . $mois . '.pdf';

        $dossierPDF = '../etatfrais_visiteurs/';
        if (!is_dir($dossierPDF)) {
            mkdir($dossierPDF, 0777, true);
        }

        $cheminAvecDossier = $dossierPDF . $nomFichier;

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);

        $largeurLogo = 50;
        $xLogo = ($pdf->GetPageWidth() - $largeurLogo) / 2;
        $yLogo = 10;

        if (file_exists('images/logo.jpg')) {
            $pdf->Image('images/logo.jpg', $xLogo, $yLogo, $largeurLogo);
        }

        $pdf->SetY($yLogo + 35);

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->SetTextColor(31, 73, 125); // Bleu foncé style GSB
        $pdf->Cell(0, 10, mb_convert_encoding('ETAT DE FRAIS ENGAGÉS', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

        $pdf->SetFont('Arial', 'I', 10);
        $pdf->SetTextColor(0, 0, 0); // Retour au noir
        $pdf->Cell(0, 5, mb_convert_encoding('Document a retourner accompagné des justificatifs à chaque fois.', 'ISO-8859-1', 'UTF-8'), 0, 1, 'C');

        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 12);
        $pdf->SetFillColor(240, 240, 240);

        // Ligne Visiteur / Matricule (Identification)
        $pdf->Cell(30, 8, 'Visiteur :', 0, 0);
        $pdf->Cell(60, 8, mb_convert_encoding($nom, 'ISO-8859-1', 'UTF-8'), 0, 0, 'L');
        $pdf->Cell(30, 8, 'Identifiant :', 0, 0);
        $pdf->Cell(40, 8, $matricule, 0, 1, 'L');

        // Ligne Mois
        $pdf->Cell(30, 8, 'Mois :', 0, 0);
        $pdf->Cell(60, 8, mb_convert_encoding($moisComplet, 'ISO-8859-1', 'UTF-8'), 0, 1, 'L');

        $pdf->Ln(5);

        // En-têtes du tableau de frais forfait
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetFillColor(31, 73, 125);
        $pdf->SetTextColor(255, 255, 255);

        $w = array(60, 40, 40, 40);

        $pdf->Cell($w[0], 8, 'Frais Forfaitaires', 1, 0, 'C', true);
        $pdf->Cell($w[1], 8, mb_convert_encoding('Quantité', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
        $pdf->Cell($w[2], 8, 'Montant unitaire', 1, 0, 'C', true);
        $pdf->Cell($w[3], 8, 'Total', 1, 1, 'C', true);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // FRAIS FORFAIT
        // Obtention des frais forfait du visiteur

        $lesFrais = $pdo->getLesFraisForfait($idVisiteur, $mois);

        // Toutes les variables (qui serviront de valeurs de quantité dans
        // le PDF) sont initialisées à 0.
        $qteNuitee = 0;
        $qteRepas = 0;
        $qteKm = 0;
        $qteEtp = 0;

        foreach ($lesFrais as $unFrais) {
            switch ($unFrais['idfrais']) {
                case 'NUI':
                    $qteNuitee = $unFrais['quantite'];
                    break;
                case 'REP':
                    $qteRepas = $unFrais['quantite'];
                    break;
                case 'KM':
                    $qteKm = $unFrais['quantite'];
                    break;
                case 'ETP':
                    $qteEtp = $unFrais['quantite'];
                    break;
            }
        }

        $lesPrixFixesFraisForfait = $pdo->getLesMontantsForfaitFixes();
        $lesPrixFixesKilometriques = $pdo->getLesMontantskilometriques();
        $vehiculeVisiteur = $pdo->getVehiculeUtilise($idVisiteur, $mois);

        $prixNuitee = $lesPrixFixesFraisForfait[2]['montant'];
        $prixRepas = $lesPrixFixesFraisForfait[3]['montant'];
        $prixKm = 0.52;
        $prixEtp = $lesPrixFixesFraisForfait[0]['montant'];

        foreach ($lesPrixFixesKilometriques as $unPrix) {
            if (isset($unPrix['nom_vehicule']) && isset($vehiculeVisiteur['nom_vehicule'])) {
                if ($unPrix['nom_vehicule'] == $vehiculeVisiteur['nom_vehicule']) {
                    $prixKm = $unPrix['prix'];
                }
            }
        }

        // Nuitées
        $pdf->Cell($w[0], 7, mb_convert_encoding('Nuitée', 'ISO-8859-1', 'UTF-8'), 1, 0);
        $pdf->Cell($w[1], 7, $qteNuitee, 1, 0, 'C');
        $pdf->Cell($w[2], 7, number_format($prixNuitee, 2, ',', ' '), 1, 0, 'R');
        $pdf->Cell($w[3], 7, number_format($qteNuitee * $prixNuitee, 2, ',', ' '), 1, 1, 'R');

        // Repas
        $pdf->Cell($w[0], 7, 'Repas Midi', 1, 0);
        $pdf->Cell($w[1], 7, $qteRepas, 1, 0, 'C');
        $pdf->Cell($w[2], 7, number_format($prixRepas, 2, ',', ' '), 1, 0, 'R');
        $pdf->Cell($w[3], 7, number_format($qteRepas * $prixRepas, 2, ',', ' '), 1, 1, 'R');

        // Kilométrage
        $pdf->Cell($w[0], 7, mb_convert_encoding('Kilométrage', 'ISO-8859-1', 'UTF-8'), 1, 0);
        $pdf->Cell($w[1], 7, $qteKm, 1, 0, 'C');
        $pdf->Cell($w[2], 7, number_format($prixKm, 2, ',', ' '), 1, 0, 'R');
        $pdf->Cell($w[3], 7, number_format($qteKm * $prixKm, 2, ',', ' '), 1, 1, 'R');

        // Étapes
        $pdf->Cell($w[0], 7, mb_convert_encoding('Étape', 'ISO-8859-1', 'UTF-8'), 1, 0);
        $pdf->Cell($w[1], 7, $qteEtp, 1, 0, 'C');
        $pdf->Cell($w[2], 7, number_format($prixEtp, 2, ',', ' '), 1, 0, 'R');
        $pdf->Cell($w[3], 7, number_format($qteEtp * $prixEtp, 2, ',', ' '), 1, 1, 'R');

        $pdf->Ln(10);

        // FRAIS HORS-FORFAIT
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 8, 'Frais hors-forfait', 0, 1);

        // En-têtes
        $pdf->SetFillColor(31, 73, 125);
        $pdf->SetTextColor(255, 255, 255);

        // Colonnes 
        $w2 = array(40, 100, 40);

        $pdf->Cell($w2[0], 8, 'Date', 1, 0, 'C', true);
        $pdf->Cell($w2[1], 8, mb_convert_encoding('Libellé', 'ISO-8859-1', 'UTF-8'), 1, 0, 'C', true);
        $pdf->Cell($w2[2], 8, 'Montant', 1, 1, 'C', true);

        // Données (Boucle foreach ici avec tes vraies données BDD)
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // Remplissage du tableau de frais hors-forfait avec les valeurs
        // correspondant aux frais hors-forfait déclarés par le visiteur
        // sur le mois sélectionné.
        $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
        $montantTotalHF = 0;
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $pdf->Cell($w2[0], 7, $unFraisHorsForfait['date'], 1, 0, 'C');
            $pdf->Cell($w2[1], 7, mb_convert_encoding($unFraisHorsForfait['libelle'], 'ISO-8859-1', 'UTF-8'), 1, 0, 'L');
            $pdf->Cell($w2[2], 7, $unFraisHorsForfait['montant'], 1, 1, 'R');
            $montantTotalHF += $unFraisHorsForfait['montant'];
        }

        $pdf->Cell($w2[0], 7, '', 1, 0, 'C');
        $pdf->Cell($w2[1], 7, '', 1, 0, 'L');
        $pdf->Cell($w2[2], 7, $montantTotalHF . '.00', 1, 1, 'R');

        $pdf->Ln(15);

        $xSignature = 120;
        $pdf->SetX($xSignature);
        $pdf->Cell(60, 10, 'Signature', 0, 1, 'L');

        // Sortie
        $pdf->Output('F', $cheminAvecDossier);

        // Envoi du fichier au visiteur
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $nomFichier . '"');
        header('Content-Length: ' . filesize($cheminAvecDossier));
        readfile($cheminAvecDossier);

        exit;
        break;
}

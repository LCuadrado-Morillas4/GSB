<?php
/** BY LC4
 * Vue Entête Comptable
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
 * @link      https://getbootstrap.com/docs/3.3/ Documentation Bootstrap v3
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap 5.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <!-- Ton CSS -->
        <link href="./styles/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($estConnecte) {
                ?>
                <div class="header">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <h1>
                                <img src="./images/logo.jpg" class="img-fluid" 
                                     alt="Laboratoire Galaxy-Swiss Bourdin" 
                                     title="Laboratoire Galaxy-Swiss Bourdin">
                            </h1>
                        </div>
                        <div class="col-md-8">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item">
                                    <a class="nav-link <?php if (!$uc || $uc == 'accueil') { ?>active bg-warning text-white<?php } ?> text-warning" href="index.php">
                                        <i class="bi bi-house-fill"></i>
                                        Accueil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($uc == 'validerFrais') { ?>active bg-warning text-white<?php } ?> text-warning" href="index.php?uc=validerFrais&action=validerFrais">
                                        <i class="bi bi-check"></i>
                                        Valider fiche de frais
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($uc == 'suivrePaiement') { ?>active bg-warning text-white<?php } ?> text-warning" href="index.php?uc=suivrePaiement&action=suivrePaiement">
                                        <i class="bi bi-currency-euro"></i>
                                        Suivre paiement fiches de frais
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($uc == 'deconnexion') { ?>active bg-warning text-white<?php } ?> text-warning" href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Déconnexion
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <h1 class="text-center">
                    <img src="./images/logo.jpg"
                         class="img-fluid mx-auto d-block"
                         alt="Laboratoire Galaxy-Swiss Bourdin"
                         title="Laboratoire Galaxy-Swiss Bourdin">
                </h1>
                <?php
            }
            ?>
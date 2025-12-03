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
 */
?>
<div id="accueil">
    <h2>
        Gestion des frais 
        <small class="text-muted"> - Comptable : 
            <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></small>
    </h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card border-warning">
            <div class="card-header bg-warning text-white">
                <h3 class="card-title mb-0">
                    <i class="bi bi-bookmark-fill"></i>
                    Navigation
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <a href="index.php?uc=validerFrais&action=selectionnerFiche" 
                           class="btn btn-success btn-lg" role="button">
                            <i class="bi bi-check"></i>
                            <br>Valider fiche de frais
                        </a>
                        <a href="index.php?uc=suivrePaiement&action=selectionnerVisiteur"
                           class="btn btn-primary btn-lg" role="button">
                            <i class="bi bi-currency-euro"></i>
                            <br>Suivre paiement fiche de frais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

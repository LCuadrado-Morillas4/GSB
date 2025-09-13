<?php
/**
 * Vue État de Frais
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
<hr>
<div class="card border-primary mb-3">
    <div class="card-header bg-primary text-white">Fiche de frais du mois 
<?php echo $numMois . '-' . $numAnnee ?> : </div>
    <div class="card-body">
        <strong><u>État :</u></strong> <?php echo $libEtat ?>
        depuis le <?php echo $dateModif ?> <br>
        <strong><u>Montant validé :</u></strong> <?php echo $montantValide ?>

    </div>
</div>
<div class="card border-info mb-3">
    <div class="card-header bg-info text-white">Éléments forfaitisés</div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <tr>
<?php
foreach ($lesFraisForfait as $unFraisForfait) {
    $libelle = $unFraisForfait['libelle'];
    ?>
                    <th><?php echo htmlspecialchars($libelle) ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <td class="qteForfait"><?php echo $quantite ?></td>
                    <?php
                }
                ?>
            </tr>
        </table>
    </div>
</div>
<div class="card border-info mb-3">
    <div class="card-header bg-info text-white">Descriptif des éléments hors forfait - 
        <?php echo $nbJustificatifs ?> justificatifs reçus</div>
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class="montant">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $date = $unFraisHorsForfait['date'];
                    $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                    $montant = $unFraisHorsForfait['montant'];
                    ?>
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><?php echo $libelle ?></td>
                        <td><?php echo $montant ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


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
<div>
    <form method="POST" action="index.php?uc=validerFrais&action=selectionnerVisiteur">
        <label for="visiteur" class="form-label" accesskey="n">Choisir le visiteur :</label>
        <select id="visiteur" name="visiteur" class="form-select">
            <?php
            foreach ($lesVisiteurs as $unVisiteur) {
                $visiteur = $unVisiteur;
                if ($visiteur == $visiteurASelectionner) {
                    ?>
                    <option selected value="<?php echo $visiteur['id'] ?>">
                        <?php echo $visiteur['nom'] . " " . $visiteur['prenom'] ?>
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $visiteur['id'] ?>">
                        <?php echo $visiteur['nom'] . " " . $visiteur['prenom'] ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </form>
    <form
        <label for="lstMois" class="form-label" accesskey="n">Mois :</label>
        <select id="lstMois" name="lstMois" class="form-select">
            <?php
            foreach ($lesMois as $unMois) {
                $mois = $unMois['mois'];
                $numAnnee = $unMois['numAnnee'];
                $numMois = $unMois['numMois'];
                if ($mois == $moisASelectionner) {
                    ?>
                    <option selected value="<?php echo $mois ?>">
                        <?php echo $numMois . '/' . $numAnnee ?>
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $mois ?>">
                        <?php echo $numMois . '/' . $numAnnee ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </form>
</div>
<hr>
<div>
    <h2 class="text-warning">
        Valider la fiche de frais
    </h2>
</div>
<h3>Éléments forfaitisés</h3>
<div>
    <form>
        <fieldset>
            <div>
                Forfait Étape
                <input type="text" id="idFrais" 
                       name="lesFrais[<?php echo $idFrais ?>]"
                       size="10" maxlength="5" 
                       value="0" 
                       class="form-control">
            </div>
            <div>
                Frais Kilométrique
                <input type="text" id="idFrais" 
                       name="lesFrais[<?php echo $idFrais ?>]"
                       size="10" maxlength="5" 
                       value="0" 
                       class="form-control">
            </div>
            <div>
                Nuitée Hôtel
                <input type="text" id="idFrais" 
                       name="lesFrais[<?php echo $idFrais ?>]"
                       size="10" maxlength="5" 
                       value="0" 
                       class="form-control">
            </div>
            <div>
                Repas Restaurant
                <input type="text" id="idFrais" 
                       name="lesFrais[<?php echo $idFrais ?>]"
                       size="10" maxlength="5" 
                       value="0" 
                       class="form-control">
            </div>
            <button class="btn btn-success" type="submit">Corriger</button>
            <button class="btn btn-danger" type="reset">Réinitialiser</button>
        </fieldset>
    </form>
</div>
<hr>
<div class="row">
    <div clas="card border-warning mb-3">
        <div class="card-header bg-warning text-white">Descriptif des éléments hors forfais</div>
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <thead class="table-light">
                    <tr>
                        <th class="date">Date</th>
                        <th class="libelle">Libellé</th>
                        <th class="montant">Montant</th>
                        <th class="action">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
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
 */
?>
<div>
    <form
        <label for="lstVisiteur" class="form-label" accesskey="n">Choisir le visiteur :</label>
        <select id="lstVisiteur" name="lstVisiteur" class="form-select">
            <?php
            foreach ($lesVisiteurs as $unVisiteur) {
                $visiteur = $unVisiteur;
                if ($visiteur == $visiteurASelectionner) {
                    ?>
                    <option selected value="<?php echo $visiteur ?>">
                        <?php echo $visiteur ?>
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $visiteur ?>">
                        <?php echo $visiteur ?>
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
                $numMois = $unMois['numMois'];
                if ($mois == $moisASelectionner) {
                    ?>
                    <option selected value="<?php echo $mois ?>">
                        <?php echo $mois ?>
                    </option>
                    <?php
                } else {
                    ?>
                    <option value="<?php echo $mois ?>">
                        <?php echo $mois ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </form>
</div>
<div>
    <h2 class ="text-warning">
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
                BOUTONS À METTRE
            </div>
        </fieldset>
    </form>
</div>

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
<div> Choisir le visiteur : 
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
<div>
    <h2 class ="text-warning">
        Valider la fiche de frais
    </h2>
</div>
<div>Éléments forfaitisés</div>
<div>
    <ul class="list-group">
        <li class="list-group-item">
            Forfait Étape
        </li>
        <li class="list-group-item">
            Frais Kilométrique
        </li>
        <li class="list-group-item">
            Nuitée Hôtel
        </li>
        <li class="list-group-item">
            Repas Restaurant
        </li>
    </ul>

    <button id="ok" type="submit" class="btn btn-success">Corriger</button>
    <button id="annuler" type="reset" class="btn btn-danger">Réinitisaliser</button>
</div>

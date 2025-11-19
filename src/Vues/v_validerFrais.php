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
<hr>
<h3>Éléments forfaitisés</h3>
<div>
    <form method="post" action="index.php?uc=validerFrais&action=majFraisForfait" onsubmit="return confirm('Voulez-vous appliquer les changements ?');">

        <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
        <input type="hidden" name="mois" value="<?php echo $leMois ?>">

        <table class="table table-bordered align-middle">
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    ?>
                    <th> <?php echo htmlspecialchars($libelle) ?> </th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $idFrais = $unFraisForfait['idfrais'];
                    $quantite = $unFraisForfait['quantite'];
                    ?>
                    <td>
                        <input type="text" id="idFrais" 
                               name="lesFrais[<?php echo $idFrais ?>]"
                               value="<?php echo $quantite ?>" 
                               class="form-control">
                    </td>
                    <?php
                }
                ?>
            </tr>
        </table> 
        <button id="ok" type="submit" class="btn btn-success">Corriger</button>
        <button id="annuler" type="reset" class="btn btn-danger">Réinitialiser</button>

        <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
        <input type="hidden" name="mois" value="<?php echo $leMois ?>">
    </form>
</div>
<hr>
<div>
    <div class="card rounded border-warning mb-3">
        <div class="card-header bg-warning text-white">Descriptif des Éléments Hors Forfait</div>
        <div>
            <table class="table table-bordered border-warning table-responsive">
                <thead>
                    <tr>
                        <th class="date">Date</th>
                        <th class="libelle">Libellé</th>
                        <th class="montant">Montant</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                        $idFraisHorsForfait = $unFraisHorsForfait['id'];
                        $date = $unFraisHorsForfait['date'];
                        $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                        $montant = $unFraisHorsForfait['montant'];
                        ?>
                    <form method="post" action="index.php?uc=validerFrais&action=majFraisHorsForfait">
                        <tr>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfaitD[<?php echo $idFraisHorsForfait ?>]"
                                       value="<?php echo $date ?>" 
                                       class="form-control">
                            </td>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfaitL[<?php echo $idFraisHorsForfait ?>]"
                                       value="<?php echo $libelle ?>" 
                                       class="form-control">
                            </td>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfaitM[<?php echo $idFraisHorsForfait ?>]"
                                       value="<?php echo $montant ?>" 
                                       class="form-control">
                            </td>
                            <td>
                                <button id="ok" type="submit" class="btn btn-success">Corriger</button>
                                <button id="annuler" type="reset" class="btn btn-danger">Réinitialiser</button>
                            </td>
                        </tr>
                    </form>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
            <input type="hidden" name="mois" value="<?php echo $leMois ?>">
        </div>
    </div>
    <div>
        <form>
            <label for="nbJustificatifs">Nombre de justificatifs : </label>
            <input id="number" type="number" value="<?php echo $nbJustificatifs ?>" size="2" min="0" max="15"/><br><br><br>

            <button id="ok" type="submit" class="btn btn-success">Valider La Fiche</button>

            <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
            <input type="hidden" name="mois" value="<?php echo $leMois ?>">
        </form>
    </div>
</div>
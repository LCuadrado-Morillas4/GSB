<?php
/**
 * Vue Valider Frais
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
    <form method="post" action="index.php?uc=validerFrais&action=majFraisForfait" onsubmit="return confirm('Voulez-vous valider les changements ?');">

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
    </form>
</div>
<hr>
<div>
    <div class="card border-warning mb-3">
        <div class="card-header bg-warning text-white">Descriptif des éléments hors forfais</div>
        <form method="post" action="index.php?uc=validerFrais&action=majFraisHorsForfait" onsubmit="return confirm('Voulez-vous valider les changements ?');">

            <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
            <input type="hidden" name="mois" value="<?php echo $leMois ?>">
            <input type="hidden" name="idFraisHors" value="<?php echo $idFraisHorsForfait ?>">

            <table class="table table-bordered border-warning table-responsive">
                <thead>
                    <tr>
                        <th class="date">Date</th>
                        <th class="libelle">Libellé</th>
                        <th class="montant">Montant</th>
                        <th></th>
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
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>
    <div>
        <form method="post" action="index.php?uc=validerFrais&action=validerFicheFrais" onsubmit="return confirm('Fonctionnalité non implémentée');">
            
            <input type="hidden" name="visiteur" value="<?php echo $idVisiteur ?>">
            <input type="hidden" name="mois" value="<?php echo $leMois ?>">
            
            Nombre de justificatifs : <input id="number" type="number" value="<?php echo $nbJustificatifs ?>"/><br>
            
            <button id="ok" type="submit" class="btn btn-success">Corriger</button>
            <button id="annuler" type="reset" class="btn btn-danger">Réinitialiser</button>
        </form>
    </div>
</div>
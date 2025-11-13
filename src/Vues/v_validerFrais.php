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
    <form method="post" action="index.php?uc=validerFrais&action=validerFrais">
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
<div class="row">
    <div clas="card border-warning mb-3">
        <div class="card-header bg-warning text-white">Descriptif des éléments hors forfais</div>
        <div class="card-body">
            <form method="post" action="index.php?uc=validerFrais&action=validerFrais">
            <table class="table table-bordered border-warning table-responsive">
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
                        $idFraisHorsForfait = $unFraisHorsForfait['id'];
                        $date = $unFraisHorsForfait['date'];
                        $libelle = htmlspecialchars($unFraisHorsForfait['libelle']);
                        $montant = $unFraisHorsForfait['montant'];
                        ?>
                        <tr>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfait[<?php echo $idFraisHorsForfait ?>]"
                                       value="<?php echo $date ?>" 
                                       class="form-control">
                            </td>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfait[<?php echo $idFraisHorsForfait ?>]"
                                       value="<?php echo $libelle ?>" 
                                       class="form-control">
                            </td>
                            <td>
                                <input type="text" id="idFraisHorsForfait" 
                                       name="lesFraisHorsForfait[<?php echo $idFraisHorsForfait ?>]"
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
            <form>
                Nombre de justificatifs : <input id="number" type="number" value="<?php echo $nbJustificatifs ?>"/><br>
                <button id="ok" type="submit" class="btn btn-success">Corriger</button>
                <button id="annuler" type="reset" class="btn btn-danger">Réinitialiser</button>
            </form>
        </div>
    </div>
</div>
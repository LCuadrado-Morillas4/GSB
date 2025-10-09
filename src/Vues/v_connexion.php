<?php
/**
 * Vue Connexion
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
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">Identification utilisateur</h3>
            </div>
            <div class="card-body">
                <form method="post" action="index.php?uc=connexion&action=valideConnexion">
                    <fieldset>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input class="form-control" placeholder="Login"
                                       name="login" type="text" maxlength="45">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input class="form-control" placeholder="Mot de passe"
                                       name="mdp" type="password" maxlength="45">
                            </div>
                        </div>
                        <input class="btn btn-success btn-lg w-100"
                               type="submit" value="Se connecter">
                    </fieldset>
                </form>
                <div>
                    <p> Identifiant Visiteur : p.ayot<br> Mot de passe : xiej3uuY0 </p>
                    <p> Identifiant Comptable : fpontarelli<br> Mot de passe : Gt9!kP_2#R / 1hdb7c_A </p>
                </div>
            </div>
        </div>
    </div>
</div>

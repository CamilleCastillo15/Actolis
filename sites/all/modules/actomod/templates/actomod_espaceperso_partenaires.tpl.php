<?php


?>

<div class="espaceperso partenaires">

    <div class="c-form">

      <div class="titres">

            <h3>Espace partenaires</h3>
            Cher partenaire, identifiez - vous :

      </div>

        <div class="cc-block">

            <div class="c-block">

                <div class="c-gradient">

                    <div class="form-col">

                            <div class="description">

                               Vous êtes partenaire Actolis, vous n'avez pas encore accès à votre espace privé ?<br />
                               Il vous suffit d'en faire la demande pour pouvoir accèder à votre espace dédié.

                           </div>

                           <br />
                           <br />

                        <div>
                             <?php //print drupal_render($loginform);
                            $loginform["links"]["#children"] = null;
                            $loginform["links"]["#markup"] = null;
                            print drupal_render($loginform);
                            dpm($loginform);?>

                            <a href="/user/password" title="Request new password via e-mail.">Request new password</a>
                        </div>

                    </div>

                    <div class="clear">


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>






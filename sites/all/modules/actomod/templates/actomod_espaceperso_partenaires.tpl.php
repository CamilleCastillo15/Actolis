<?php


?>

<div class="espaceperso partenaires">

    <div class="c-form">

      <div class="titres">

            <h4>Espace partenaires</h4>
            <h2>Accèder à votre espace privé</h2>

      </div>

        <div class="cc-block">

            <h4>Espace client</h4>

            <div class="c-block">

                <div class="c-gradient">

                    <div class="form-col">

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






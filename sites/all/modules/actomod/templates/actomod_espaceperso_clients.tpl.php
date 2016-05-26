<?php

   
?>

<div class="espaceperso-clients">

    <div class="c-form">

      <div class="titres">

            <h4>Espace client</h4>
           <h2>Accèder à votre espace privé</h2>

      </div>

        <div class="cc-block">

            <h4>Espace client</h4>

            <div class="c-block">



                <div class="c-gradient">

                   <div class="form-col">

                        <div>
                           <h4>LOGIN</h4>
                             <?php print drupal_render($loginform); ?>
                        </div>

                   </div>

                    <div class="form-col">

                        <div >
                           <h4>REGISTER</h4>
                           <div class="description">

                               Vous êtes client Actolis, vous n'avez pas encore accès à votre espace privé ?<br />
                               Il vous suffit d'en faire la demande pour pouvoir accèder à votre espace dédié.

                           </div>

                           <br />
                           <br />

                           <?php
                                print render($registerform["field_lastname"]);
                                $registerform["account"]["name"]["#description"] = "qsd";
                            ?>
                              <?php dpm($registerform); ?>
                           <!-- <hr/> -->
                            <?php print drupal_render($registerform); ?>

                        </div>

                    </div>

                    <div class="clear">


                    </div>

                </div>

            </div>

        </div>

    </div>
    
</div>






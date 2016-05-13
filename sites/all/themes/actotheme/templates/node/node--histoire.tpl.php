<?php

    $styles  = drupal_get_css();

    $body = field_view_field("node",$node,'field_body');
    $image = field_view_field("node",$node,'field_image');


?>

<div class="histoire">

    <div class="c-header">

        <div class="dark-layer">

            <div class="c-picto">
                <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/picto_his_eco.png" alt="">
                <h2>Titre titre titre</h2>
            </div>
            <div class="c-picto">
                <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/picto_his_qualite.png" alt="">
                <h2>Titre titre titre</h2>
            </div>
            <div class="c-picto">
                <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/picto_his_valeurs.png" alt="">
                <h2>Titre titre titre</h2>
            </div>
            <div class="c-picto">
                <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/picto_his_management.png" alt="">
                <h2>Titre titre titre</h2>
            </div>
            <div class="c-picto">
                <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/picto_his_accompagnement.png" alt="">
                <h2>Titre titre titre</h2>
            </div>

        </div>

    </div>

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4>valeurs clefs</h4>
                <p>               
                    <strong>Respect et égalité</strong>

                    <ul>
                        <li>Travail collaboratif avec nos clients : nous avons un même objectif</li>
                        <li>Accès donné à l’ensemble de nos locaux aux personnes à mobilité réduite</li>
                    </ul>
                        
                    <strong>Transparence</strong>

                    <ul>
                        <li>Ensemble des informations fournies à nos clients</li>
                        <li>Transparence sur la capacité ou non à prendre un projet</li>
                    </ul>
               
                    <strong>écoute</strong>

                    <ul>
                        <li>Ecoute des équipes et partenaires Actolis</li>
                        <li>Ecoute de besoins clients</li>
                    </ul>

                </p>

            </div>
            <div class="c-img"> 
                
            </div>


        </div>
    
    </div>


</div>

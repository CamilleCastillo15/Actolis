<?php

    $styles  = drupal_get_css();

    //$title = field_view_field("node",$node,'title');
    $body = field_view_field("node",$node,'body');
    $image = field_view_field("node",$node,'field_image_equipe_partenaire');

    $fc_temoignage = field_get_items('node', $node, 'field_temoignage');

    if($fc_temoignage){
        $idti = array();
        foreach ($fc_temoignage as $fc_field) {
            $idti[] = $fc_field['value'];
        }
        $collectionsg =  field_collection_item_load_multiple($idti);
    }

?>

<div class="equipes_et_partenaire">

    <div class="c-block-histoire">

        <div class="c-blanc">
                
            <div class="c-text">
                <h4><?php print $title ?></h4>

                <?php print render($body) ?>

            </div>
            <div class="c-img"> 
                
            </div>


        </div>
    
    </div>

   <?php

        for($i = 0; $i < count($idti); $i++) {

        $collectiong_2 = $collectionsg[$idti[$i]];

        $title = field_view_field('field_collection_item', $collectiong_2, 'field_titre');

        $image = field_view_field('field_collection_item', $collectiong_2, 'field_image_temoignage');

        $title_image = field_view_field('field_collection_item', $collectiong_2, 'field_titre_image');
        $texte = field_view_field('field_collection_item', $collectiong_2, 'field_texte_temoignage');

    ?>

    <div class="c-block-temoignage">
        <h5><?php print render ($title); ?></h5>
        <div class="sep"></div>
        <div class="clear"></div>
        <div class="c-avatar">
            <?php print render($image) ?>
            <span class="nom"><?php print render($title_image) ?></span>
        </div>
        <div class="c-text"><?php print render($texte) ?></div>
    </div>

    <?php } ?>

<!--
    <div class="c-block-temoignage">
        <h5>témoignage XXXXXXXXXXXX</h5>
        <div class="sep"></div>
        <div class="clear"></div>
        <div class="c-avatar">
            <img src="https://a3-images.myspacecdn.com/images03/30/64305e0fdf2d48ab9faf32bb4c5969c0/300x300.jpg" alt="">
            <span class="nom">gorge abidbol</span>
        </div>
        <div class="c-text">Il faut faire confiance au pouvoir infini de l’Amour. L’Amour est l’Energie de Création, alors si cet Amour demeure en vous, vous participez à la recréation, au réaménagement de votre monde. Vous participez à la mise en place du prochain cycle.</div>
    </div>


    <div class="c-block-temoignage">
        <h5>témoignage XXXXXXXXXXXX</h5>
        <div class="sep"></div>
        <div class="clear"></div>
        <div class="c-avatar">
            <img src="https://a3-images.myspacecdn.com/images03/30/64305e0fdf2d48ab9faf32bb4c5969c0/300x300.jpg" alt="">
            <span class="nom">gorge abidbol</span>
        </div>
        <div class="c-text">Sweet marzipan apple pie jelly dessert jelly I love I love. Fruitcake cotton candy marzipan chocolate cake candy canes. Sweet fruitcake chupa chups gingerbread. Cupcake gummies chocolate bar jujubes gummi bears chocolate cake candy sweet roll lemon drops. Chocolate macaroon apple pie marzipan. Gummies gummies chocolate cake. I love cupcake I love sugar plum I love soufflé chupa chups. Halvah I love toffee. Tiramisu tiramisu chocolate cake candy canes. Croissant pie candy jujubes. Gingerbread cheesecake donut soufflé sesame snaps cheesecake tart. I love toffee donut tiramisu.</div>
        <div class="c-cta">
            <a href="" class="cta">sites partenaires</a>
        </div>
    </div>
-->

</div>

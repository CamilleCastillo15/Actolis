<?php

    $link = url('node/'.$node->nid, array('absolute' => TRUE));

    if($teaser){

        $title = field_view_field("node",$node,'field_titre');
        $description = field_view_field("node",$node,'field_description');
        $image = field_view_field("node",$node,'field_image');

    ?>

    <h4>Nos partenaires</h4>
    <div class="image-acto-news">
        <?php print render($image); ?>
    </div>
    <div class="body-acto-news">
        <h1 class="title"> <?php print render($title); ?> </h1>
        <br />
        <br />
        <?php print render($description); ?>
    </div>

    <?php }   else { ?>

    <?php } ?>






<?php

    $link = url('node/'.$node->nid, array('absolute' => TRUE));

    $title = field_view_field("node",$node,'field_titre');
    $description = field_view_field("node",$node,'field_description');

    $nid = $node->nid;
//    dpm($nid);

    $image = field_get_items("node",$node,'field_image');
    $p = image_style_url("large",$image[0]["uri"]);

    drupal_add_css('.partenaires_list .c-img-'.$nid.' {background-image: url("'.$p.'") !important; } ', 'inline');

    $img = field_view_field("node",$node,'field_image');

    ?>

<div class="partenaires-detail">

    <div class="c-block-histoire">

        <div class="partenaires_list c-gris">
            <div class="c-text" id="num-<?php print render($nid); ?>">
                <h4 class="title liens"><?php print render($title); ?></h4>
                <?php print render($description); ?>
            </div>
            <div class='c-img c-img-<?php print $nid ?>'></div>
            <div class="clear"></div>
        </div>

    </div>

</div>











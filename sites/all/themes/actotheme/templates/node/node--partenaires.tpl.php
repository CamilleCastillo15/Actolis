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

    drupal_add_css('a[href*="partenaires"] {background-color: rgba(255, 255, 255, 0.1) !important;} ', 'inline');
     drupal_add_css('a[href*="partenaires"]::after {
                                                content: "";
                                                position: absolute;
                                                top: 2.4rem;
                                                width: 5rem;
                                                height: 0.15rem;
                                                left: 50%;
                                                -webkit-transform: translate(-50%, 0px);
                                                -ms-transform: translate(-50%, 0px);
                                                transform: translate(-50%, 0px);
                                                background-color: #fff;} ', 'inline');

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











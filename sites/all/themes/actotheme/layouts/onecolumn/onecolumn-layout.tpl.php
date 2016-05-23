<?php  $theme = base_path() . drupal_get_path("theme",$GLOBALS['theme']) ;

?>
<div class="l-header">
    <div class="logo">
        <a href="/">
            <img src="<?php print $theme ?>/imgs/logo_actolis.svg" alt="logo" title="logo" />
            <div class="c-txt">
                <h1>ACTOLIS</h1>
                <p>le partenaire des industrie de la santé</p>
            </div>
        </a>
    </div>

    <div class="user">
        <?php print render($page['user']); ?>
        <ul class="menu">
            <li class="active-trail"><a href="">Consultants</a></li>
            <li><a href="">Partenaires</a></li>
            <li><a href="">Clients</a></li>
        </ul>
             
    </div>
    <div class="clear"></div>
</div>
<div class="l-menu">
    <?php print render($page['header']); ?>
    <div class="domaine-menu">
    <?php

        $view_domaines = views_get_view('domaines');
        $view_domaines->execute();
        $result_domaines = $view_domaines->result;

 ?>

        <ul class="menu">

            <?php foreach($result_domaines as $key => $value) { ?>

                    <?php

                          $n = node_load($value->nid);
                          $link =drupal_get_path_alias("node/".$value->nid);
                          $picto = field_view_field("node",$n,'field_icone');
                          $title = field_view_field("node",$n,'field_titre_domaine');
                          $title_2 = field_view_field("node",$n,'field_titre_domaine_2');

                          $title_render = '<span>'.render($title).'</span>';
                          $title_render = '<span>'.render($title_2).'</span>';
                          $picto_render = '<div class="c-img">'.render($picto).'</div>';

                          echo "<li>";
                          print l($picto_render.$title_render, $link,array("html"=>true, 'attributes' => array('class' => array('c-txt'))));
                          echo "</li>";

                       }
                ?>

        </ul>

    </div>
</div>
<div <?php print $attributes;?>>
    <div class="l-content">
        <?php print $messages; ?>
        <?php print render($page['content']); ?>
    </div>
</div>
<footer class="l-footer text-presentation" >
    <div class="footer-menu">

        <?php print render($page['footer']); ?>

    </div>
</footer>
<div class="l-shield"></div>

<div class="burger h">
    <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 55.4 55.4">
        <circle class="cls-1" cx="27.7" cy="27.7" r="27.7"/>
        <path class="cls-2" id="burger_3"
            d="M31,33H2.7a1.06,1.06,0,0,0,0,2H31a0.85,0.85,0,0,0,.7-1C31.7,33.4,31.5,33,31,33Z"
            transform="translate(10.8 5.7)"/>
        <path class="cls-2" id="burger_2"
            d="M2.7,11H31a0.85,0.85,0,0,0,.7-1c0-.6-0.2-1-0.7-1H2.7A0.85,0.85,0,0,0,2,10,0.85,0.85,0,0,0,2.7,11Z" transform="translate(10.8 5.7)"/>
        <path class="cls-2" id="burger_1"
            d="M31,21H2.7A0.85,0.85,0,0,0,2,22a0.85,0.85,0,0,0,.7,1H31a0.85,0.85,0,0,0,.7-1C31.7,21.4,31.5,21,31,21Z" transform="translate(10.8 5.7)"/>
    </svg>
</div>
<?php print l("Offres de formation", "/content/centre-de-formation", array("html"=>true, 'attributes' => array('class' => array('bt-offres')))); ?>
<a href="" class="bt-top"></a>

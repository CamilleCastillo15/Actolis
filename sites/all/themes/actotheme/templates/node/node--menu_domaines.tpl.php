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
                      $title = field_view_field("node",$n,'title');

                      $title_render = render($title);
                      $picto_render = render($picto);

                      echo "<li>";
                      print l('<div class="picto"></div>'.$title_render, $link,array("html"=>true, 'attributes' => array('class' => array('c-txt'))));
                      echo "</li>";

                   }
            ?>
</ul>

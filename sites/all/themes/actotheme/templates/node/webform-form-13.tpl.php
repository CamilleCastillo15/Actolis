<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array conwtains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */

?>
<?php
  // Print out the progress bar at the top of the page
  print drupal_render($form['progressbar']);

  // Print out the preview message if on the preview page.
  if (isset($form['preview_message'])) {
    print '<div class="messages warning">';
    print drupal_render($form['preview_message']);
    print '</div>';
  }

if(isset($_GET['nid'])){

    $nid = $_GET['nid'];
    $node = node_load($nid);
    $title = $node->title;

}

?>

  <div class="form-col">

      <?php print render($form['submitted']['nom']) ?>
      <?php print render($form['submitted']['prenom']) ?>
      <?php print render($form['submitted']['e___mail']) ?>
      <?php print render($form['submitted']['message']) ?>

  </div>

  <div class="form-col">

      <?php $options_ref = $form['submitted']['reference_du_poste'];
            $options = $form['submitted']['reference_du_poste']['#options'];

                      if(isset($title)){

                          $def = array_search($title, $options);

                          if($def){

                            $options_ref = array(
                              '#title' => 'Référence du poste : *',
                              '#type' => 'select',
                              '#value' => $def,
                              '#options' => $options);
                          }

                          $options_ref['#options'] = $options ;

                      }

                       ?>
      <div class="webform-component">

          <?php print render($options_ref); ?>

      </div>

      <?php print render($form['submitted']['parcourir']) ?>

  </div>



  <div class="clear"></div>
 <?php  print render($form['actions']);
//<?php //print drupal_render_children($form);

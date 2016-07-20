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
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */

//dpm($form);
//dpm($form['submitted']['reference_de_loffre']);

 function AddressList_webform_select_options_info() {
  $items = array();
  $items['reference_de_loffre'] = array(
    'title' => t('Select Address'),
    'options callback' => 'AddressList_options_Address'
  );
  return $items;
}

/**
* Build an options list for use by webforms.
*/

?>

<?php
  // Print out the progress bar at the top of the page
  print drupal_render($form['progressbar']);
  print drupal_render($form['components']);

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
<div class="c-form webform-27">
    <div class="cc-block">
        <div class="c-block">
            <div class="c-gradient">
                  <div class="form-col">
                      <?php print render($form['submitted']['nom']) ?>
                      <?php print render($form['submitted']['prenom']) ?>
                  </div>
                  <div class="form-col">

                      <?php print render($form['submitted']['message']); ?>

                      <?php $options_ref = $form['submitted']['reference_de_loffre'];

                      $options = $form['submitted']['reference_de_loffre']['#options'];

                      if(isset($title)){
                          $def = array_search($title, $options);
                          if($def){
                            $options_ref = array(
                              '#title' => 'Référence de l\'offre',
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
                  </div>
                   <?php  print render($form['actions']); ?>
                  <div class="clear"></div>
            </div>
        </div>
    </div>
</div>


  <?php //print drupal_render_children($form);

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

dpm($form);

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
//function AddressList_options_Address() {
//  $options = array();
//    $options[] = "1|city2 - Address1 - Floor - Building Name";
//    $options[] = "2|city2 - Address2 - Floor - Building Name";
//    $options[] = "3|city2 - Address3 - Floor - Building Name";
//    $options[] = "4|city1 - Address4 - Floor - Building Name";
//  return $options;
//}
////$components = $['#node']->webform['components'];
//
//    $options = array();
//    $options[] = "1|city2 - Address1 - Floor - Building Name";
//    $options[] = "2|city2 - Address2 - Floor - Building Name";
//    $options[] = "3|city2 - Address3 - Floor - Building Name";
//    $options[] = "4|city1 - Address4 - Floor - Building Name";

    $test = array();
    $test[0] = "test |test1";
    $test[1] = "test |test1";
    $test[2] = "test |test1";
    $form['submitted']['reference_de_loffre'] = $test ;

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

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  //print drupal_render($form['submitted']);

//$form['submitted']['nom']['#title'] = 'votre nom';
//$form['submitted']['prenom']['#title'] = 'votre prénom';

//dpm($form['submitted']);

?>

  <div class="form-col">

      <?php print render($form['submitted']['nom']) ?>
      <?php print render($form['submitted']['prenom']) ?>

  </div>

  <div class="form-col">

      <?php print render($form['submitted']['message']) ?>
      <?php print render($form['submitted']['reference_de_loffre']) ?>

  </div>

  <?php print drupal_render_children($form);

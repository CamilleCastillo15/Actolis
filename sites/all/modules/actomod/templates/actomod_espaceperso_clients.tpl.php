<?php

   
?>

<div>
   LOGIN
     <?php print drupal_render($loginform); ?>
    
    
    
</div>
<div >
   REGISTER

   <?php
        print render($registerform["field_lastname"]);
        $registerform["account"]["name"]["#description"] = "qsd";
            
    ?>
      <?php dpm($registerform); ?>    
   <hr/>
    
    
    <?php print drupal_render($registerform); ?>
    
</div>

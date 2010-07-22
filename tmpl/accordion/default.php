<?php
/*
 * Xws_Content Joomla Module
 * @package xws_content
 * @version 0.0.3
 * @author Papa Pathé Séne - Xarala Web Studios Sénégal http://www.xarala.sn
 *
 * Copyright 2010, Papa Pathé Séne - Xarala Web Studios Sénégal
 * Licensed under GPL licence
 *
 * Date: sam. 17 juil. 2010 23:35:32 GMT
 *
 *--------------------------------------------------------------------------------------------- */

/* No direct access to joomla filesystem
 * -------------------------------------------------------------------------------------------- */
  defined('_JEXEC') or die('Restricted access');

?>

<div id = "xwsAccordionModule<?php echo $module->id; ?>">
  <?php foreach ($list as  $item) : ?>
    <h3><?php echo $item->title; ?></h3>
    <div id="<?php echo $index; ?>">
      <div>
	    <?php echo $item->introtext; ?>
	    <a href="<?php echo $item->link; ?>" class="readon ui-state-default ui-corner-all" title = "<?php echo $item->title; ?>" >
          <?php echo Jtext::_("XWS_C_READ_MORE"); ?>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  $(document).ready(function(){
    $.noConflict();
    jQuery.xwsUiHelpers.enableAccordions();
  });
// ]]>
</script>


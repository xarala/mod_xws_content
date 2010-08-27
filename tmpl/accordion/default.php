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

/**
 * Load javascript assets
 * Check for environment parameter to load files locally or by google ajax apis
 * load jquery library
 * load jquery-ui library
 * load xwsUiHelpers
 * ------------------------------------------------------------------------------------------- */
  if ($params->get('load_javascripts') == 1) {
    if ($params->get('environment') == 0) {
      JHTML::script('jquery-1.4.2.js', _XWS_CONTENT_JS_PATH, false);
      JHTML::script('jquery-ui-1.8.2.js', _XWS_CONTENT_JS_PATH, false);
    }
    else {
        #TODO load_jquery from google ajax apis
        #TODO load_jquery_ui from google ajax apis
    }
  }
/**
 * Loads Xws_Ui_helpers
 */
    JHTML::script('jquery.xws.uiHelpers.js', _XWS_CONTENT_JS_PATH, false);

/* Load jquery ui css assets
 *
 * Check for environment parameter to load files locally or by google ajax apis
 * ------------------------------------------------------------------------------------- */
  if ($params->get('load_stylesheets') == 1)  {

    /* Set the user desired theme
     * Load the user desired theme
     * --------------------------------------------------------------------------------- */
      if ($params->get('environment') == 0) {
        JHTML::stylesheet('jquery-ui.css', _XWS_CONTENT_CSS_PATH.DS.$params->get('jquery-ui-theme').DS, array());
      }
      else {
         #TODO load_jquery_ui_stylesheets from google ajax apis
      }

    /* Load the xws content
     * This css style contains overrides for jquery ui
     * -------------------------------------------------------------------------------- */
      JHTML::stylesheet('xws-content.css', _XWS_CONTENT_CSS_PATH, array());

  }
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
<?php
  /**
   * Setup javascript behavior for the layout
   */
?>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  $(document).ready(function(){
    $.noConflict();
    jQuery.xwsUiHelpers.enableAccordions();
  });
// ]]>
</script>


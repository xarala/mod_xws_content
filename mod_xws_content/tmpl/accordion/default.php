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
 *------------------------------------------------------------------------------ */

/* No direct access to joomla filesystem
 * ----------------------------------------------------------------------------- */
  defined('_JEXEC') or die('Restricted access');

/* Load jquery ui css assets
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJqueryUiStylesheets($params);

/**
 * Load javascript assets
 * jquery
 * jquery-ui & xwsUiHelpers
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJquery($params);
  modXwsContentHelper::loadJqueryUi($params);
  $this->_doc->addScriptDeclaration("
  // <![CDATA[
    jQuery.noConflict();
    jQuery(document).ready(function(){
      jQuery.xwsUiHelpers.enableAccordions();
      jQuery.xwsReadmore.buildButtons({
        icon: 'ui-icon-arrowstop-1-e',
        wrapper: 'p.xwsReadMoreWrapper'
      });
    });
  // ]]>
  ");
?>
<div id = "xwsAccordionModule<?php echo $module->id; ?>">
  <?php foreach ($list as  $item) : ?>
  <h3><a href="#" rel="nofollow" title="<?php echo $item->title; ?>"><?php echo $item->title; ?></a></h3>
  <div id="<?php echo $index; ?>" class="textContainer">
    <?php echo $item->introtext; ?>
    <p class="xwsReadMoreWrapper">
      <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" >
        <?php echo Jtext::_("XWS_CONTENT_READ_MORE"); ?>
      </a>
    </p>
  </div>
  <?php endforeach; ?>
</div>


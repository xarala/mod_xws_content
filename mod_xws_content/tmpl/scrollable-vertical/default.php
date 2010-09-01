<?php
/*
 * Xws_Content Joomla Module
 * @package xws_content
 * @subpackage layout
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
  modXwsContentHelper::loadJqueryUiStylesheets($params, array('scrollable-vertical' => true));
  /**
   * override height for this instance of scrollableHorizontal
   */
  $css  = "#xwsScrollableVertical" . $module->id . "{height:" . $params->get('scrollableVerticalHeight') . "px;}";
  $css .= "#xwsScrollableVertical" . $module->id . " .item{height:" . $params->get('scrollableVerticalItemHeight') . "px;}";

  /**
   *Add $css to the document object
   */
  $this->_doc->addStyleDeclaration($css);

/**
 * Load javascript assets
 * jquery
 * jquerytools
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJquery($params);
  modXwsContentHelper::loadJqueryTools($params);

?>
<?php
/**
 * vertical scrollable previous & next buttons
 * ----------------------------------------------------------------------------------------------------------------- */
?>
<div id="actions">
  <a class="prev disabled ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary">
    <span class="ui-button-icon-primary ui-icon ui-icon-carat-1-n"></span>
    <span class="ui-button-text"><?php echo JText::_('PREVIOUS_SCROLLABLE_ITEM') ?></span>
  </a>
  <a class="next ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary">
    <span class="ui-button-icon-primary ui-icon ui-icon-carat-1-s"></span>
    <span class="ui-button-text"><?php echo JText::_('NEXT_SCROLLABLE_ITEM') ?></span>
  </a>
</div>
<?php
/**
 * vertical scrollable implementation
 * ------------------------------------------------------------------------------------------------------------------------------------------------- */
?>
<div id="xwsScrollableVertical<?php echo $module->id; ?>" class="vertical" >
  <div class="items">
  <?php foreach ($list as  $item) : ?>
    <div class="item ui-widget ui-widget-content ui-corner-top textContainer" >
      <h3 class="ui-widget-header ui-corner-all">
        <span class="ui-icon ui-icon-carat-2-n-s"></span>
        <?php echo $item->title; ?>
      </h3>
        <?php echo $item->introtext; ?>
        <p class="xwsReadMoreWrapper">
          <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" >
            <?php echo Jtext::_("XWS_CONTENT_READ_MORE"); ?>
          </a>
        </p>
   </div>
  <?php endforeach; ?>
  </div>
</div>
<?php
/**
 * Setup javascript behavior for the layout
 */
?>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  jQuery.noConflict();
  jQuery(document).ready(function(){
    jQuery('#xwsScrollableVertical<?php echo $module->id ?>').scrollable({
      vertical: true
    });
    jQuery.xwsReadmore.buildButtons({
      icon: 'ui-icon-arrowstop-1-e',
      wrapper: 'p.xwsReadMoreWrapper'
    });
  });
// ]]>
</script>


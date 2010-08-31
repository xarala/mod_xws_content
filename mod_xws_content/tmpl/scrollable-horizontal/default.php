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

/**
 * Load javascript assets
 * jquery
 * jquerytools
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJquery($params);
  modXwsContentHelper::loadJqueryTools($params);

/* Load jquery ui css assets
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJqueryUiStylesheets($params, array('scrollable-horizontal' => true));

?>
<?php
/**
 * horizontal scrollable implementation
 * ------------------------------------------------------------------------------------------------------------------------------------------------- */
?>
<a class="prev browse left"title="<?php echo JText::_('PREVIOUS_SCROLLABLE_ITEM') ?>"></a>
<div id="xwsScrollableHoriontal<?php echo $module->id; ?>" class="scrollable ui-widget ui-widget-content ui-corner-top"
      style="width:<?php echo $params->get('scrollableHorizontalWidth') ?>px; height:<?php echo $params->get('scrollableHorizontalHeight') ?>px;" >
  <div class="items">
  <?php foreach ($list as  $item) : ?>
    <?php /** we substract 20px of padding in scrollableHorizontalHeight and set item width  @see scrollable-horizontal.css */ ?>
    <div class="item textContainer" style="width:<?php echo $params->get('scrollableHorizontalWidth') - 20 ?>px;" >
      <h3 class="ui-widget-header ui-corner-all"><?php echo $item->title; ?></h3>
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
<a class="next browse right"title="<?php echo JText::_('NEXT_SCROLLABLE_ITEM') ?>"></a>
<?php
/**
 * Setup javascript behavior for the layout
 */
?>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  jQuery.noConflict();
  jQuery(document).ready(function(){
    jQuery('#xwsScrollableHoriontal<?php echo $module->id ?>').scrollable({
      speed: 700,
      circular: true
    });
    jQuery.xwsReadmore.buildButtons({
      icon: 'ui-icon-arrowstop-1-e',
      wrapper: 'p.xwsReadMoreWrapper'
    });
  });
// ]]>
</script>


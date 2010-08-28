<?php
/*
 * Xws_Content Joomla Module
 *
 *
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
/**
 * Load javascript assets
 * jquery
 * jquery-ui & xwsUiHelpers
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJquery($params);
  modXwsContentHelper::loadJqueryUi($params);

/* Load jquery ui css assets
 * ----------------------------------------------------------------------------- */
  modXwsContentHelper::loadJqueryUiStylesheets($params);

?>
<div id = "xwsTabs<?php echo $module->id; ?>">
  <ul class=" <?php echo $params->get('moduleclass_sfx'); ?>">
    <?php foreach ($list as $index => $item) : ?>
	    <li>
	      <a href="#tabsItem-<?php echo $index; ?>" title="<?php echo $item->title; ?>" ><?php echo $item->title; ?></a>
	    </li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($list as  $index => $item) : ?>
    <div id="tabsItem-<?php echo $index; ?>">
      <?php echo $item->introtext; ?>
      <p class="xwsReadMoreWrapper">
	      <a href="<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" >
          <?php echo Jtext::sprintf("XWS_CONTENT_READ_MORE_ABOUT" , $item->title); ?>
        </a>
      </p>
      <br />
    </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
  // <![CDATA[
    $(document).ready(function(){
      jQuery.noConflict();
      jQuery.xwsUiHelpers.enableTabs();
      jQuery.xwsReadmore.buildButtons({
        icon: 'ui-icon-arrowstop-1-e',
        wrapper: 'p.xwsReadMoreWrapper'
      });
    });
  // ]]>
</script>


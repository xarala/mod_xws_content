<?php
/* 
 * @name xws_content
 * @package joomla
 * @version 0.0.1 
 * @author Papa Pathé Séne - Xarala Web Studios Sénégal http://www.xarala.sn
 *
 * Copyright 2010, Papa Pathé Séne - Xarala Web Studios Sénégal
 * Licensed under GPL licence
 *
 * Date: sam. 17 juil. 2010 23:35:32 GMT 
 */

// no direct access
  defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
  require_once (dirname(__FILE__).DS.'helper.php');

// get the list of articles
  $list = modXwsTabsHelper::getList($params);

// load javascript assets
  if ($params->get('load_assets') == 1) {
    JHTML::script('jquery-1.4.2.js', $path = 'modules/mod_xws_tabs/js/', false);
    JHTML::script('jquery-ui.1.8.1.js', $path = 'modules/mod_xws_tabs/js/', false);
    JHTML::script('jquery.xws.uiHelpers.js', $path = 'modules/mod_xws_tabs/js/', false);          
  }

// get user desired template
  $template = $params->get('getTemplate','Default');

// require the template
  require(JModuleHelper::getLayoutPath('mod_xws_tabs', $template.DS.'default'));


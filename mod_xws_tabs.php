<?php
/* 
 * @name xws_content
 * @package joomla
 * @version 0.0.3
 * @author Papa Pathé Séne - Xarala Web Studios Sénégal http://www.xarala.sn
 *
 * Copyright 2010, Papa Pathé Séne - Xarala Web Studios Sénégal
 * Licensed under GPL licence
 *
 * Date: sam. 17 juil. 2010 23:35:32 GMT 
 */

// no direct access
  defined('_JEXEC') or die('Restricted access');

// define some constants
  define('_XWS_CONTENT_PATH', 'modules'.DS.'mod_xws_tabs');  
  define('_XWS_CONTENT_JS_PATH', _XWS_CONTENT_PATH.DS.'js'.DS);  
  define('_XWS_CONTENT_CSS_PATH', _XWS_CONTENT_PATH.DS.'css'.DS);

// Include the syndicate functions only once
  require_once (dirname(__FILE__).DS.'helper.php');

// get the list of articles
  $list = modXwsTabsHelper::getList($params);

// get user desired template
  $template = $params->get('getTemplate','accordion');
  
// Set the user desired theme  
   $style = _XWS_CONTENT_CSS_PATH.DS.$params->get('getStyle').DS;
   
// Set the module functionality styling
// each functionality has its own css file
   $moduleFunctionalityStyling = $template.'.css';
   
/* Load javascript assets
 * 
 *  Each javascript asset can be disabled in the module administration section
 *  They can be disabled if you have them included in your main website template or
 *  you're using XwsJoomla templates who have built in support for jquery and jquery-ui
 *  and xwsUihelpers javascript librairies.
 * ------------------------------------------------------------------------------------ */
  if ($params->get('load_jquery') == 1) {
    JHTML::script('jquery-1.4.2.js', _XWS_CONTENT_JS_PATH, false);         
  }
  if ($params->get('load_jquery_ui') == 1) {
    JHTML::script('jquery-ui.1.8.1.js', _XWS_CONTENT_JS_PATH, false);         
  }
  if ($params->get('load_xws_helpers') == 1) {
    JHTML::script('jquery.xws.uiHelpers.js', _XWS_CONTENT_JS_PATH, false);          
  } 
    
// load jquery ui css assets
  JHTML::stylesheet('core.css', $style, array());
  JHTML::stylesheet('theme.css', $style, array());
  JHTML::stylesheet($moduleFunctionalityStyling, $style , array());
    
// require the template
  require(JModuleHelper::getLayoutPath('mod_xws_tabs', $template.DS.'default'));
  

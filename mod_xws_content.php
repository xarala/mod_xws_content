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
 * ------------------------------------------------------------------------------------------- */
  defined('_JEXEC') or die('Restricted access');

/* Definition of XwsJoomla constants
 *-------------------------------------------------------------------------------------------- */
  define('_XWS_CONTENT_PATH', 'modules'.DS.'mod_xws_content');
  define('_XWS_CONTENT_JS_PATH', _XWS_CONTENT_PATH.DS.'js'.DS);
  define('_XWS_CONTENT_CSS_PATH', _XWS_CONTENT_PATH.DS.'css'.DS);

/* Include the helper only once
 *-------------------------------------------------------------------------------------------- */
  require_once (dirname(__FILE__).DS.'helper.php');

/* Get the list of articles
 *-------------------------------------------------------------------------------------------- */
  $list = modXwsContentHelper::getList($params);


/* Get user desired template
 * ------------------------------------------------------------------------------------------- */
    $moduleTemplate = $params->get('getTemplate','accordion');

/* Load javascript assets
 * Check for environment parameter to load files locally or by google ajax apis
 * load jquery library
 * load jquery-ui library
 * load xwsUiHelpers
 * ------------------------------------------------------------------------------------------- */
  if ($params->get('load_jquery') == 1) {
    if ($params->get('environment') == 0) {
      JHTML::script('jquery-1.4.2.js', _XWS_CONTENT_JS_PATH, false);
    }
    else {
        #TODO load_jquery from google ajax apis
    }
  }

  if ($params->get('load_jquery_ui') == 1) {
    if ($params->get('environment') == 0) {
      JHTML::script('jquery-ui.1.8.1.js', _XWS_CONTENT_JS_PATH, false);
    }
    else {
         #TODO load_jquery_ui from google ajax apis
    }
  }

  if ($params->get('load_xws_helpers') == 1) {
    JHTML::script('jquery.xws.uiHelpers.js', _XWS_CONTENT_JS_PATH, false);
  }

/* Load jquery ui css assets
 *
 * Check for environment parameter to load files locally or by google ajax apis
 * ------------------------------------------------------------------------------------- */
  if ($params->get('load_jquery_ui_stylesheets') == 1)  {

    /* Set the user desired theme
     * Load the user desired theme
     * --------------------------------------------------------------------------------- */
      if ($params->get('environment') == 0) {
        $style = _XWS_CONTENT_CSS_PATH.DS.$params->get('getStyle').DS;
        JHTML::stylesheet('jquery-ui.css', $style, array());
      }
      else {
         #TODO load_jquery_ui_stylesheets from google ajax apis
      }

    /* Load the xws content
     * This css style contains overrides for jquery ui
     * -------------------------------------------------------------------------------- */
      JHTML::stylesheet('xws-content.css', _XWS_CONTENT_CSS_PATH, array());

  }


/* Require the template
 * ------------------------------------------------------------------------------------- */
  require(JModuleHelper::getLayoutPath('mod_xws_content', $moduleTemplate.DS.'default'));


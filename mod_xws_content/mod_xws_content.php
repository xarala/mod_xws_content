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

/* Include the helper only once
 *-------------------------------------------------------------------------------------------- */
  require_once (dirname(__FILE__).DS.'helper.php');

/* Get the list of articles
 *-------------------------------------------------------------------------------------------- */
  $list = modXwsContentHelper::getList($params);

/* Get user desired template
 * ------------------------------------------------------------------------------------------- */
    $moduleTemplate = $params->get('jquery-ui-template','accordion');

/* Require the template
 * ------------------------------------------------------------------------------------- */
  require(JModuleHelper::getLayoutPath('mod_xws_content', $moduleTemplate.DS.'default'));


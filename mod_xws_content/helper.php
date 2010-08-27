<?php
/**
* @version		$Id: helper.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

/* No direct access to joomla filesystem
 * -------------------------------------------------------------------------------------------- */

/* Include com_content router to generate urls for articles
 * -------------------------------------------------------------------------------------------- */
require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');


/* Definition of XwsJoomla constants
 *-------------------------------------------------------------------------------------------- */
  define('_XWS_CONTENT_PATH', 'modules'.DS.'mod_xws_content');
  define('_XWS_CONTENT_JS_PATH', _XWS_CONTENT_PATH.DS.'js'.DS);
  define('_XWS_CONTENT_CSS_PATH', _XWS_CONTENT_PATH.DS.'css'.DS);

/**
 * @class modXwsContentHelper
 * @scope public
 */
class modXwsContentHelper
{

  /**
   *
   * @method loadJquery
   * @return void
   */
  public static function loadJquery($params) {
    if ($params->get('load_javascripts') == 1) {
      if ($params->get('environment') == 0) {
        JHTML::script('jquery-1.4.2.js', _XWS_CONTENT_JS_PATH, false);
      }
      else {
          #TODO load_jquery from google ajax apis
      }
    }
  }

  /**
   * @method loadJqueryUi
   * @return void
   *
   */
  public static function loadJqueryUi($params) {
    if ($params->get('load_javascripts') == 1) {
      if ($params->get('environment') == 0) {
        JHTML::script('jquery-ui-1.8.2.js', _XWS_CONTENT_JS_PATH, false);
      }
      else {
          #TODO load_jquery_ui from google ajax apis
      }
      JHTML::script('jquery.xws.uiHelpers.js', _XWS_CONTENT_JS_PATH, false);
      JHTML::script('jquery.xws.readmore.js', _XWS_CONTENT_JS_PATH, false);
    }
  }
  /**
   * @method loadJqueryUiStylesheets
   * @return void
   *
   */
  public static function loadJqueryUiStylesheets($params) {
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
      JHTML::stylesheet('xws-content.css', _XWS_CONTENT_CSS_PATH, array());
    }
  }

  /**
   * @method getList
   * @return JObjectList
   * @param JParameter
   */
	function getList(&$params)
  {
		global $mainframe;

		$db			=& JFactory::getDBO();
		$user		=& JFactory::getUser();

		$count		= intval($params->get('count', 5));
		$catid		= trim($params->get('catid'));
		$secid		= trim($params->get('secid'));
		$show_front	= $params->get('show_front', 1);
		$aid		= $user->get('aid', 0);

		$contentConfig = &JComponentHelper::getParams( 'com_content' );
		$access		= !$contentConfig->get('show_noauth');

		$nullDate	= $db->getNullDate();
		$date =& JFactory::getDate();
		$now  = $date->toMySQL();

		if ($catid)
		{
			$ids = explode( ',', $catid );
			JArrayHelper::toInteger( $ids );
			$catCondition = ' AND (cc.id=' . implode( ' OR cc.id=', $ids ) . ')';
		}
		if ($secid)
		{
			$ids = explode( ',', $secid );
			JArrayHelper::toInteger( $ids );
			$secCondition = ' AND (s.id=' . implode( ' OR s.id=', $ids ) . ')';
		}

		//Content Items only
		$query = 'SELECT a.*,' .
			' CASE WHEN CHAR_LENGTH(a.alias) THEN CONCAT_WS(":", a.id, a.alias) ELSE a.id END as slug,'.
			' CASE WHEN CHAR_LENGTH(cc.alias) THEN CONCAT_WS(":", cc.id, cc.alias) ELSE cc.id END as catslug'.
			' FROM #__content AS a' .
			' LEFT JOIN #__content_frontpage AS f ON f.content_id = a.id' .
			' INNER JOIN #__categories AS cc ON cc.id = a.catid' .
			' INNER JOIN #__sections AS s ON s.id = a.sectionid' .
			' WHERE ( a.state = 1 AND s.id > 0 )' .
			' AND ( a.publish_up = '.$db->Quote($nullDate).' OR a.publish_up <= '.$db->Quote($now).' )' .
			' AND ( a.publish_down = '.$db->Quote($nullDate).' OR a.publish_down >= '.$db->Quote($now).' )'.
			($access ? ' AND a.access <= ' .(int) $aid. ' AND cc.access <= ' .(int) $aid. ' AND s.access <= ' .(int) $aid : '').
			($catid ? $catCondition : '').
			($secid ? $secCondition : '').
			($show_front == '0' ? ' AND f.content_id IS NULL' : '').
			' AND s.published = 1' .
			' AND cc.published = 1' .
			' ORDER BY a.hits DESC';
		$db->setQuery($query, 0, $count);
		$rows = $db->loadObjectList();

		$i		= 0;
		$lists	= array();
		foreach ( $rows as $row )
		{
			if($row->access <= $aid)
			{
				$lists[$i]->link = JRoute::_(ContentHelperRoute::getArticleRoute($row->slug, $row->catslug, $row->sectionid));
			} else {
				$lists[$i]->link = JRoute::_('index.php?option=com_user&view=login');
			}
			$lists[$i]->title = htmlspecialchars( $row->title );
			$lists[$i]->introtext =  $row->introtext;
			$i++;
		}
 // print_r($rows);
		return $lists;
	}
}


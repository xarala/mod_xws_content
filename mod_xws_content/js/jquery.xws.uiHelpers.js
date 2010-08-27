/*
 * @name xwsUihelpers
 * @version 0.0.1
 * @author Xarala Web Studios Sénégal http://www.xarala.sn
 *
 * xwsUihelpers jQuery plugin
 *
 *
 * Copyright 2010, Papa Pathé Séne - Xarala Web Studios Sénégal
 * Licensed under GPL licence
 *
 * Date: sam. 17 juil. 2010 23:35:32 GMT
 */

jQuery.xwsUiHelpers = {

  /* Xws Tabs
    @name: accordion
    @params: options

  --------------------------------------------------------------------*/
	enableTabs: function() {
	  // select all divs with id beginning by xwstabs
	  tabIzables = jQuery('div[id^=xwsTabs]');

	  // options for the tabs
	  options = {
	     collapsible: true
	  }

	  // for each tabIzables tabify it with the options
	  tabIzables.each(function(){
	    jQuery(this).tabs(options);
	  });

	},


  /* Xws Accordions
    @name: accordions
    @params: options

  --------------------------------------------------------------------*/
	enableAccordions: function() {

	  // Selection de tous les éléments avec l'atrribut id commencant par xwsAccordion
	  accordionIzables = jQuery('div[id^=xwsAccordion]');

    //console.log(accordionIzables);

	  // Icônes pour l' accordion
	  icones = { 'header': 'ui-icon-plus', 'headerSelected': 'ui-icon-minus' }

	  // Options pour l' accordion
	  options = {
	              autoHeight: false,
	              collapsible: true,
	              icons: icones
	            }

	  // accordion pour chaque élément séléctionné
		accordionIzables.each ( function(){
		  jQuery(this).accordion(options);
		});
	},


  /* Xws zebraStrippedLists
    @name: zebraStrippedLists
    @params: options

  --------------------------------------------------------------------*/
	zebraStrippedLists: function(){
    $('ul[id^=liste]').each( function (){
      $(this).children().filter('li:even').removeClass('ui-state-default').addClass('ui-state-active');
    });
	}
};


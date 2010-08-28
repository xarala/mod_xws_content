/*
 * @version 0.0.1
 * @author Xarala Web Studios Sénégal http://www.xarala.sn
 *
 * xwsReadmore jQuery plugin
 *
 *
 * Copyright 2010, Papa Pathé Séne - Xarala Web Studios Sénégal
 * Licensed under GPL licence
 *
 * Date: sam. 17 juil. 2010 23:35:32 GMT
 */

/**
 * XwsReadmore is a jQuery plugin adding style to your articles readmore buttons with jQueryUi css framework
 *
 * Example Markup
 * <p class="xwsReadMoreWrapper"><a href="link">linkText</a></p>
 *
 * Enable the behavior in your page
 *
 * $(document).ready(function(){
 *    jQuery.xwsReadmore.buildButtons({
 *      icon: 'ui-icon-plus',
 *      wrapper: 'p.xwsReadMoreWrapper'
 *    });
 * });
 */
jQuery.xwsReadmore = {

  /**
   * default options for plugin
   */
  defaultOptions: {
      icon: 'ui-icon-plus',
      wrapper: 'p.xwsReadMoreWrapper, p.xwsReadMoreWrapperNoIcon'
  },
  /**
   * buildButtons function
   * @param options Hash
   */
  buildButtons:  function(options){
    /**
     * extend caller options with default options
     */
    options = jQuery.extend(jQuery.xwsReadmore.defaultOptions, options);
    /**
     * Concrete implémentation of the plugin
     */
    return jQuery(options.wrapper).each(function(){
      /**
       * Adds jquery ui styles and prepend empty span in the readmore link wrapper
       */
      jQuery(this).addClass('ui-accordion-header ui-corner-all ui-state-default');

      /**
       * if element's classes include xwsReadMoreWrapper then prepend ui-icon
       * otherwise the user don't need an icon for the readmore button
       */
      if(jQuery(this).hasClass('xwsReadMoreWrapper')){
        jQuery(this).append("<span class='ui-icon " + options.icon + "'></span>")
      };

      /**
       * hoverEvent catching
       */
      jQuery(this).hover(
        // hoverIn
        function(){
            jQuery(this).addClass('ui-state-hover').removeClass('ui-state-default');
        },
        // hoverOut
        function(){
            jQuery(this).addClass('ui-state-default').removeClass('ui-state-hover');
        }
      );
    });

  }

}


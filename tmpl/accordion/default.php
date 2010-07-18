<?php 
  // no direct access
  defined('_JEXEC') or die('Restricted access'); 
?>

<div id = "xwsAccordionModule<?php echo $module->id; ?>">
  <?php foreach ($list as  $item) : ?>
    <h3><?php echo $item->title; ?></h3>    
    <div id="<?php echo $index; ?>">
	    <p><?php echo $item->introtext; ?></p>
	    <a href="<?php echo $item->link; ?>" class="readon"title = "<?php echo $item->title; ?>" >
        <span><?php echo Jtext::_("xhr_tabs_readmore"); ?></span>
      </a>
    </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  $(document).ready(function(){
    $.noConflict();
    jQuery.xwsUiHelpers.enableAccordions();
  });
// ]]>
</script>

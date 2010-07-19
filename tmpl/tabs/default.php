<?php 
  // no direct access
  defined('_JEXEC') or die('Restricted access'); 
?>
<div id = "xwsTabs<?php echo $module->id; ?>">
  <ul class=" <?php echo $params->get('moduleclass_sfx'); ?>">
    <?php foreach ($list as $index => $item) : ?>
	    <li class="<?php echo $params->get('moduleclass_sfx'); ?>">
	      <a href="#xwsTabsItem-<?php echo $index; ?>" class="">
		      <?php echo $item->title; ?>
	      </a>
	    </li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($list as  $index => $item) : ?>
    <div id="xwsTabsItem-<?php echo $index; ?>">
	    <p><?php echo $item->introtext; ?></p>
	    <a href="<?php echo $item->link; ?>" 
	       class="readon ui-state-default ui-corner-all"
	       title = "<?php echo $item->title; ?>" >
         <?php echo Jtext::_("XWS_C_READ_MORE"); ?>
      </a>
    </div>
  <?php endforeach; ?>
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
// <![CDATA[
  $(document).ready(function(){
    $.noConflict();
    jQuery.xwsUiHelpers.enableTabs();
  });
// ]]>
</script>

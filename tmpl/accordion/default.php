<?php 
  // no direct access
  defined('_JEXEC') or die('Restricted access'); 
?>

<div id = "accordionModule<?php echo $module->id; ?>">
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
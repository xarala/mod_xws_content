<?php 
  // no direct access
  defined('_JEXEC') or die('Restricted access'); 
?>

<div id = "xhr-tabs">
  <ul class=" <?php echo $params->get('moduleclass_sfx'); ?>">
    <?php foreach ($list as $item) : ?>
	    <li class="<?php echo $params->get('moduleclass_sfx'); ?>">
	      <a href="#<?php echo $index; ?>" class="mostread<?php echo $params->get('moduleclass_sfx'); ?>">
		      <?php echo $item->title; ?>
	      </a>
	    </li>
    <?php endforeach; ?>
  </ul>
  <?php foreach ($list as  $item) : ?>
    <div id="<?php echo $index; ?>">
	    <p><?php echo $item->introtext; ?></p>
	    <a href="<?php echo $item->link; ?>" class="readon"title = "<?php echo $item->title; ?>" >
        <span><?php echo Jtext::_("xhr_tabs_readmore"); ?></span>
      </a>
    </div>
  <?php endforeach; ?>
</div>
<?php echo print_r($list); ?>

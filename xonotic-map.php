<?php
/**
 * \file 
 * \brief Template to displaye a xonotic map (from Xonpress)
 * \param $mapinfo Mapinfo object
 */
global $mapinfo;
?>
<div class='mapinfo'>
<h3 class='mapinfo-title'><?php echo $mapinfo->title; ?></h3>
<div class='mapinfo-author'>By <span class='mapinfo-author-name'><?php echo $mapinfo->author; ?></span></div>
<?php 
	if (!empty($mapinfo->screenshot))
		echo "<img class='mapinfo-screenshot' src='{$mapinfo->screenshot}' alt='{$mapinfo->title}' />";
?>
<p class='mapinfo-description'><?php echo $mapinfo->description;?></p>
<p class='mapinfo-gametypes'>Supported gametypes: <?php echo implode(', ',$mapinfo->gametypes); ?></p>
</div>
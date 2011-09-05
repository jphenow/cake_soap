<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		// in app/webroot/css
		echo $this->Html->css('nerdery');
		//echo $scripts_for_layout;
		//if(isset($cssIncludes)){
if(isset($cssIncludes)){
	foreach($cssIncludes as $css){
		echo $html->css($css);
	}
}

if(isset($jsIncludes)){
	foreach($jsIncludes as $js){
		echo $javascript->link($js);
	}
}
?>

</head>
<body>

<div id="container">
	<h1>The Nerdery's Xbox 360 rating system</h1>

		<div id="content">
			<ul id="nav">
				<li><?php echo $this->Html->link('Home', '/');?></li>
				<li><?php echo $this->Html->link('Games', array('controller'=>'Game', 'action'=>'index'));?></li>
			</ul><br />
			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

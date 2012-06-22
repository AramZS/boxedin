<?php

$sidebars = array('Home Header Far Left', 'Home Header Left', 'Home Header Right', 'Home Header Far Right');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row topwidgets widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

?>
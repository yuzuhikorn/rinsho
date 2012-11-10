<?php
if(function_exists('register_sidebar'))
	register_sidebar(array(
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2 class="widget_title">',
	'after_title' => '</h2>',
));
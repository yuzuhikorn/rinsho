<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contents">
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
 
	<div id="content">
	<div class="post">
	<h2 class="p_title"><?php the_title(); ?></h2>
	<div class="time"><?php the_time('Y年m月d日（D）'); ?></div>
	<div class="body">
		<?php the_content(); ?>
	</div>
	<?php //comments_template(); ?>
	</div>
	</div>
 
<?php
endwhile;
endif;
?>
 </div>

<?php get_footer(); ?>
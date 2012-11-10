<?php get_header(); ?>


<div id="main">
<?php get_sidebar(); ?>

<div id="contents">
<?php $paged = get_query_var( 'paged' ); ?>
<?php query_posts('posts_per_page=4&paged='.$paged) ?>
<?php
if(have_posts()) : while ( have_posts() ) : the_post();
?>
 
<div class="post">
	<h2 class="p_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="time"><?php the_time('Y年m月d日（D）'); ?></div>
	<div class="body">
		<?php the_content('more'); ?>
	</div>
</div>
 
<?php
endwhile;
endif;
?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div>
</div>
 

<?php get_footer(); ?>
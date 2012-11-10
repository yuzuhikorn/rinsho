<?php
/*
Template Name: ドミニカレポート
*/
?>
<?php get_header(); ?>

<div id="main">
<?php get_sidebar(); ?>

<h1>ドミニカレポート</h1>

<div id="contents">
<?php $paged = get_query_var( 'paged' ); ?>
<?php query_posts('order=ASC&cat=4&posts_per_page=2&paged='.$paged) ?>
<?php
if(have_posts()) : while ( have_posts() ) : the_post();
?>
 
<div class="post">
	<h2 class="p_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="time"><?php the_time('Y年m月d日（D）'); ?></div>
	<div class="body"><?php $more=0 ;the_content('more'); ?></div>
</div>
 
<?php
endwhile;
endif;
?>

<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
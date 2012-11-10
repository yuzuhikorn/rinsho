<?php
/*
Template Name: 過去の研修会
*/
?>
<?php get_header(); ?>

<div id="main">
<?php get_sidebar(); ?>

<div id="contents">
<?php $paged = get_query_var( 'paged' ); ?>
<?php query_posts('cat=4&posts_per_page=2&paged='.$paged) ?>
<?php
if(have_posts()) : while ( have_posts() ) : the_post();
?>
 
<div class="post">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php $more=0 ;the_content(); ?>
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
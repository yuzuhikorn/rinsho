<?php
require('./wp_log/wp-load.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>臨床運動障害研究会</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<div id="wrapper">
  <header>
    <img src="./img/header.png" alt="header">
    <ul id="nav">  
		<li><a href="index.html">Home</a></li>  
		<li><a href="./staff/index.html">Staff</a></li>  
		<li><a href="./event/index.html">Event</a></li>  
		<li><a href="./log/">Log</a></li>  
		<li><a href="./volunteer/index.html">Volunteer</a></li>  
	</ul> 
  </header>
  <div id="main">
    <img src="./img/top.jpg" alt="top" width="950">
	<div class="notice">
		<h2>おしらせ</h2>
		<?php
		//paged = get_query_var( 'paged' );
		//query_posts('cat=5&posts_per_page=5&paged='.$paged);
		//if(have_posts()) : while ( have_posts() ) : the_post();
		$args = array( 'numberposts' => 5, 'order'=> 'ASC', 'orderby' => 'title', 'cat' => '5' );
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); ?> 
		<ul>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -<span class="time"><?php the_time('Y年m月d日（D）'); ?></span></li>
		</ul>
		<?php
		endforeach;
		//endwhile;
		//endif;
		?>
		<a href="http://rinshoundoshogai.sakura.ne.jp/log/?page_id=45">お知らせ一覧へ</a>
	</div>
	<div class="new">
		<h2>最新報告</h2>
		<?php
		$args = array( 'numberposts' => 5, 'order'=> 'DESC');
		$postslist = get_posts( $args );
		foreach ($postslist as $post) :  setup_postdata($post); ?> 
		<ul>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -<span class="time"><?php the_time('Y年m月d日（D）'); ?></span></li>
		</ul>
		<?php
		endforeach;
		?>

	</div>
<footer>
<table border="0" width="950px" cellpadding="0">
<tr>
<td class="banner">ドミニカレポート バナー</td>
<td><a href="http://ftp.minasehp.jp/"><img src="./img/m.png" width="210" height="90" alt="水無瀬病院"></a></td>
<td><a href="./mail/index.html"><img src="./img/t.png" width="210" height="90" alt="お問い合わせ"></a></td>
</tr>
</table>
<small>Copyright c 2012 miyazaki-seminar All Rights Reserved. </small>
</footer>
</div>
</html>

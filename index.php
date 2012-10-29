
<?php
require('./wp_log/wp-load.php');

$paged = get_query_var( 'paged' );
query_posts('cat=5&posts_per_page=4&paged='.$paged);
?>



<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>臨床運動障害研究会</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<div id="wrapper">
  <header>
    <img src="./img/header.png" alt="header">
    <ul id="nav">  
		<li><a href="index.html">Home</a></li>  
		<li><a href="./staff/staff.html">Staff</a></li>  
		<li><a href="./event/event.html">Event</a></li>  
		<li><a href="./log/">Log</a></li>  
		<li><a href="./volunteer/volunteer.html">Volunteer</a></li>  
	</ul> 
  </header>
  <div id="main">
    <img src="./img/top.jpg" alt="top" width="950">
	お知らせ
	<?php
	if(have_posts()) : while ( have_posts() ) : the_post();
	?>
	 
	<div class="notice">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
	 
	<?php
	endwhile;
	endif;
	?>
  <footer>
 <table border="0" width="950px" cellpadding="0">
  <tr>
    <td><a href="./event/event.html"><img src="./img/IMG_0350.jpg" width="210" height="90" alt="勉強会"></a></td>
    <td><a href="./volunteer/volunteer.html"><img src="./img/v.png" width="210" height="90" alt="海外ボランティア"></a></td>
    <td><a href="http://ftp.minasehp.jp/"><img src="./img/m.png" width="210" height="90" alt="水無瀬病院"></a></td>
    <td><a href="./mail/mail.html"><img src="./img/t.png" width="210" height="90" alt="お問い合わせ"></a></td>
  </tr>
</table>
	<small>
    Copyright c 2012 miyazaki-seminar All Rights Reserved. </small>
  </footer>
</div>
</html>

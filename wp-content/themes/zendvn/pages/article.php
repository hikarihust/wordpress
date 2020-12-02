<?php 
		global $wpdb;
		
		$tblArticle = $wpdb->prefix . 'zendvn_mp_article';
		$tblUser	= $wpdb->prefix . 'users';
		
		$article = get_query_var('article');
		$sql = 'SELECT a.*, u.user_nicename
				FROM ' . $tblArticle . ' AS a
				INNER JOIN ' . $tblUser . ' AS u
				ON a.author_id = u.ID 
				WHERE a.status = 1';
		$pagename = get_query_var('pagename');
		if(empty($pagename)){
			$sql .= ' AND a.id = ' . $article;
		}else{
			$sql .= ' AND a.slug = \'' . $article .  '\'';
		}
		
		$data = $wpdb->get_row($sql,ARRAY_A);
		
		
		?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entry-title">
		<?php echo $data['title']?>
	</h1>
	<div class="entry-content">
		<?php echo $data['content']?>
	</div>
</div>
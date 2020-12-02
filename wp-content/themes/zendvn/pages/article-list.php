<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1 class="entry-title">
        <?php the_title(); ?>
    </h1>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        $data = array();
        global $wpdb;

        $tblArticle = $wpdb->prefix . 'zendvn_mp_article';
        $tblUser    = $wpdb->prefix . 'users';

        $sql = 'SELECT a.*, u.user_nicename
				FROM ' . $tblArticle . ' AS a
				INNER JOIN ' . $tblUser . ' AS u 
                ON a.author_id = u.ID 
                WHERE a.status = 1
                ORDER BY a.id DESC
                ';

        $total_item = $wpdb->query($sql);
        $per_page    = 5;
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
        $offset     = ($paged - 1) * $per_page;
        $sql .= ' LIMIT ' . $per_page . ' OFFSET ' . $offset;

        $data = $wpdb->get_results($sql, ARRAY_A);
        $pagename = get_query_var('pagename');
        echo '<ul>';
        foreach ($data as $info) {
			if(!empty($pagename)){
				$url = $pagename . '/' . $info['slug'];
			}else{
				$url = '?page_id='. get_query_var('page_id') . '&article=' . $info['id'];
            }
			$url = site_url($url);

            $title = '<a href="' . $url . '">' . $info['title'] . '</a>';
            $content = '<p>' . $info['content'] . '</p>';
            echo '<li>'
                . $title
                . $content
                . '</li>';
        }
        echo '</ul>';
        ?>
        <?php include_once 'paging.php'; ?>
    </div>
</div>
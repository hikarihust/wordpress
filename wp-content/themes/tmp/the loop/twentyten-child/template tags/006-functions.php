<?php
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }

    function twentyten_comment( $comment, $args, $depth ) {
        ?>
<style>
    #zendvn-mp-info{
        background-color: white;
        min-height: 300px;
        border: solid 1px #ccc;
        padding: 10px;
    }
</style>
        <ul>
            <li>comment_id_fields()	: <?php comment_id_fields(comment_ID())?></li>
            <li>comment_reply_link()	: 
            <?php				
                $newArr = array_merge( $args, 
                    array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) 
                        );
                comment_reply_link( $newArr ); 				
            ?>
            </li>
            <li>comment_text()			: <?php comment_text()?></li>
            <li>comment_text_rss()		: <?php comment_text_rss()?></li>
            <li>comment_time()			: <?php comment_time()?></li>
            <li>comment_type()			: <?php comment_type()?></li>
            <li>comments_link()			: <?php comments_link()?></li>
            <li>comments_number()		: <?php comments_number()?></li>
            <li>comments_popup_link()	: <?php comments_popup_link()?></li>				
            <li><hr/></li>
            <li>comment_ID()			    : <?php comment_ID(); ?></li>	
            <li>get_avatar()			    : <?php echo get_avatar($comment, 40 );?></li>				
            <li>next_comments_link()		: <?php next_comments_link()?></li>
            <li>paginate_comments_links()	: <?php paginate_comments_links()?></li>
            <li>permalink_comments_rss()	: <?php //permalink_comments_rss()?></li>
            <li>previous_comments_link()	: <?php previous_comments_link()?></li>
            <li><hr/></li>
        </ul>
        <?php 
    }
?>
<?php 
    if(post_password_required()) return;

    if( !comments_open() && get_comment_pages_count() == 0 ) return;
?>
<?php 
    $comments_number = get_comments_number();
?>
<div class="comments-title">
    <?php 
        if($comments_number == 1) {
            __('There is 1 comment for this article');
        } elseif($comments_number > 1) {
            sprintf(__('There are %s comments for this article'), $comments_number);
        }
    ?>
</div>
<div class="comments-inner clr">
    <ol class="commentlist">
    <?php 
        $args = array(
            'callback'          => 'zendvn_theme_comment',
            'type'              => 'comment',
            'max_depth'         => 5,
        );
        wp_list_comments($args); 
    ?>
    </ol>
    <?php 
        $args = array(
            'cancel_reply_link'    => '<i class="fa fa-times"></i>' . __( 'Cancel comment reply' )
        );
        comment_form($args);
    ?>
</div>
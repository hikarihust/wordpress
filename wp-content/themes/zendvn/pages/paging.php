<?php 
    global $wp_query;
    $big = 999999999;
    $args = array(
        'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'             => '?paged=%#%',
        'total'              => ceil($total_item/$per_page),
        'current'            => max(1,get_query_var('paged')),
        'aria_current'       => 'page',
        'show_all'           => false,
        'prev_next'          => false,
        'prev_text'          => __( '&laquo; Trang truoc' ),
        'next_text'          => __( 'Trang tiep theo &raquo;' ),
        'end_size'           => 1,
        'mid_size'           => 2,
        'type'               => 'list',
        'add_args'           => array(), // Array of query args to add.
        'add_fragment'       => '',
        'before_page_number' => '',
        'after_page_number'  => '',
    );
?>
<div class="site-pagination clr">
    <span class="site-pagination-heading">Pages</span>
    <?php echo paginate_links( $args ); ?>
</div>
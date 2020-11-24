<?php
    $prefix = '';
    $title = '';
    if(is_category()) {
        $prefix = translate('Category') . ': ';
        $title = single_cat_title($prefix, false);
    }

    if(is_tag()) {
        $prefix = translate('Tags') . ': ';
        $title = single_tag_title($prefix, false);
    }

    if(is_search()) {
        $title = translate('Search Results for') . ': ' . get_search_query();
    }

    if(is_date()) {
        $title = single_month_title('', false);
    }
?>
<header class="archive-header clr">
    <h1 class="archive-header-title"><?php echo $title; ?></h1>
    <div class="layout-toggle">
        <span class="fa fa-bars"></span>
    </div>
    <!-- .layout-toggle -->
</header>
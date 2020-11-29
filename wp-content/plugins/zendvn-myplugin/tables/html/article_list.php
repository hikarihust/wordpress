<?php 
	$tblArticle = new Article_Table();
	$tblArticle->prepare_items();
?>
<div class="wrap">
    <h2>Article List</h2>
    <?php $tblArticle->search_box('Search Articles', 'article');?>
    <?php $tblArticle->display();?>
</div>
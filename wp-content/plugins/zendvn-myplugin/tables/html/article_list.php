<?php 
	$tblArticle = new Article_Table();
	$tblArticle->prepare_items();
?>
<div class="wrap">
    <h2>Article List</h2>
    <?php $tblArticle->display();?>
</div>
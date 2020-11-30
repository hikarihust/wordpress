<?php 
    $msg = '';
	$tblArticle = new Article_Table();
    $tblArticle->prepare_items();
    if(@$_GET['msg'] == '1'){
        $msg .='<div class="deleted"><p>Xoa thanh cong</p></div>';
    }
    $page = @$_REQUEST['page'];
?>
<div class="wrap">
    <h1>Article List</h1>
    <?php echo $msg; ?>
    <form action="" method="post" name="<?php echo $page;?>" id="<?php echo $page;?>">
    <?php wp_nonce_field('delete', 'security_code', false); ?>
    <?php $tblArticle->search_box('Search Articles', 'article');?>
    <?php $tblArticle->display();?>
    </form>
</div>
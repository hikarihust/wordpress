<?php 
    $msg = '';
	$tblArticle = new Article_Table();
    $tblArticle->prepare_items();
    if(@$_GET['msg'] == 'delete'){
        $msg .='<div class="deleted"><p>Xoa thanh cong</p></div>';
    }
    if(@$_GET['msg'] == 'status'){
        $msg .='<div class="updated"><p>Cap nhat Status thanh cong</p></div>';
    }
    $page = @$_REQUEST['page'];
?>
<div class="wrap">
    <h1>Article List</h1>
    <?php echo $msg; ?>
    <form action="" method="post" name="<?php echo $page;?>" id="<?php echo $page;?>">
    <?php $tblArticle->search_box('Search Articles', 'article');?>
    <?php $tblArticle->display();?>
    </form>
</div>
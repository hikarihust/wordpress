<?php
$htmlObj = new ZendvnHtml();
$page = $_REQUEST['page'];
$action = 'add';
$lbl = 'Add new an article';
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if ($action == 'edit'){
        $lbl = 'Edit an article';
        $vTitle 	= $row->title;
        $vPicture 	= $row->picture;
        $vContent 	= $row->content;
        $vStatus 	= $row->status;
    }
}

$msg = '';
if (count(@$errors) > 0) {
    $msg .= '<div class="error"><ul>';
    foreach ($errors  as $key => $val) {
        $msg .= '<li>' . $val . '</li>';
    }
    $msg .= '</ul></div>';

    $vTitle     = @$_POST['title'];
    $vPicture     = @$_POST['picture'];
    $vContent     = @$_POST['content'];
    $vStatus     = @$_POST['status'];
}

if(@$_GET['msg'] == '1'){
    $msg .='<div class="updated"><p>Cap nhat thanh cong</p></div>';
}

$title   = $htmlObj->textbox('title', @$vTitle, array('class' => 'regular-text'));
$picture = $htmlObj->textbox('picture', @$vPicture, array('class' => 'regular-text'));
$content = $htmlObj->textarea('content', @$vContent, array('rows' => 6, 'cols' => 60));
$options['data'] = array('Inactive', 'Active');
$status  = $htmlObj->selectbox('status', @$vStatus, array('class' => 'regular-text'), $options);
?>
<div class="wrap">
    <h1><?php echo $lbl;?></h1>
    <?php echo $msg; ?>
    <form method="post" action="" novalidate="novalidate" id="<?php echo $page; ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
		<?php 
			if($action == 'edit'){
				$action 	= 'edit_id_' . $_REQUEST['article'];
			}
		?>
        <?php wp_nonce_field($action, 'security_code', true); ?>
        <?php //wp_referer_field(); ?>

        <h3>Information:</h3>

        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label for="title">Title</label></th>
                    <td><?php echo $title; ?></td>
                </tr>
                <tr>
                    <th scope="row"><label for="picture">Picture</label></th>
                    <td><?php echo $picture; ?></td>
                </tr>
                <tr>
                    <th scope="row"><label for="content">Content</label></th>
                    <td><?php echo $content; ?></td>
                </tr>
                <tr>
                    <th scope="row"><label for="status">Status</label></th>
                    <td><?php echo $status; ?></td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>
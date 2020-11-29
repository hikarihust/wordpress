<?php
$htmlObj = new ZendvnHtml();
$page = $_REQUEST['page'];
$action = 'add';

$title = $htmlObj->textbox('title','',array('class'=>'regular-text'));
?>
<div class="wrap">
    <h1>Add new an article</h1>
    <form method="post" action="" novalidate="novalidate" id="<?php echo $page; ?>" enctype="multipart/form-data">
        <input type="hidden" name="action" value="<?php echo $action; ?>">
        <?php wp_nonce_field($action, 'security_code', false); ?>
        <?php wp_referer_field(); ?>

        <h3>Information:</h3>

        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row"><label for="title">Title</label></th>
                    <td><?php echo $title;?></td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>
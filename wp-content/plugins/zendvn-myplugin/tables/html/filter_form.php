<?php
$htmlObj 	= new ZendvnHtml();
$lbl        = 'Data filter';
$lbl		= '<script>alert("Hello")</script>';
$vTitle 	= 'Zend"/>Password: <input name="password" value="123456"';
$vPicture 	= "<script>alert('Hello')</script>";

$title   = $htmlObj->textbox('title', @$vTitle, array('class' => 'regular-text'));
$picture = $htmlObj->textbox('picture', @$vPicture, array('class' => 'regular-text'));
?>
<div class="wrap">
    <h1><?php echo $lbl;?></h1>
    <form method="post" action="" novalidate="novalidate" id="<?php echo $page; ?>" enctype="multipart/form-data">
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
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>
<?php
$htmlObj 	= new ZendvnHtml();

//===========================================
// HTML/XML // POST - GET - DB
//==========================================
$val = '<h3>
<a href="http://www.zend.vn" title="ZendVN team" data-type="123">Zendvn Team</a>
</h3>
<div>
    <strong class="abc">Hi all!</strong>We are ZendVN Team. :)
</div>';

$allowed_html = array(
    'a' => array(
                'href' => true,
                'title'=> true,
                'data-type' => null
            ),
    'strong' => array(),
    'em' => array(),
    'br' => array(),
);
$protocols = array('mailto','http','https');
echo '<br/>' . wp_kses($val, $allowed_html,$protocols); 

//===========================================
// Integers
//==========================================
/*
$val = 'asdasd123'; //POST - GET - DB

echo  '<br/>orgin: ' . $val;
echo  '<br/>intval: ' . intval($val);
echo  '<br/>absint: ' . absint($val);
*/
//============================================	
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
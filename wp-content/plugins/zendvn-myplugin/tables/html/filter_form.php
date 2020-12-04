<?php
$htmlObj 	= new ZendvnHtml();

//===========================================
// url // POST - GET - DB
//==========================================
/*
$val = 'http://www.zend.vn/<script>alert(\'XSS\')</script>';
echo '<br/>orgin: ' . $val;
echo '<br/>filter:' . esc_url($val);
*/
/*
$val = "javascript:alert('XSS');";
$url = '<a href="' . $val . '">My URL</a>';
echo '<br/>orgin: ' . $url;
echo '<br/>filter:' . '<a href="' . esc_url($val) . '">My URL</a>'; 
*/
//===========================================
// Javascript // POST - GET - DB
//==========================================
/*
$val = 'I love <script>document.write("Wordpress");</script>';
echo '<br/>' . $val;
echo '<br/>' . esc_js($val); 
*/
    
//===========================================
// Attribute Nodes // POST - GET - DB
//==========================================
/*
$js 	= '" onmouseover="alert(\'XSS\');';
$val 	= '<a href="http://www.zend.vn" title="' . $js .'" data-type="123">regular-text</a>';
echo '<br/>orgin: ' . $val;
echo '<br/>filter: ' . '<a href="http://www.zend.vn" title="' . esc_attr($js) .'" data-type="123">regular-text</a>';
*/

/*
$css = '<a href="http://www.zend.vn" title="ZendVN team" data-type="123">regular-text</a>';
echo '<br/>orgin: ' . $css;
echo '<br/>filter: ' . esc_attr($css);

echo '<br/>orgin: ' . $htmlObj->textbox('title', '', array('class' => $css));
echo '<br/>filter: ' . $htmlObj->textbox('title', '', array('class' => esc_attr(sanitize_text_field($css))));
*/
//===========================================
// Text Nodes // POST - GET - DB
//==========================================
/*
$val = '<a href="http://www.zend.vn" title="ZendVN team" data-type="123">Zendvn Team</a>';
echo '<br/>orgin: ' . $val;
echo '<br/>filter: ' . esc_html($val);

echo '<br/>orgin: ' . $htmlObj->textbox('title', $val, array('class' => 'regular-text'));
echo '<br/>filter: ' . $htmlObj->textbox('title', esc_html($val), array('class' => 'regular-text'));

echo '<br/>filter 1:' . $htmlObj->textbox('title',sanitize_text_field($val),array('class'=>'regular-text'));
*/
	
//===========================================
// HTML/XML // POST - GET - DB
//==========================================
$val = '<h3>
            <a href="http://www.zend.vn" title="ZendVN team" data-type="123">Zendvn Team
        
        <div>
            <strong class="abc">Hi all! We are ZendVN Team. :)
        </div>';
// echo force_balance_tags($val);

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
// echo '<br/>' . wp_kses($val, $allowed_html,$protocols); 
// echo '<br/>' . wp_kses_post($val);

$allowed_html = wp_kses_allowed_html('post');
/*
echo '<pre>';
print_r($allowed_html);
echo '</pre>'; 
*/

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
<div class="wrap">

    <h2>My Setting</h2>
    
    <?php settings_errors( $this->_menuSlug, false, false );?>
	
	<p>Đây là trang hiển thị các cấu hình của ZendVN MyPlugin</p>
	<form method="post" action="options.php" id="zendvn-mp-form-setting" enctype="multipart/form-data">
        <?php echo settings_fields('zendvn_mp_options');?>
        <?php echo do_settings_sections($this->_menuSlug);?>

        <?php 
            global $wpdb;
            /*
            $table = $wpdb->prefix . 'zendvn_mp_article';
			$title 		= "This is a test 2"; //$_POST - $_GET - $_POST['title']
			$picture 	= "abc2.png";				// $_POST['title']
			$content 	= "This is a content 2";
			$status 	= 0;		
			
			$query = "INSERT INTO {$table} (`title`,`picture`,`content`,`status`) 
								  VALUES (%s,%s,%s,%d)";
			$info = $wpdb->prepare($query, $title,$picture,$content,$status);
            $wpdb->query($info); 
            */
			
			echo '<pre>';
			print_r($wpdb->users);
			echo '</pre>';	
		?>

        <!-- 
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p> 
        -->
	</form>

</div>
<div class="wrap">

    <h2>My Setting</h2>
    
    <?php settings_errors( $this->_menuSlug, false, false );?>
	
	<p>Đây là trang hiển thị các cấu hình của ZendVN MyPlugin</p>
	<form method="post" action="options.php" id="zendvn-mp-form-setting" enctype="multipart/form-data">
        <?php echo settings_fields('zendvn_mp_options');?>
        <?php echo do_settings_sections($this->_menuSlug);?>

        <?php 
            global $wpdb;

            $table = $wpdb->prefix . 'zendvn_mp_article';
			$query = "SELECT * FROM {$table} WHERE status = 1";			
			$info = $wpdb->get_results($query, ARRAY_A);
			
			echo '<pre>';
			print_r($info);
			echo '</pre>';	
		?>

        <!-- 
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p> 
        -->
	</form>

</div>
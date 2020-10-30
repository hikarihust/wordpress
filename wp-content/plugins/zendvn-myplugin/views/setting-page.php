<div class="wrap">

    <h2>My Setting</h2>
    
    <?php settings_errors( $this->_menu_slug, false, false );?>
	
	<p>Đây là trang hiển thị các cấu hình của ZendVN MyPlugin</p>
	<form method="post" action="options.php" id="<?php echo $this->_menu_slug;?>" enctype="multipart/form-data">
        <?php echo settings_fields($this->_menu_slug);?>
        <?php echo do_settings_sections($this->_menu_slug);?>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
	</form>

</div>
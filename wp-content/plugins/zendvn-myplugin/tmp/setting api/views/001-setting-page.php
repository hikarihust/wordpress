<div class="wrap">

	<h2>My Setting</h2>
	
	<p>Đây là trang hiển thị các cấu hình của ZendVN MyPlugin</p>
	<form method="post" action="options.php" id="zendvn-mp-form-setting" enctype="multipart/form-data">
        <?php echo settings_fields('zendvn_mp_options');?>
        <?php echo do_settings_sections($this->_menuSlug);?>

        <?php //do_settings_fields($this->_menuSlug, 'default');?>
        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
	</form>

</div>
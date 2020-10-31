<div class="wrap">

    <h2>My Setting</h2>
    
    <?php 
        function __settings_errors( $setting = '', $sanitize = false, $hide_on_update = false ) {

            if ( $hide_on_update && ! empty( $_GET['settings-updated'] ) ) {
                return;
            }
        
            $settings_errors = get_settings_errors( $setting, $sanitize );

            if ( empty( $settings_errors ) ) {
                return;
            }

            $result = array();
            foreach ($settings_errors as $key => $value){
              if(!in_array($value, $result))
                $result[$key]=$value;
            }
            $settings_errors = $result;
        
            $output = '';
        
            foreach ( $settings_errors as $key => $details ) {
                if ( 'updated' === $details['type'] ) {
                    $details['type'] = 'success';
                }
        
                if ( in_array( $details['type'], array( 'error', 'success', 'warning', 'info' ), true ) ) {
                    $details['type'] = 'notice-' . $details['type'];
                }
        
                $css_id    = sprintf(
                    'setting-error-%s',
                    esc_attr( $details['code'] )
                );
                $css_class = sprintf(
                    'notice %s settings-error is-dismissible',
                    esc_attr( $details['type'] )
                );
        
                $output .= "<div id='$css_id' class='$css_class'> \n";
                $output .= "<p><strong>{$details['message']}</strong></p>";
                $output .= "</div> \n";
            }
        
            echo $output;
        }
        __settings_errors( $this->_menu_slug, false, false );
    ?>
	
	<p>Đây là trang hiển thị các cấu hình của ZendVN MyPlugin</p>
	<form method="post" action="options.php" id="<?php echo $this->_menu_slug;?>" enctype="multipart/form-data">
        <?php echo settings_fields($this->_menu_slug);?>
        <?php echo do_settings_sections($this->_menu_slug);?>

        <p class="submit">
            <input id="btn-save-change" type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
	</form>

</div>
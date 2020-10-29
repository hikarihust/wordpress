<?php
class Zendvn_Mp_Mb_Media{
	private $_meta_box_id = 'zend-mp-mb-media';

	private $_prefix_key  = '_zend_mp_mb_media_';

	private $_prefix_id = 'zend-mp-mb-media-';

	public function __construct(){
		add_action('add_meta_boxes', array($this,'create'));
		
		add_action('save_post', array($this,'save'));
	}
	
	public function create(){
		add_action('admin_enqueue_scripts', array($this,'add_css_file'));
		// echo '<br/>' . __METHOD__;
		add_meta_box($this->_meta_box_id, 'My Media', array($this,'display'),'post');
	}

	private function create_key($val){
		return $this->_prefix_key . $val;
	}

	private function create_id($val){
		return $this->_prefix_id . $val;
	}
	
	public function display($post){
		wp_nonce_field($this->_meta_box_id,$this->_meta_box_id . '-nonce');
		echo '<div class="zendvn-mb-wrap">';
		echo '<p><b><i>' . translate('Xin vui lòng nhập đầy đủ thông tin vào các ô sau') . ':</i></b></p>';
		
		$htmlObj = new ZendvnHtml();

		//Tao phan tu chua Button
		$inputID 	= $this->create_id('button');
		$inputName 	= $this->create_id('button');
		$inputValue = translate('Media Library Image');
		$arr 		= array('class' =>'button-secondary','id' => $inputID);
		$options	= array('type'=>'button');		
		$btnMedia	= $htmlObj->button($inputName,$inputValue,$arr,$options);

		//Tao phan tu chua file
		$inputID 	= $this->create_id('file');
		$inputName 	= $this->create_id('file');
		$inputValue = get_post_meta($post->ID,$this->create_key('file'),true);
		$arr = array('size' =>'40','id' => $inputID);
		$html 		= $htmlObj->label(translate('File')) 
						. $htmlObj->textbox($inputName,$inputValue,$arr) . ' ' . $btnMedia;
		echo $htmlObj->pTag($html);

		echo $this->add_js_file($this->create_id('button'), $this->create_id('file'));

		echo '</div>';
	}

	public function save($post_id){

		$postVal = $_POST;

		if(!isset($postVal[$this->_meta_box_id . '-nonce'])) return $post_id;

		if(!wp_verify_nonce($postVal[$this->_meta_box_id . '-nonce'],$this->_meta_box_id))  return $post_id;

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

		if(!current_user_can('edit_post', $post_id)) return $post_id;

		$arrData = array(
			'file' 	=> esc_url($postVal[$this->create_id('file')])
		);

		foreach ($arrData as $key => $val){
			update_post_meta($post_id, $this->create_key($key),$val);
		}
		// die();
	}

	//$button_id = zend-mp-mb-media-button
	//$input_id = zend-mp-mb-media-file
	public function add_js_file($button_id, $input_id ){
		$js="
			<script>
				var file_frame;
				jQuery(document).ready(function($){
					$('#{$button_id}').on('click', function(event){
						event.preventDefault();
						if ( file_frame ) {
							file_frame.open();
					return;
					}
					// Create the media frame.
					file_frame = wp.media.frames.file_frame = wp.media({
						title: $( this ).data( 'File upload' ),
						button: {
							text: $( this ).data( 'Upload' ),
						},
						multiple: false  // Set to true to allow multiple files to be selected
					});
					// When an image is selected, run a callback.
					file_frame.on( 'select', function() {
						// We set multiple to false so only get one image from the uploader
						attachment = file_frame.state().get('selection').first().toJSON();
						$('#{$input_id}').attr('value',attachment.url);
					});
					
					// Finally, open the modal
					file_frame.open();
					});
				});
			</script>
		";

		return $js;
	}

	public function add_css_file(){
		wp_register_style('zendvn_mp_mb_data', ZENDVN_MP_CSS_URL . '/mb-data.css', array(),'1.0');
		wp_enqueue_style('zendvn_mp_mb_data');
	}
}
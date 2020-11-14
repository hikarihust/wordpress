<?php
if(class_exists('WP_Customize_Control')){
	class WP_Customize_Category_MutilSelect_Control extends WP_Customize_Control{
        
        private $_custom_args = array();
		public function __construct($manager, $id,$args = array()){
            parent::__construct($manager, $id, $args);
            $this->_custom_args = $args;
		}
		
		public function render_content(){
            $html = '';
            $input_id         = '_customize-input-' . $this->id;
            $description_id   = '_customize-description-' . $this->id;
            $describedby_attr = ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : '';

            $cats = get_categories();
            if (empty($cats)) {
                return;
            }

            $args = $this->_custom_args;

            $size = '';
            $style = '';
			if(isset($args['size']) && $args['size']>1){
                $size = ' size="' . $args['size'] . '" ';
                $style = ' style="height: auto" ';
            } 
            
			$multiple = '';
			if($args['multiple'] == 1){
				$multiple = ' multiple="multiple" ';
            }
            
			// Kiểm tra giá trị của $value
			$strValue = '';
			if(is_array($this->value())){
				$strValue = implode("|", $this->value());
			}else{
				$strValue = $this->value();
			} 

            $strOptions = '<option value="0">--Select--</option>';
			foreach ($cats as $key => $info){
				$selected = '';
				if(preg_match('/^(' . $strValue .')$/i', $key)){
					$selected = ' selected="selected" ';
				}
				$strOptions .= '<option value="' . esc_attr($info->cat_ID) . '"' . $selected .'>' . $info->name . '</option>';
			}

            if (!empty($this->label)) {
                $html .= '<label for="' . esc_attr( $input_id ) . '" class="customize-control-title">' . esc_html( $this->label ) . '</label>';
            }

            if (!empty($this->description)){
                $html .= '<span id="' . esc_attr( $description_id ) . '" class="description customize-control-description">' . $this->description . '</span>';
            }

            $html .= '<select id=" ' . esc_attr( $input_id ) . ' " ' . $describedby_attr . $this->get_link() . ' ' . $size . ' ' . $style . ' ' . $multiple . '>'
                  . $strOptions
                  . '</select>';

            echo $html;
            
        }
	}
}
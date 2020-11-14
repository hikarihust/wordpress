<?php
if(class_exists('WP_Customize_Control')){
	class WP_Customize_Category_List_Control extends WP_Customize_Control{
		
		public function __construct($manager, $id,$args = array()){
			parent::__construct($manager, $id, $args);
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

            $strOptions = '<option value="0">--Select--</option>';
			foreach ($cats as $key => $info){
				$strOptions .= '<option value="' . esc_attr($info->cat_ID) . '"' . selected( $this->value(), $key, false ) .'>' . $info->name . '</option>';
			}

            if (!empty($this->label)) {
                $html .= '<label for="' . esc_attr( $input_id ) . '" class="customize-control-title">' . esc_html( $this->label ) . '</label>';
            }

            if (!empty($this->description)){
                $html .= '<span id="' . esc_attr( $description_id ) . '" class="description customize-control-description">' . $this->description . '</span>';
            }

            $html .= '<select id=" ' . esc_attr( $input_id ) . ' " ' . $describedby_attr . $this->get_link() .'>'
                  . $strOptions
                  . '</select>';

            echo $html;
            
        }
	}
}
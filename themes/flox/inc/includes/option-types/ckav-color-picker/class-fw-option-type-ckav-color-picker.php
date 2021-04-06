<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * RGBA Color Picker
 */
class FW_Option_Type_Ckav_Color_Picker extends FW_Option_Type {
	/**
	 * @internal
	 */
	public function _get_backend_width_type() {
		return 'auto';
	}

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static( $id, $option, $data ) {

		wp_enqueue_style(
			'fw-option-' . $this->get_type(),
			THEME_URI . '/inc/includes/option-types/'. $this->get_type() .'/static/bgrins-spectrum/spectrum.css',
			array(),
			fw()->manifest->get_version()
		);

		wp_enqueue_script(
			'fw-option-' . $this->get_type(),
			THEME_URI . '/inc/includes/option-types/'. $this->get_type() .'/static/bgrins-spectrum/spectrum.js',
			array(),
			fw()->manifest->get_version(),
			true
		);

		wp_localize_script(
			'fw-option-' . $this->get_type(),
			'_fw_option_type_' . str_replace( '-', '_', $this->get_type() ) . '_localized',
			array( 'l10n' => array( 'reset_to_default' => esc_html__( 'Reset', 'flox' ) ) )
		);
	}

	public function get_type() {
		return 'ckav-color-picker';
	}

	/**
	 * @param string $id
	 * @param array $option
	 * @param array $data
	 *
	 * @return string
	 */
	protected function _render( $id, $option, $data ) {

		$option['value'] = (string)$data['value'];
		$option['attr']['value'] = (string)$data['value'];
		$option['attr']['data-default'] = $option['value'];
		$uid_id = uid();

		$option['attr']['data-palettes'] = ! empty( $option['palettes'] ) && is_array( $option['palettes'] ) ? json_encode( $option['palettes'] ) : '';
		
		$html  = '<input type="text" ' . fw_attr_to_html( $option['attr'] ) . ' data-uid="'.$uid_id.'">';
		$html .= '<script>';
		$html .= 'jQuery("[data-uid='.$uid_id.']").spectrum({';
		$html .= '	preferredFormat: "rgb", showInput: true, allowEmpty: true, showAlpha: true,';
		$html .= '	';
		$html .= '});';
		$html .= '</script>';

		return $html;
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input( $option, $input_value ) {
		return (string) ( is_null( $input_value ) ? $option['value'] : $input_value );
	}

	/**
	 * @internal
	 */
	protected function _get_defaults() {
		return array(
			'value' => '',
			//'palettes'=> true
		);
	}
}

FW_Option_Type::register('FW_Option_Type_Ckav_Color_Picker');

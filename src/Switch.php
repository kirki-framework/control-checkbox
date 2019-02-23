<?php
/**
 * Customizer Control: switch.
 *
 * @package     Kirki
 * @subpackage  Controls
 * @copyright   Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license    https://opensource.org/licenses/MIT
 * @since       1.0
 */

use Kirki\Control\Base;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Switch control (modified checkbox).
 */
class Switch extends Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-switch';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		parent::enqueue();

		$url = apply_filters(
			'kirki_package_url_control_checkbox',
			trailingslashit( Kirki::$url ) . 'vendor/kirki-framework/control-checkbox/src'
		);

		// Enqueue the script.
		wp_enqueue_script(
			'kirki-control-checkbox',
			"$url/assets/scripts/control.js",
			[
				'kirki-script',
				'jquery',
				'customize-base',
			],
			KIRKI_VERSION,
			false
		);

		// Enqueue the style.
		wp_enqueue_style(
			'kirki-control-checkbox-style',
			"$url/assets/styles/style.css",
			[],
			KIRKI_VERSION
		);
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="switch<# if ( data.choices['round'] ) { #> round<# } #>">
			<span class="customize-control-title">
				{{{ data.label }}}
			</span>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
			<input class="screen-reader-text" {{{ data.inputAttrs }}} name="switch_{{ data.id }}" id="switch_{{ data.id }}" type="checkbox" value="{{ data.value }}" {{{ data.link }}}<# if ( '1' == data.value ) { #> checked<# } #> />
			<label class="switch-label" for="switch_{{ data.id }}">
				<span class="switch-on">
					<# data.choices.on = data.choices.on || '<?php esc_html_e( 'On', 'kirki' ); ?>' #>
					{{ data.choices.on }}
				</span>
				<span class="switch-off">
					<# data.choices.off = data.choices.off || '<?php esc_html_e( 'Off', 'kirki' ); ?>' #>
					{{ data.choices.off }}
				</span>
			</label>
		</div>
		<?php
	}
}

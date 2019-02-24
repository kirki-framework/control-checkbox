<?php
/**
 * Customizer Control: checkbox.
 *
 * Creates a new custom control.
 * Custom controls contains all background-related options.
 *
 * @package    Kirki
 * @subpackage Controls
 * @copyright  Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license    https://opensource.org/licenses/MIT
 * @since      3.0.26
 */

namespace Kirki\Control;

use Kirki\Control\Base;
use Kirki\Core\Kirki;

/**
 * Adds a checkbox control.
 *
 * @since 3.0.26
 */
class Checkbox extends Base {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kirki-checkbox';

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
				'jquery',
				'customize-base',
				'kirki-dynamic-control',
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
	 * Render the control's content.
	 * Verbatim copy from WP_Customize_Control->render_content.
	 *
	 * @since 3.0.26
	 */
	protected function render_content() {
		$input_id       = '_customize-input-' . $this->id;
		$description_id = '_customize-description-' . $this->id;
		?>
		<span class="customize-inside-control-row">
			<input
				id="<?php echo esc_attr( $input_id ); ?>"
				<?php echo ( ! empty( $this->description ) ) ? ' aria-describedby="' . esc_attr( $description_id ) . '" ' : ''; ?>
				type="checkbox"
				value="<?php echo esc_attr( $this->value() ); ?>"
				<?php $this->link(); ?>
				<?php checked( $this->value() ); ?>
			/>
			<label for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $this->label ); ?></label>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span id="<?php echo esc_attr( $description_id ); ?>" class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>
		</span>
		<?php
	}
}

<?php
class Customizer_Range_Value_Control extends \WP_Customize_Control {
	public $type = 'range-value';

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since 3.4.0
	 */
	public function enqueue() {
		wp_enqueue_script( 'customizer-range-value-control', $this->abs_path_to_url( dirname( __FILE__ ) . '/js/customizer-range-value-control.js' ), array( 'jquery' ), rand(), true );
		wp_enqueue_style( 'customizer-range-value-control', $this->abs_path_to_url( dirname( __FILE__ ) . '/css/customizer-range-value-control.css' ), array(), rand() );
	}

	/**
	 * Render the control's content.
	 *
	 * @author soderlind
	 * @version 1.2.0
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
				<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="<?php echo esc_attr( $this->value() ); ?>"
																																				  <?php
																																					$this->input_attrs();
																																					$this->link();
																																					?>
				>
				<span class="range-slider__value">0</span></span>
			</div>
			<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>
		<?php
	}

	/**
	 * Plugin / theme agnostic path to URL
	 *
	 * @see https://wordpress.stackexchange.com/a/264870/14546
	 * @param string $path  file path
	 * @return string       URL
	 */
	private function abs_path_to_url( $path = '' ) {
		$url = str_replace(
			wp_normalize_path( untrailingslashit( ABSPATH ) ),
			site_url(),
			wp_normalize_path( $path )
		);
		return esc_url_raw( $url );
	}
}

<?php
/**
 * The7 Elementor plugin compatibility class.
 *
 * @since 7.7.0
 *
 * @package The7
 */

use The7\Adapters\Elementor\The7_Elementor_Page_Settings;
use The7\Adapters\Elementor\The7_Elementor_Widgets;

defined( 'ABSPATH' ) || exit;

/**
 * Class The7_Elementor_Compatibility
 */
class The7_Elementor_Compatibility {

	/**
	 * Bootstrap module.
	 */
	public function bootstrap() {
		require_once __DIR__ . '/elementor-functions.php';
		require_once __DIR__ . '/class-the7-elementor-widgets.php';
		require_once __DIR__ . '/class-the7-elementor-page-settings.php';
		require_once __DIR__ . '/class-the7-elementor-icons-extension.php';
		require_once __DIR__ . '/meta-adapters/class-the7-elementor-color-meta-adapter.php';
		require_once __DIR__ . '/meta-adapters/class-the7-elementor-padding-meta-adapter.php';

		$page_settings = new The7_Elementor_Page_Settings();
		$page_settings->bootstrap();

		$icons_extension = new The7_Elementor_Icons_Extension();
		$icons_extension->bootstrap();

		$widgets = new The7_Elementor_Widgets();
		$widgets->bootstrap();

		if ( defined( 'ELEMENTOR_PRO_VERSION' ) ) {
			$this->bootstrap_pro();
		}
	}

	protected function bootstrap_pro() {
		require_once __DIR__ . '/pro/class-the7-elementor-theme-builder-adapter.php';

		$theme_builder_adapter = new \The7\Adapters\Elementor\Pro\The7_Elementor_Theme_Builder_Adapter();
		$theme_builder_adapter->bootstrap();
	}
}

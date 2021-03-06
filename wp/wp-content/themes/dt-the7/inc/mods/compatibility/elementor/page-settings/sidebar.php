<?php
/**
 * @package The7
 */

namespace The7\Adapters\Elementor\Page_Settings;

use Elementor\Controls_Manager;

defined( 'ABSPATH' ) || exit;

return [
	'args'     => [
		'label' => __( 'Sidebar settings', 'the7mk2' ),
		'tab'   => Controls_Manager::TAB_SETTINGS,
	],
	'controls' => [
		'the7_document_sidebar_position' => [
			'meta' => '_dt_sidebar_position',
			'args' => [
				'label'     => __( 'Sidebar position', 'the7mk2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'right',
				'options'   => [
					'left'     => 'Left',
					'right'    => 'Right',
					'disabled' => 'Disabled',
				],
				'separator' => 'none',
			],
		],
		'the7_document_sidebar_id'       => [
			'meta' => '_dt_sidebar_widgetarea_id',
			'args' => [
				'label'     => __( 'Sidebar', 'the7mk2' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'sidebar_1',
				'options'   => 'presscore_get_widgetareas_options',
				'separator' => 'none',
				'condition' => [
					'the7_document_sidebar_position' => [ 'left', 'right' ],
				],
			],
		],
	],
];

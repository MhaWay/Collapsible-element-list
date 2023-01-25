<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor CELs Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Collapsible_Elements_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve CELs widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'CELs';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve CELs widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CELs', 'my-plugin-domain' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve CELs widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-accordion';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://ggally.net/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the CELs widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the CELs widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'cels', 'cells', 'toggle
		' ];
	}

	/**
	 * Register CELs widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
protected function _register_controls() {
    $this->start_controls_section(
        'section_Collapsible_Elements_Widget',
        [
            'label' => __( 'Collapsible Element Lists', 'collapsible-element-lists' ),
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_number_of_parents',
        [
            'label' => __( 'Number of Parent Elements', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2,
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_number_of_children',
        [
            'label' => __( 'Number of Child Elements', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 2,
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_parent_names',
        [
            'label' => __( 'Parent Element Names', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( "Parent 1\nParent 2", 'collapsible-element-lists' ),
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_child_names',
        [
            'label' => __( 'Child Element Names', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __( "Child 1\nChild 2", 'collapsible-element-lists' ),
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_templates',
        [
            'label' => __( 'Child Element Templates', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_elementor_templates(),
            'multiple' => true,
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_content_bg',
        [
            'label' => __( 'Content Background Color', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#ffffff',
        ]
    );

    $this->add_control(
        'Collapsible_Elements_Widget_content_text',
        [
            'label' => __( 'Content Text Color', 'collapsible-element-lists' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '#444444',
        ]
    );

$this->add_control(
'Collapsible_Elements_Widget_content_bg',
[
'label' => __( 'Content Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#dddddd',
]
);
$this->add_control(
'Collapsible_Elements_Widget_outline',
[
'label' => __( 'Outline Style', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::SELECT,
'options' => [
'none' => __( 'None', 'collapsible-element-lists' ),
'dotted' => __( 'Dotted', 'collapsible-element-lists' ),
'dashed' => __( 'Dashed', 'collapsible-element-lists' ),
'solid' => __( 'Solid', 'collapsible-element-lists' ),
'double' => __( 'Double', 'collapsible-element-lists' ),
'groove' => __( 'Groove', 'collapsible-element-lists' ),
'ridge' => __( 'Ridge', 'collapsible-element-lists' ),
'inset' => __( 'Inset', 'collapsible-element-lists' ),
'outset' => __( 'Outset', 'collapsible-element-lists' ),
],
'default' => 'none',
]
);
$this->add_control(
'Collapsible_Elements_Widget_text_align',
[
'label' => __( 'Text Align', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::SELECT,
'options' => [
'left' => __( 'Left', 'collapsible-element-lists' ),
'center' => __( 'Center', 'collapsible-element-lists' ),
'right' => __( 'Right', 'collapsible-element-lists' ),
],
'default' => 'left',
]
);
$this->add_control(
'Collapsible_Elements_Widget_number_of_parents',
[
'label' => __( 'Number of Parent Elements', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::NUMBER,
'min' => 1,
'max' => 100,
'step' => 1,
'default' => 2,
]
);
$this->add_control(
'Collapsible_Elements_Widget_number_of_children',
[
'label' => __( 'Number of Child Elements', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::NUMBER,
'min' => 1,
'max' => 100,
'step' => 1,
'default' => 2,
]
);
$this->add_control(
'Collapsible_Elements_Widget_parent_name',
[
'label' => __( 'Parent Element Name', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::TEXT,
'default' => __( 'Parent', 'collapsible-element-lists' ),
]
);

$this->add_control(
'Collapsible_Elements_Widget_child_name',
[
'label' => __( 'Child Element Name', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::TEXT,
'default' => __( 'Child', 'collapsible-element-lists' ),
]
);

$this->add_control(
'Collapsible_Elements_Widget_template',
[
'label' => __( 'Choose a template for the content of the child elements', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::SELECT,
'options' => $this->get_elementor_templates(),
'default' => '',
]
);

$this->add_control(
'Collapsible_Elements_Widget_content_bg',
[
'label' => __( 'Content Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#ffffff',
]
);

$this->add_control(
'Collapsible_Elements_Widget_content_text',
[
'label' => __( 'Content Text Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#444444',
]
);

$this->add_control(
'Collapsible_Elements_Widget_outline',
[
'label' => __( 'Outline Style', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::SELECT,
'options' => [
'none' => __( 'None', 'collapsible-element-lists' ),
'dotted' => __( 'Dotted', 'collapsible-element-lists' ),
'dashed' => __( 'Dashed', 'collapsible-element-lists' ),
'solid' => __( 'Solid', 'collapsible-element-lists' ),
'double' => __( 'Double', 'collapsible-element-lists' ),
'groove' => __( 'Groove', 'collapsible-element-lists' ),
'ridge' => __( 'Ridge', 'collapsible-element-lists' ),
'inset' => __( 'Inset', 'collapsible-element-lists' ),
'outset' => __( 'Outset', 'collapsible-element-lists' ),
]
]
);

$this->add_control(
'Collapsible_Elements_Widget_content_bg',
[
'label' => __( 'Content Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#ffffff',
]
);

$this->add_control(
'Collapsible_Elements_Widget_content_text',
[
'label' => __( 'Content Text Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#444444',
]
);

$this->add_control(
'Collapsible_Elements_Widget_parent_bg',
[
'label' => __( 'Parent Element Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#dddddd',
]
);

$this->add_control(
'Collapsible_Elements_Widget_parent_text',
[
'label' => __( 'Parent Element Text Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#444444',
]
);

$this->add_control(
'Collapsible_Elements_Widget_parent_hover_bg',
[
'label' => __( 'Parent Element Hover Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#444444',
]
);

$this->add_control(
'Collapsible_Elements_Widget_parent_hover_text',
[
'label' => __( 'Parent Element Hover Text Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#ffffff',
]
);

$this->add_control(
'Collapsible_Elements_Widget_child_bg',
[
'label' => __( 'Child Element Background Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#dddddd',
]
);

$this->add_control(
'Collapsible_Elements_Widget_child_text',
[
'label' => __( 'Child Element Text Color', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::COLOR,
'default' => '#444444',
]
);

$this->add_control(
'Collapsible_Elements_Widget_child_template',
[
'label' => __( 'Child Element Content Template', 'collapsible-element-lists' ),
'type' => \Elementor\Controls_Manager::SELECT,
'options' => $this->get_elementor_templates(),
'default' => '',
]
);

}

protected function render() {

$settings = $this->get_settings_for_display();

// Render the collapsible element lists with the options set by the user

}

}

// Register the widget

\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Collapsible_Elements_Widget() );


add_action( 'elementor/widgets/widgets_registered', 'Collapsible_Elements_Widget_register_widgets' );


// Add the CSS and JS files

add_action( 'elementor/frontend/after_register_styles', function() {

wp_register_style( 'collapsible-element-lists', plugin_dir_url( FILE ) . 'css/collapsible-element-lists.css', [], '1.0.0' );
wp_register_script( 'collapsible-element-lists', plugin_dir_url( FILE ) . 'js/collapsible-element-lists.js', [ 'jquery' ], '1.0.0', true );
} );

add_action( 'elementor/frontend/after_enqueue_styles', function() {
    wp_enqueue_style( 'collapsible-element-lists-css', plugin_dir_url( FILE ) . 'collapsible-element-lists.css' );
});


add_action( 'elementor/widgets/widgets_registered', 'register_Collapsible_Elements_Widget_widget' );

function register_Collapsible_Elements_Widget_widget() {
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Collapsible_Elements_Widget() );
}


// Make sure we don't expose any info if called directly
if ( ! function_exists( 'add_action' ) ) {
echo 'Hi there! Im just a plugin, not much I can do when called directly.';
exit;
}

// Run the plugin
//Collapsible_Elements_Widget::instance();


    function render() {
        $settings = $this->get_settings_for_display();
        $template_id = $settings['collapsible_element_lists_content_template'];
        $template_content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id );
        ?>
        <div class="my-content">
            <button class="my-collapsible my-collapsible-parent"><?php echo $settings['collapsible_element_lists_parent_name'] ?></button>
            <div class="my-content closed">
                <button class="my-collapsible"><?php echo $settings['collapsible_element_lists_child_name'] ?></button>
                <div class="my-content closed">
                    <?php echo $template_content; ?>
                </div>
            </div>
        </div>
        <?php
    }




?>

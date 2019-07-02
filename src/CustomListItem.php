<?php
namespace DF_CUSTOM_LIST;

use ET_Builder_Module;

class CustomListItem extends ET_Builder_Module
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        parent::__construct();
    }

    
    function init()
    {
        $this->name                  = esc_html__('Custom List Item', 'et_builder');
        $this->slug                  = 'et_pb_df_custom_list_item';
        $this->vb_support            = 'partial';
        $this->type                  = 'child';
        $this->child_title_var       = 'title';
        // $this->no_render = true;
        $this->main_css_element      = '%%order_class%%.et_pb_df_custom_list_item';

        $this->settings_modal_toggles = array(
        'general'  => array(
        'toggles' => array(
        // 'main_content' => esc_html__( 'Text', 'et_builder' ),
        ),
        ),
        );

        $this->advanced_fields = array(
        'margin_padding' => array(
        'css' => array(
        'important' => 'all',
        ),
        ),
        'fonts'                 => false,
        'button'                => false,
        );

        $this->custom_css_fields = array(
        'content' => array(
        'label'    => esc_html__('Item', 'et_builder'),
        'selector' => '.df_custom_list_item',
        ),
        );

        // $this->help_videos = array(
        //     array(
        //         'id'   => esc_html( '' ),
        //         'name' => esc_html__( 'An introduction to the Custom List Module', 'et_builder' ),
        //     ),
        // );
    }

    function get_fields()
    {
        $fields = array(
         'title' => array(
        'label'           => esc_html__('Title', 'et_builder'),
        'type'            => 'text',
        'option_category' => 'basic_option',
        'description'     => esc_html__('The title will appear above the content and when the toggle is closed.', 'et_builder'),
        'toggle_slug'     => 'main_content',
        ),
        'content' => array(
        'label'           => esc_html__('Content', 'et_builder'),
        'type'            => 'tiny_mce',
        'option_category' => 'basic_option',
        'description'     => esc_html__('Here you can define the content that will be placed within the current list item.', 'et_builder'),
        'toggle_slug'     => 'main_content',
        ),
        );
        return $fields;
    }

    function render( $attrs, $content = null, $render_slug )
    {
        $module_class = $this->module_classname($render_slug);
        $module_class = trim(str_replace('et_pb_module', '', $module_class));

        return "<li class='{$module_class} df_custom_list_item'>{$this->props['content']}</li>";
    }


    protected function _render_module_wrapper( $output = '', $render_slug = '' )
    {
        return $output;
    }
}


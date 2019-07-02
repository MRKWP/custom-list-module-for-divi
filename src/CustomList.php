<?php
namespace DF_CUSTOM_LIST;

use ET_Builder_Module;

class CustomList extends ET_Builder_Module
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        parent::__construct();
    }


    function init()
    {
        $this->name       = esc_html__('DF Custom List', 'et_builder');
        $this->slug       = 'et_pb_df_custom_list';
        $this->vb_support = 'partial';
        $this->child_slug = 'et_pb_df_custom_list_item';
        $this->main_css_element = '%%order_class%%.et_pb_df_custom_list';

        $this->settings_modal_toggles = array(
        'advanced' => array(
        'toggles' => array(
        'icon' => esc_html__('Icon', 'et_builder'),
        'list_item' => esc_html__('List Item', 'et_builder'),
        'list_anchor_element' => esc_html__('List Item Anchor Element', 'et_builder'),
        ),
        ),
        );

        $this->advanced_fields = array(
        'borders'               => array(
        'default' => array(
        'css'      => array(
         'main' => array(
          'border_radii'  => "{$this->main_css_element}",
          'border_styles' => "{$this->main_css_element}",
         ),
        ),
        ),
        ),
        'box_shadow'            => array(
        'default' => array(
        'css' => array(
         'main' => '%%order_class%%',
                    ),
        ),
        ),
        'fonts'                 => array(
        'list_item'   => array(
        'label'    => esc_html__('List Item', 'et_builder'),
        'css'      => array(
         'main'        => "{$this->main_css_element} .df_custom_list_item p",
                    
         'line_height' => "{$this->main_css_element} .df_custom_list_item p,  {$this->main_css_element}  .df_custom_list_item span.et-pb-icon",
                    ),
        ),

        'list_anchor_element'   => array(
        'label'    => esc_html__('Anchor Element', 'et_builder'),
        'css'      => array(
         'main'        => "{$this->main_css_element} .df_custom_list_item a",
                    ),
        ),
        ),
        'margin_padding' => array(
        'css'        => array(
        'padding'   => "{$this->main_css_element} li.df_custom_list_item",
        'margin'    => "{$this->main_css_element} li.df_custom_list_item",
        'important' => 'all',
        ),
        ),
        'button'                => false,
        'text'                => false,
        );

        $this->custom_css_fields = array(
        'item_icon' => array(
        'label'    => esc_html__('Icon', 'et_builder'),
        'selector' => '.et_pb_toggle_title:before', //todo
        ),
        'item_content' => array(
        'label'    => esc_html__('Item Content', 'et_builder'),
        'selector' => '.df_custom_list_item',
        ),
        );

        // $this->help_videos = array(
        //     array(
        //         'id'   => esc_html( '' ),
        //         'name' => esc_html__( 'An introduction to the Content List Module', 'et_builder' ),
        //     ),
        // );
    }

    function get_fields()
    {
        $fields = array(
        'use_icon' => array(
        'label'           => esc_html__('Use Icon', 'et_builder'),
        'type'            => 'yes_no_button',
        'option_category' => 'basic_option',
        'options'         => array(
        'off' => esc_html__('No', 'et_builder'),
        'on'  => esc_html__('Yes', 'et_builder'),
        ),
        'tab_slug'          => 'advanced',
        'toggle_slug'     => 'icon',
        'affects'         => array(
                    'icon',
                    'icon_size',
                    'icon_margin_left',
                    'icon_margin_top',
                    'icon_padding_right',
                    'list_style_type'
        ),
        'description' => esc_html__('Here you can choose whether icon set below should be used.', 'et_builder'),
        'default_on_front'=> 'on',
        'default'=> 'on',
        ),
        'list_style_type' => array(
        'label' => esc_html__('List Style Type', 'et_builder'),
        'type' => 'select',
        'options' => array(
                    'disc' => 'disc',
                    'circle' => 'circle',
                    'square' => 'square',
                    'decimal' => 'decimal',
                    'decimal-leading-zero' => 'decimal-leading-zero',
                    'lower-roman' => 'lower-roman',
                    'upper-roman' => 'upper-roman',
                    'lower-greek' => 'lower-greek',
                    'lower-latin' => 'lower-latin',
                    'upper-latin' => 'upper-latin',
                    'armenian' => 'armenian',
                    'georgian' => 'georgian',
                    'lower-alpha' => 'lower-alpha',
                    'upper-alpha' => 'upper-alpha',
                    'none' => 'none',
                    'inherit' => 'inherit',
        ),
        'tab_slug' => 'advanced',
        'toggle_slug' => 'icon',
        'description' => esc_html__('', 'et_builder'),
        'depends_show_if' => 'off',
        'default' => 'none',
        ),
            
        'icon' => array(
        'label'               => esc_html__('Icon', 'et_builder'),
        'type'                => 'select_icon',
        'option_category'     => 'basic_option',
        'class'               => array( 'et-pb-font-icon' ),
        'tab_slug'          => 'advanced',
        'toggle_slug'         => 'icon',
        'description'         => esc_html__('Choose an icon to display with your list item.', 'et_builder'),
        'depends_show_if'     => 'on',
        'default' => '%%45%%',
        ),

        'icon_size' => array(
        'label' => esc_html__('Icon Size', 'et_builder'),
        'type' => 'range',
        'range_settings' => array(
                    'min'  => -100,
                    'max'  => 100,
                    'step' => 1,
        ),
        'tab_slug' => 'advanced',
        'toggle_slug' => 'icon',
        'depends_show_if' => 'on',
        'default' => '16',
        ),

        'icon_margin_left' => array(
        'label' => esc_html__('Icon Margin Left', 'et_builder'),
        'type' => 'range',
        'range_settings' => array(
                    'min'  => -100,
                    'max'  => 100,
                    'step' => 1,
        ),
        'tab_slug' => 'advanced',
        'toggle_slug' => 'icon',
        'depends_show_if' => 'on',
        'default' => '-16',
        ),

        'icon_margin_top' => array(
        'label' => esc_html__('Icon Margin Top', 'et_builder'),
        'type' => 'range',
        'range_settings' => array(
                    'min'  => -100,
                    'max'  => 100,
                    'step' => 1,
        ),
        'tab_slug' => 'advanced',
        'toggle_slug' => 'icon',
        'depends_show_if' => 'on',
        'default' => 5,
        ),

        'icon_color' => array(
        'label'             => esc_html__('Icon Color', 'et_builder'),
        'type'              => 'color-alpha',
        'custom_color'      => true,
        'tab_slug'          => 'advanced',
        'toggle_slug'       => 'icon',
        ),
        );
        return $fields;
    }

    function render( $attrs, $content = null, $render_slug )
    {
        $defaults = array(
        'use_icon' => 'on',
        'icon_color' => '#ffffff',
        'icon_size' => '16',
        'icon_margin_left' => -16,
        'icon_margin_top' => 0,
        'list_style_type' => 'none',
        'icon' => '%%45%%'
        );

        $attrs = wp_parse_args($attrs, $defaults);
        $attrs = wp_parse_args($this->props, $attrs);
        // var_dump($attrs['use_icon']);
        $module_class = $this->module_classname($render_slug);

        $module_class_selector = "." . implode('.', explode(' ', $module_class));
        
        // $this->main_css_element
        $content = $this->content;

        if($attrs['use_icon'] == 'on') {
            \ET_Builder_Element::set_style(
                $render_slug, array(
                'selector'    => "%%order_class%%",
                'declaration' => 'list-style-type: none !important;',
                )
            );

            $icon_style = sprintf('color: %1$s;font-size:%2$spx;margin-left:%3$spx; margin-top:%5$spx;vertical-align:top; position:absolute', esc_attr($this->props["icon_color"]), $attrs['icon_size'], $attrs['icon_margin_left'], "", $attrs['icon_margin_top']);
            $font_icon =  $this->props["icon"] ;
            $icon_html = sprintf(
                '<span class="et-pb-icon">%1$s</span>',
                esc_attr(et_pb_process_font_icon($font_icon))
            );

            \ET_Builder_Element::set_style(
                $render_slug, array(
                'selector'    => "%%order_class%% span.et-pb-icon",
                'declaration' => $icon_style,
                ) 
            );

            \ET_Builder_Element::set_style(
                $render_slug, array(
                'selector'    => "%%order_class%% p",
                'declaration' => "display:block !important;vertical-align:top; margin-left: {$attrs['icon_size']}px;",
                ) 
            );

            $content = str_replace("df_custom_list_item'>", "df_custom_list_item'>".$icon_html, $content);
        } else {
            \ET_Builder_Element::set_style(
                $render_slug, array(
                'selector'    => "%%order_class%% li",
                'declaration' => "list-style-type: {$attrs['list_style_type']}; color: {$attrs['icon_color']};",
                ) 
            );
        }

        

        $output = sprintf(
            '<ul%3$s class="%2$s">
			%1$s
			</ul> <!-- .et_pb_df_custom_list -->',
            $content,
            $this->module_classname($render_slug),
            $this->module_id()
        );

        return $output;
    }

    public function add_new_child_text()
    {
        return esc_html__('Add New Content Item', 'et_builder');
    }

    protected function _render_module_wrapper( $output = '', $render_slug = '' )
    {
        return $output;
    }
    
}
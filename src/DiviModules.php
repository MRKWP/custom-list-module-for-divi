<?php
namespace DF_CUSTOM_LIST;

/**
 * Register divi modules
 */
class DiviModules
{
    
    protected $container;


    public function __construct($container)
    {
        $this->container = $container;
    }



    /**
     * Register divi modules.
     */
    public function register()
    {
        new CustomList($this->container);
        new CustomListItem($this->container);
    }


    public function flushLocalStorage() {
        echo "<script>" .
            "localStorage.removeItem('et_pb_templates_et_pb_df_custom_list');" .
            "localStorage.removeItem('et_pb_templates_et_pb_df_custom_list_item');" .
            "</script>";
    }
}

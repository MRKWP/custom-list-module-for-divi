<?php

namespace DF_CUSTOM_LIST;

/**
 * Activation class.
 */
class Activation
{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Plugin activation.
     */
    public function install()
    {
        flush_rewrite_rules();
    }
}

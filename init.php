<?php
require __DIR__ . '/vendor/autoload.php';

$config_file = __DIR__ . '/config.sample.php';
if (file_exists(__DIR__ . '/config.inc.php')) {
    $config_file = __DIR__ . '/config.inc.php';
}

require_once $config_file;

//TODO: Establish a connection to the DB.
//\SiteMaster\Util::connectDB();

//Register the plugin autoloader
spl_autoload_register('\SiteMaster\Plugin\PluginManager::autoload');



\SiteMaster\Plugin\PluginManager::initialize(
    new \Symfony\Component\EventDispatcher\EventDispatcher(),
    array(
        'internal_plugins' => array(
            'Home' => array(),
            'Plugin' => array(),
        ),
        'external_plugins' => \SiteMaster\Config::get('PLUGINS')
    )
);

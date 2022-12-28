<?php

/**
 * Plugin Name: McQ
 * Plugin URI:http://sagar-paul.xyz/
 * Description: Simple Mcq system.
 * Author: Sagar Paul
 * Author URI: http://sagarpaul.xyz
 * Version:1.0.0
 */
if (!defined('ABSPATH')) exit;
require_once __DIR__ . "/vendor/autoload.php";

/**
 *
 */
class Mcq
{

    /**
     * @var
     */
    public static $_instance;

    /**
     * @var string
     */
    public $plugin_version = '1.0.0';

    /**
     * @var string
     */
    public $file = __FILE__;

    /**
     * @var string
     */
    public $directory = __DIR__;

    /**
     *
     */
    public function __construct()
    {
        $this->hooks();
        $this->constants();
    }

    /**
     * @return void
     */
    public function init_plugin()
    {
        new Sagar\Mcq\Admin\Admin();
        new Sagar\Contact\Frontend();

    }

    /**
     * @return void
     */
    public function hooks()
    {
        add_action('plugins_loaded', array($this, 'init_plugin'));
        add_action('wp_enqueue_scripts', array($this, 'register_assets'));
    }

    /**
     * @return void
     */
    public function constants()
    {
        define('PS_MCQ_VERSION', $this->plugin_version);
        define('PS_MCQ_FILE', $this->file);
        define('PS_MCQ_PATH', $this->directory);
        define('PS_MCQ_URL', plugins_url('', $this->file));
        define('PS_MCQ_ASSETS', plugins_url('', $this->file) . '/assets');
    }

    /**
     * @return void
     */
    public function register_assets(){
        wp_enqueue_style('ps-mcq-style', PS_MCQ_ASSETS . '/public/css/style.css', PS_MCQ_VERSION, true);
    }

    /**
     * @return Mcq
     */
    public static function init()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new Mcq();
        }
        return self::$_instance;
    }
}

/**
 * @return Mcq
 */
function ps_mcq()
{
    return Mcq::init();
}

ps_mcq();
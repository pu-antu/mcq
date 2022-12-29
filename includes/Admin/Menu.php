<?php

namespace Sagar\Mcq\Admin;

use function Composer\Autoload\includeFile;

/**
 *
 */
class Menu
{

    /**
     *
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));
    }

    /**
     * @return void
     */
    public function admin_menu()
    {
        add_submenu_page('edit.php?post_type=ps-mcq', __('Report', 'ps-mcq'), __('Report', 'ps-mcq'), 'manage_options', 'ps-mcq-report', array($this, 'plugin_page'));
    }

    /**
     * @return void
     */
    public function plugin_page()
    {
        include 'view/report.php';
    }
}

<?php


namespace Sagar\Mcq\Admin;


use Sagar\Mcq;

/**
 *
 */
class Admin
{
    /**
     *
     */
    public function __construct()
    {
        new Metabox();
        new CustomPost();
        new Menu();
        add_action('widgets_init', array($this, 'Ps_Widgets_init'));
    }

    /**
     * @return void
     */
    public function Ps_Widgets_init(){
        register_widget('\Sagar\Mcq\Admin\PsMcqWidget');
    }


}
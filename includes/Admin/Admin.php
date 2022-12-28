<?php


namespace Sagar\Mcq\Admin;


use Sagar\Mcq;

class Admin
{
    public function __construct()
    {
        new Metabox();
        new CustomPost();
      //  new Ps_Mcq_Widget();

    }


}
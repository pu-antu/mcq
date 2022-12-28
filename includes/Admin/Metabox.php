<?php


namespace Sagar\Mcq\Admin;
if (!defined('ABSPATH')) exit;

/**
 *
 */
class Metabox
{
    /**
     * @var string
     */
    private $prefix = '_ps_';

    /**
     * Metabox constructor.
     */
    public function __construct()
    {
        add_action('cmb2_init', array($this, 'metabox'));
    }

    /**
     * @return void
     */
    public function metabox()
    {
        // Quiz Metabox
        $cmb = new_cmb2_box(array(
            'id' => $this->prefix . 'mcq',
            'title' => __('Question', 'ps-event'),
            'object_types' => array('ps-mcq'),
            'context' => 'normal',
            'priority' => 'default',
        ));

        $group_field_quns = $cmb->add_field(array(
            'id' => $this->prefix . 'ps_mcq',
            'type' => 'group',
            'options' => array(
                'group_title' => __('Question {#}', 'ps-mcq'),
                'add_button' => __('Add Another Question', 'ps-mcq'),
                'remove_button' => __('Remove Question', 'ps-mcq'),
                'sortable' => false,
                'remove_confirm' => esc_html__('Are you sure you want to remove?', 'cmb2'),
            ),
        ));

        $cmb->add_group_field($group_field_quns, array(
            'name' => esc_html__('Question', 'ps-mcq'),
            'id' => 'quns',
            'type' => 'text',
        ));
        $cmb->add_group_field($group_field_quns, array(
            'name' => esc_html__('Answer', 'ps-mcq'),
            'id' => 'ans',
            'type' => 'text',
        ));
    }
}

<?php

namespace LaravelEnso\TutorialManager\app\DataTable;

use LaravelEnso\DataTable\app\Classes\TableStructure;
use LaravelEnso\TutorialManager\app\Enums\TutorialPlacement;

class TutorialsTableStructure extends TableStructure
{
    public function __construct()
    {
        $this->data = [
            'crtNo'           => __('#'),
            'actionButtons'   => __('Actions'),
            'notSearchable'   => [5, 6],
            'render'          => [5, 6],
            'headerAlign'     => 'center',
            'bodyAlign'       => 'center',
            'tableClass'      => 'table display compact',
            'dom'             => 'lfrtip',
            'enumMappings'    => [
                'placement' => TutorialPlacement::class,
            ],
            'render'          => [3, 5, 6],
            'columns'         => [
                0 => [
                    'label' => __('Permission Name'),
                    'data'  => 'permissionName',
                    'name'  => 'permissions.name',
                ],
                1 => [
                    'label' => __('Element'),
                    'data'  => 'element',
                    'name'  => 'element',
                ],
                2 => [
                    'label' => __('Title'),
                    'data'  => 'title',
                    'name'  => 'title',
                ],
                3 => [
                    'label' => __('Placement'),
                    'data'  => 'placement',
                    'name'  => 'placement',
                ],
                4 => [
                    'label' => __('Order'),
                    'data'  => 'order',
                    'name'  => 'order',
                ],
                5 => [
                    'label' => __('Created At'),
                    'data'  => 'created_at',
                    'name'  => 'tutorials.created_at',
                ],
                6 => [
                    'label' => __('Updated At'),
                    'data'  => 'updated_at',
                    'name'  => 'tutorials.updated_at',
                ],
            ],
        ];
    }
}

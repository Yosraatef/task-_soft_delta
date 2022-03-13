<?php
$menu = [
    'site'          => [
        'title' => trans('admin.website'),
        'url'   => url('/'),
        'icon'  => 'fa-home',
        'role'  => 'show_site'
    ],
    'admin'         => [
        'title' => trans('admin.admin'),
        'url'   => url('admin'),
        'icon'  => 'fa-dashboard',
        'role'  => 'show_home'
    ],
    'profile'       => [
        'title' => __('Profile'),
        'url'   => url('admin/profile'),
        'icon'  => 'fa-user',
        'role'  => 'show_profile'
    ],
    'log'           => [
        'title' => __('System logs'),
        'url'   => url('admin/log'),
        'icon'  => 'fa-tasks',
        'role'  => 'show_log'
    ],
 
    'spliter'       => 'Draw spliter here',
 
    
    'tasks'           => [
        'title' => __('Taskes'),
        'url'   => url('admin/tasks'),
        'icon'  => 'fa-tasks',
        'role'  => 'show_log'
    ],
   
    'roles'         => [
        'title'  => __('Supervisor Powers'),
        'url'    => url('admin/roles'),
        'icon'   => 'fa-key',
        'role'   => 'show_roles',
        'childs' => [
            [
                'title' => __('Show all'),
                'url'   => url('admin/roles')
            ],
            [
                'title' => __('Add role'),
                'url'   => url('admin/roles/create')
            ],
        ]
    ],
    'admins'        => [
        'title'  => __('Supervisors'),
        'url'    => url('admin/admins'),
        'icon'   => 'fa-users',
        'role'   => 'show_admins',
        'childs' => [
            [
                'title' => __('Show all'),
                'url'   => url('admin/admins')
            ],
            [
                'title' => __('Add Admin'),
                'url'   => url('admin/admins/create')
            ],
        ]
    ],


];
?>

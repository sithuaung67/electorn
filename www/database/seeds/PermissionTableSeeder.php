<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permissions = [

                      'role-list',
                      'role-create',
                      'role-edit',
                      'role-delete',

                      'users-list',
                      'users-create',
                      'users-edit',
                      'users-delete',

                      'customer-list',
                      'customer-create',
                      'customer-edit',
                      'customer-delete',

                      'about-list',
                      'about-create',
                      'about-edit',
                      'about-delete',

                      'tour_group-list',
                      'tour_group-create',
                      'tour_group-edit',
                      'tour_group-delete',

                      'tour_leader-list',
                      'tour_leader-create',
                      'tour_leader-edit',
                      'tour_leader-delete',

                      'notification-list',
                      'notification-create',
                      'notification-edit',
                      'notification-delete',

                      'ask_question-list',
                      'ask_question-create',
                      'ask_question-edit',
                      'ask_question-delete',

                      'blog-list',
                      'blog-create',
                      'blog-edit',
                      'blog-delete',

                      'country-list',
                      'country-create',
                      'country-edit',
                      'country-delete',

                      'destination-list',
                      'destination-create',
                      'destination-edit',
                      'destination-delete',

                      'join_table-list',
                      'join_table-create',
                      'join_table-edit',
                      'join_table-delete',

                      'package-list',
                      'package-create',
                      'package-edit',
                      'package-delete',

                      'support_center-list',
                      'support_center-create',
                      'support_center-edit',
                      'support_center-delete',

                      'tutorial-list',
                      'tutorial-create',
                      'tutorial-edit',
                      'tutorial-delete',

                      'feedback-list',
                      'feedback-delete',

                      'home_video-list',
                      'home_video-edit',

                      'booking-list',
                      'booking-edit',
                      'booking-delete',

                      'wishlist-list',

                    ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

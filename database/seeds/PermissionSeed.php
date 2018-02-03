<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'user_management_create',],
            ['id' => 3, 'title' => 'user_management_edit',],
            ['id' => 4, 'title' => 'user_management_view',],
            ['id' => 5, 'title' => 'user_management_delete',],
            ['id' => 6, 'title' => 'permission_access',],
            ['id' => 7, 'title' => 'permission_create',],
            ['id' => 8, 'title' => 'permission_edit',],
            ['id' => 9, 'title' => 'permission_view',],
            ['id' => 10, 'title' => 'permission_delete',],
            ['id' => 11, 'title' => 'role_access',],
            ['id' => 12, 'title' => 'role_create',],
            ['id' => 13, 'title' => 'role_edit',],
            ['id' => 14, 'title' => 'role_view',],
            ['id' => 15, 'title' => 'role_delete',],
            ['id' => 16, 'title' => 'user_access',],
            ['id' => 17, 'title' => 'user_create',],
            ['id' => 18, 'title' => 'user_edit',],
            ['id' => 19, 'title' => 'user_view',],
            ['id' => 20, 'title' => 'user_delete',],
            ['id' => 21, 'title' => 'course_access',],
            ['id' => 22, 'title' => 'course_create',],
            ['id' => 23, 'title' => 'course_edit',],
            ['id' => 24, 'title' => 'course_view',],
            ['id' => 25, 'title' => 'course_delete',],
            ['id' => 26, 'title' => 'lesson_access',],
            ['id' => 27, 'title' => 'lesson_create',],
            ['id' => 28, 'title' => 'lesson_edit',],
            ['id' => 29, 'title' => 'lesson_view',],
            ['id' => 30, 'title' => 'lesson_delete',],
            ['id' => 31, 'title' => 'question_access',],
            ['id' => 32, 'title' => 'question_create',],
            ['id' => 33, 'title' => 'question_edit',],
            ['id' => 34, 'title' => 'question_view',],
            ['id' => 35, 'title' => 'question_delete',],
            ['id' => 36, 'title' => 'questions_option_access',],
            ['id' => 37, 'title' => 'questions_option_create',],
            ['id' => 38, 'title' => 'questions_option_edit',],
            ['id' => 39, 'title' => 'questions_option_view',],
            ['id' => 40, 'title' => 'questions_option_delete',],
            ['id' => 41, 'title' => 'test_access',],
            ['id' => 42, 'title' => 'test_create',],
            ['id' => 43, 'title' => 'test_edit',],
            ['id' => 44, 'title' => 'test_view',],
            ['id' => 45, 'title' => 'test_delete',],
            ['id' => 46, 'title' => 'class_access',],
            ['id' => 47, 'title' => 'class_create',],
            ['id' => 48, 'title' => 'class_edit',],
            ['id' => 49, 'title' => 'class_view',],
            ['id' => 50, 'title' => 'class_delete',],
            ['id' => 51, 'title' => 'post_access',],
            ['id' => 52, 'title' => 'post_create',],
            ['id' => 53, 'title' => 'post_edit',],
            ['id' => 54, 'title' => 'post_view',],
            ['id' => 55, 'title' => 'post_delete',],
            ['id' => 56, 'title' => 'message_access',],
            ['id' => 57, 'title' => 'message_create',],
            ['id' => 58, 'title' => 'message_edit',],
            ['id' => 59, 'title' => 'message_view',],
            ['id' => 60, 'title' => 'message_delete',],
            ['id' => 56, 'title' => 'profile_access',],
            ['id' => 57, 'title' => 'profile_create',],
            ['id' => 58, 'title' => 'profile_edit',],
            ['id' => 59, 'title' => 'profile_view',],
            ['id' => 60, 'title' => 'profile_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}

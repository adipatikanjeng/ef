<?php
Route::get('/', 'GuestController@index');
Route::resource('/home', 'HomeController');
Route::get('posts/create', ['uses' => 'PostsController@create', 'as' => 'posts.create']);
Route::post('posts/store', ['uses' => 'PostsController@store', 'as' => 'posts.store']);
Route::post('post-comments/store', ['uses' => 'PostCommentsController@store', 'as' => 'post-comments.store']);
Route::delete('post-comments/{id}', ['uses' => 'PostCommentsController@destroy', 'as' => 'post-comments.delete']);
Route::get('posts/{id}/{slug}', ['uses' => 'PostsController@show', 'as' => 'posts.show']);
Route::get('posts/{id}', ['uses' => 'PostsController@edit', 'as' => 'posts.edit']);
Route::put('posts/{id}', ['uses' => 'PostsController@update', 'as' => 'posts.update']);
Route::delete('posts/{id}', ['uses' => 'PostsController@delete', 'as' => 'posts.delete']);
Route::get('profile', [ 'uses' => 'ProfileController@index', 'as' => 'profile.index']);
Route::put('profile/{id}', [ 'uses' => 'ProfileController@update', 'as' => 'profile.update']);
Route::get('courses', ['uses' => 'CoursesController@index', 'as' => 'courses.index']);
Route::get('courses/{slug}', ['uses' => 'CoursesController@show', 'as' => 'courses.show']);
Route::post('courses/payment', ['uses' => 'CoursesController@payment', 'as' => 'courses.payment']);
Route::post('courses/{course_id}/rating', ['uses' => 'CoursesController@rating', 'as' => 'courses.rating']);
Route::get('tests', ['uses' => 'TestsController@index', 'as' => 'tests.index']);
Route::get('tests/{id}', ['uses' => 'TestsController@show', 'as' => 'tests.show']);
Route::get('tests/{courseId}/{lessonId}/lesson', ['uses' => 'TestsController@detail', 'as' => 'tests.detail']);

Route::get('lesson/{course_id}/{slug}', ['uses' => 'LessonsController@show', 'as' => 'lessons.show']);
Route::post('lesson/{slug}/test', ['uses' => 'LessonsController@test', 'as' => 'lessons.test']);

// Authentication Routes...
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::delete('{id}/destroy', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'Admin\DashboardController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('classes', 'Admin\ClassesController');
    Route::post('classes_mass_destroy', ['uses' => 'Admin\ClassesController@massDestroy', 'as' => 'classes.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('courses', 'Admin\CoursesController');
    Route::post('courses_mass_destroy', ['uses' => 'Admin\CoursesController@massDestroy', 'as' => 'courses.mass_destroy']);
    Route::post('courses_restore/{id}', ['uses' => 'Admin\CoursesController@restore', 'as' => 'courses.restore']);
    Route::delete('courses_perma_del/{id}', ['uses' => 'Admin\CoursesController@perma_del', 'as' => 'courses.perma_del']);
    Route::resource('lessons', 'Admin\LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'Admin\LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::post('lessons_restore/{id}', ['uses' => 'Admin\LessonsController@restore', 'as' => 'lessons.restore']);
    Route::delete('lessons_perma_del/{id}', ['uses' => 'Admin\LessonsController@perma_del', 'as' => 'lessons.perma_del']);
    Route::resource('questions', 'Admin\QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'Admin\QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::post('questions_restore/{id}', ['uses' => 'Admin\QuestionsController@restore', 'as' => 'questions.restore']);
    Route::delete('questions_perma_del/{id}', ['uses' => 'Admin\QuestionsController@perma_del', 'as' => 'questions.perma_del']);
    Route::resource('questions_options', 'Admin\QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'Admin\QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::post('questions_options_restore/{id}', ['uses' => 'Admin\QuestionsOptionsController@restore', 'as' => 'questions_options.restore']);
    Route::delete('questions_options_perma_del/{id}', ['uses' => 'Admin\QuestionsOptionsController@perma_del', 'as' => 'questions_options.perma_del']);
    Route::resource('tests', 'Admin\TestsController');
    Route::post('tests_mass_destroy', ['uses' => 'Admin\TestsController@massDestroy', 'as' => 'tests.mass_destroy']);
    Route::post('tests_restore/{id}', ['uses' => 'Admin\TestsController@restore', 'as' => 'tests.restore']);
    Route::delete('tests_perma_del/{id}', ['uses' => 'Admin\TestHeadersController@perma_del', 'as' => 'tests.perma_del']);
    Route::resource('test_headers', 'Admin\TestHeadersController');
    Route::post('test_headers_mass_destroy', ['uses' => 'Admin\TestHeadersController@massDestroy', 'as' => 'test_headers.mass_destroy']);
    Route::post('test_headers_restore/{id}', ['uses' => 'Admin\TestHeadersController@restore', 'as' => 'test_headers.restore']);
    Route::delete('test_headers_perma_del/{id}', ['uses' => 'Admin\TestHeadersController@perma_del', 'as' => 'test_headers.perma_del']);
    Route::post('/spatie/media/upload', 'Admin\SpatieMediaController@create')->name('media.upload');
    Route::post('/spatie/media/remove', 'Admin\SpatieMediaController@destroy')->name('media.remove');

});




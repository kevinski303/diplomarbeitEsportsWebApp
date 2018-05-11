<?php
Route::get('/', function () { return redirect('/public');});
Route::get('/public', 'PublicController@index');
Route::get('/table', 'TableController@index');
Route::get('/games', 'GamesController@index');
Route::get('/teams', 'TeamsController@index');
Route::get('/impressum', 'ImpressumController@index');


#Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');

    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('tournaments', 'Admin\TournamentsController');
    Route::post('tournaments_mass_destroy', ['uses' => 'Admin\TournamentsController@massDestroy', 'as' => 'tournaments.mass_destroy']);
    Route::post('tournaments_restore/{id}', ['uses' => 'Admin\TournamentsController@restore', 'as' => 'tournaments.restore']);
    Route::delete('tournaments_perma_del/{id}', ['uses' => 'Admin\TournamentsController@perma_del', 'as' => 'tournaments.perma_del']);
    Route::resource('teams', 'Admin\TeamsController');
    Route::post('teams_mass_destroy', ['uses' => 'Admin\TeamsController@massDestroy', 'as' => 'teams.mass_destroy']);
    Route::post('teams_restore/{id}', ['uses' => 'Admin\TeamsController@restore', 'as' => 'teams.restore']);
    Route::delete('teams_perma_del/{id}', ['uses' => 'Admin\TeamsController@perma_del', 'as' => 'teams.perma_del']);
    Route::resource('games', 'Admin\GamesController');
    Route::post('games_mass_destroy', ['uses' => 'Admin\GamesController@massDestroy', 'as' => 'games.mass_destroy']);
    Route::post('games_restore/{id}', ['uses' => 'Admin\GamesController@restore', 'as' => 'games.restore']);
    Route::delete('games_perma_del/{id}', ['uses' => 'Admin\GamesController@perma_del', 'as' => 'games.perma_del']);
    Route::resource('modes', 'Admin\ModesController');
    Route::post('modes_mass_destroy', ['uses' => 'Admin\ModesController@massDestroy', 'as' => 'modes.mass_destroy']);
    Route::post('modes_restore/{id}', ['uses' => 'Admin\ModesController@restore', 'as' => 'modes.restore']);
    Route::delete('modes_perma_del/{id}', ['uses' => 'Admin\ModesController@perma_del', 'as' => 'modes.perma_del']);
    Route::resource('playoffs', 'Admin\PlayoffsController');
    Route::post('playoffs_mass_destroy', ['uses' => 'Admin\PlayoffsController@massDestroy', 'as' => 'playoffs.mass_destroy']);
    Route::post('playoffs_restore/{id}', ['uses' => 'Admin\PlayoffsController@restore', 'as' => 'playoffs.restore']);
    Route::delete('playoffs_perma_del/{id}', ['uses' => 'Admin\PlayoffsController@perma_del', 'as' => 'playoffs.perma_del']);
});

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', ['as' => 'dashboard', function() use ($app) {
    $projects = App\Project::listing()->get();
    return view('dashboard', compact('projects'));
}]);

$app->get('/projects/{id}', ['as' => 'project', function($id) use ($app) {
    $projects = App\Project::listing()->get();
    $project = App\Project::with(['notifications' => function($query){
        return $query->orderBy('time', 'desc');
    }])->findOrFail($id);

    return view('project', compact('projects', 'project'));
}]);

$app->post('/notifications', ['uses' => 'NotificationsController@create']);

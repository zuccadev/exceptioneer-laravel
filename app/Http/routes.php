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

$app->get('/error', [function() use ($app) {
    throw new \Illuminate\Database\Eloquent\ModelNotFoundException('we', 20);
}]);

$app->get('/', ['as' => 'dashboard', function() use ($app) {
    $projects = App\Project::listing()->get();
    return view('dashboard', compact('projects'));
}]);

$app->get('/projects/{id}', ['as' => 'project', function($id, Illuminate\Http\Request $request) use ($app) {
    $paging = 5;
    $currentStage = $request->input('stage', 'production');
    $projects = App\Project::listing()->get();
    $project = App\Project::findOrFail($id);

    $stages =  $project->notifications()
        ->select('stage')
        ->groupBy('stage')
        ->orderBy('stage', 'asc')
        ->get();

    $notifications = $project->notifications()
        ->select(DB::raw('id, code, method, path, exception_class, message, time, COUNT(id) as occurencies, MIN(time) as first, MAX(time) as last'))
        ->ofStage($currentStage)
        ->groupBy(DB::raw('message, method, path'))
        ->orderBy('time', 'desc')
        ->simplePaginate($paging);

    $notifications->setPath($project->id); //fix for a strange bug in pagination. trailing slash appended to current url causes a 301 redirect

    $notificationsCount = $project->notifications()
        ->ofStage($currentStage)
        ->count();

    return view('project', compact('projects', 'project', 'notifications', 'notificationsCount', 'stages', 'currentStage'));
}]);

$app->post('/notifications', ['uses' => 'NotificationsController@create']);

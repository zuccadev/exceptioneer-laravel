<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Project;
use Illuminate\Http\Request;

class NotificationsController extends ApiController
{
    public function create(Request $request)
    {
        $project = $this->authorize($request);

        if (!$project) {
            return $this->respondWithError();
        }

        $notification = Notification::createFromRequest($request);

        $project->notifications()->save($notification);

        return $this->respondCreated();
    }

    protected function authorize(Request $request)
    {
        $notifier = $request->input('notifier');

        $apiKey = $notifier['apiKey'];

        $project = Project::where('api_key', '=', $apiKey)->first();

        return $project;
    }
}
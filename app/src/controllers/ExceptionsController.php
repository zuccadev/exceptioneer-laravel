<?php

namespace App\Controllers;

use League\Route\Http\JsonResponse as Response;
use Symfony\Component\HttpFoundation\Request;

class ExceptionsController
{
    public function create(Request $request)
    {
        return new Response\Created(['message' => 'CREATED']);
    }
}
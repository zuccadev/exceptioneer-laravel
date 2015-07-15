<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response as IlluminateResponse;

class ApiController extends Controller {

    protected $statusCode = IlluminateResponse::HTTP_OK;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function respondCreated($message = 'Created.', $headers = [])
    {
        $this->setStatusCode(IlluminateResponse::HTTP_CREATED);

        return $this->respond(['message' => $message], $headers);
    }

    public function respondWithError($message = 'Unauthorized.', $headers = [])
    {
        $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED);

        return $this->respond(['message' => $message], $headers);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

}
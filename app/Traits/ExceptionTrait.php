<?php

namespace App\Traits;


use App\Models\ErrorResponse;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{

    public function apiException($request, $e) {

        if ($this->isModelError($e)) {
            return $this->modelErrorResponse($e);
        }

        if ($this->isHttpError($e)) {
            return $this->httpErrorResponse();
        }

        if ($this->isSqlError($e)) {
            return $this->sqlErrorResponse($e);
        }

        return parent::render($request, $e);
    }



    private function isModelError($e) {
        return $e instanceof ModelNotFoundException;
    }

    private function isHttpError($e) {
        return $e instanceof NotFoundHttpException;
    }

    private function isSqlError($e) {
        return $e instanceof QueryException;
    }

    private function modelErrorResponse($e) {
        return response()->json(
            ErrorResponse::make('Writer with that id does not exist.', Response::HTTP_NOT_FOUND)
        );
    }

    private function httpErrorResponse() {
        return response()->json(
            ErrorResponse::make('Incorrect route.', Response::HTTP_NOT_FOUND));
    }

    private function sqlErrorResponse($e) {
        return response()->json(
            ErrorResponse::make($e->getMessage(), Response::HTTP_BAD_REQUEST)
         );
    }

    private function validationErrorResponse() {
        return response()->json(
            ErrorResponse::make('Unauthorized access.', Response::HTTP_UNAUTHORIZED)
        );
    }

}
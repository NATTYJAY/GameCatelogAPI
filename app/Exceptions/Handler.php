<?php

namespace App\Exceptions;

use App\Exceptions\ArtificialException;
use App\Traits\ResponseApi;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;



class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception) 
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
      

        if ($exception instanceof BindingResolutionException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        }

        if ($exception instanceof ModelNotFoundException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        }

        if ($exception instanceof ArtificialException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        } 

        if ($exception instanceof RelationNotFoundException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        }

        if ($exception instanceof QueryException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {

            $result = "{$exception->getmessage()}";
            return ResponseApi::errorResponse($result, ResponseApi::$code404);
        }

        return parent::render($request, $exception);
    }
}

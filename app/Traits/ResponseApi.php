<?php

namespace App\Traits;

trait ResponseApi {

	static $code400 = 400;//Bad Request :The server cannot or will not process the request due to something that is perceived to be a client error (e.g., malformed request syntax, invalid request message framing, or deceptive request routing).
	static $code401 = 401;//Unauthorized: The request has not been applied because it lacks valid authentication credentials for the target resource.
	static $code403 = 403;//Forbidden: The server understood the request but refuses to authorize it.
	static $code404 = 404;
	static $code405 = 405; //Method Not Allowed

	static $code409 = 409;
	static $code200 = 200;
	static $code201 = 201;
	static $code422 = 422; //Unproceessable Entity, Failed to process well formed request due to errors
	static $code424 = 424; //'Failed Dependency'
	static $code429 = 429;
	static $code444 = 444; //Connection closed without response
	static $code408 = 408; //Request time out
	static $code417 = 417; //Expectation Failed
	static $code503 = 503; //'Service Unavailable'
	static $code504 = 504; //Gateway Timeout
	static $code500 = 500; //Internal Server Error
	static $code412 = 412; //Precondition Failed

	static $code501 = 501; //'Not Implemented',

	static $code599 = 599; //Network Connect Timeout Error
	static $code413 = 413; //'Payload Too Large'
	static $code407 = 407; //'Proxy Authentication Required'
	
	static $successStatus = true;

	static $errorStatus = false;

	static $FailureStatus = false;

	static function successResponse($data, $message, $code = 200) {

		$response = ['status' => true, 'code' => $code, 'message' => $message, 'data' => $data];
		return response()->json($response, $code);
	}

	static function errorResponse($message, $code, $headers = [], $data = '') {

		return response()->json(['error' => $message, 'code' => $code, 'data' => $data, 'status' => static::$FailureStatus], $code)->withHeaders($headers);
	}

}
<?php

namespace App\Exceptions;
/**
 * Customer Exceptions for any error am throwing in my application
 *
 **/
class ArtificialException extends \Exception
{

protected  $error_type;
protected  $reason;
protected  $error_code;
function __construct(string $message, $error_code = 400)
{

parent::__construct($message,$error_code);
$this->error_code = $error_code;
}


public  function getErrorCode(){
	return $this->error_code;
}      


}
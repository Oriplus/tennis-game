<?php
declare(strict_types=1);

namespace General;

use stdClass;

class Response
{
  public static function ApiResponse($code = 200, string $message = '', string $data = ''): string
  {
    http_response_code($code);
    header('Content-Type: application/json');
    $response = new stdClass();
		$response->status = $code;
    $response->message = $message;
    $response->data = $data;
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit();
  }
}
<?php
declare(strict_types=1);

namespace Router;

use Api\V1\Presentation\Controllers\ControllerFactory;
use Exception;

/** Router Class **/
class Router {

  private $controller;
  private $method;
  private $param;

  public function __construct()
  {
    $this->matchRoute();
  }

  /** find url resource
   * @return void
   */
  private function matchRoute(): void
  {
    $path = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath =  filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
    $url = substr($urlPath, strlen($path));
    $url = explode('/', $url);
    $this->controller = $url[2];
    $this->method = match ($_SERVER['REQUEST_METHOD']) {
      'POST' => 'create',
      default => throw new Exception('Method does not exist.', 3101)
    };
    $this->param = (int)$url[3] ?? null;
  }

  /** Run current controller
   * @return void
   */
  public function run(): void
  {
    $controller = ControllerFactory::getController($this->controller);
    $method = $this->method;
    $controller->$method($this->param);
  }
}
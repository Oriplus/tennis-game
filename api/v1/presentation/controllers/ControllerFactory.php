<?php
declare(strict_types=1);

namespace Api\V1\Presentation\Controllers;

use Api\V1\Domain\Models\History;
use Exception;
use Api\V1\Presentation\Controllers\GameController;

/** Factory for controllers */
class ControllerFactory {

  /** get Controller file
   * @param string $controllerName
   * @return object
   */
  public static function getController(string $controllerName): object
  {
    return match ($controllerName) {
      'game' => new GameController(),
      'history' => new HistoryController(),
      default => throw new Exception('Controller does not exist.', 3101)
    };
  }

}
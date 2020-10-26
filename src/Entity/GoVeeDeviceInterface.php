<?php

namespace Drupal\govee\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Provides an interface for defining GoVee device entities.
 */
interface GoVeeDeviceInterface extends ConfigEntityInterface {

  /**
   * Get the model number of the GoVee device.
   *
   * @return string
   */
  public function getModel();

  /**
   * Set the model number of the GoVee device.
   *
   * @param string $model
   *
   * @return mixed
   */
  public function setModel($model);
}

<?php

namespace Drupal\govee\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the GoVee device entity.
 *
 * @ConfigEntityType(
 *   id = "govee_device",
 *   label = @Translation("GoVee device"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\govee\GoVeeDeviceListBuilder",
 *     "form" = {
 *       "add" = "Drupal\govee\Form\GoVeeDeviceForm",
 *       "edit" = "Drupal\govee\Form\GoVeeDeviceForm",
 *       "delete" = "Drupal\govee\Form\GoVeeDeviceDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\govee\GoVeeDeviceHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "govee_device",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/govee-device/{govee_device}",
 *     "add-form" = "/admin/structure/govee-device/add",
 *     "edit-form" = "/admin/structure/govee-device/{govee_device}/edit",
 *     "delete-form" = "/admin/structure/govee-device/{govee_device}/delete",
 *     "collection" = "/admin/structure/govee-device"
 *   }
 * )
 */
class GoVeeDevice extends ConfigEntityBase implements GoVeeDeviceInterface {

  /**
   * The GoVee device ID.
   *
   * @var string $id
   */
  protected $id;

  /**
   * @var string $model
   */
  protected $model;

  /**
   * The GoVee device label.
   *
   * @var string
   */
  protected $label;

  public function getModel() {
    return $this->model;
  }

  public function setModel($model) {
    $this->model = trim($model);
  }

}

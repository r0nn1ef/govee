<?php

namespace Drupal\govee\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class GoVeeDeviceForm.
 */
class GoVeeDeviceForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $govee_device = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $govee_device->label(),
      '#description' => $this->t("Label for the GoVee device."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $govee_device->id(),
      '#machine_name' => [
        'exists' => '\Drupal\govee\Entity\GoVeeDevice::load',
      ],
      '#disabled' => !$govee_device->isNew(),
    ];

    $device_opts = explode(', ', "H6160, H6163,
    H6104, H6109, H6110, H6117, H6159, H7021, H7022, H6086, H6089,
    H6182, H6085, H7014, H5081, H6188, H6135, H6137, H6141, H6142,
    H6195, H6196, H7005, H6083, H6002, H6003, H6148");
    $form['model'] = [
      '#type' => 'select',
      '#title' => $this->t('Device model'),
      '#options' => $device_opts,
      '#required' => TRUE,
      '#multiple' => FALSE,
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $govee_device = $this->entity;
    $status = $govee_device->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label GoVee device.', [
          '%label' => $govee_device->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label GoVee device.', [
          '%label' => $govee_device->label(),
        ]));
    }
    $form_state->setRedirectUrl($govee_device->toUrl('collection'));
  }

}

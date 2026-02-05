<?php
namespace Drupal\jobshedular\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class JobShedularForm extends FormBase {

  public function getFormId() {
    return 'jobshedular_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Create Export Job'),
    ];
    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus('Test form loaded successfully.');
  }
}

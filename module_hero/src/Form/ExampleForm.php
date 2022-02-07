<?php
/**
 * @file
 * Contains \Drupal\student_registration\Form\RegistrationForm.
 */
namespace Drupal\student_registration\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase {
  /**
   * {@inheritdoc}
   */

  public function getFormId() {
    return 'example_form';
    }

    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['student_name'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Enter Name:'),
            '#required' => TRUE,
          );
          $form['student_rollno'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Enter Enrollment Number:'),
            '#required' => TRUE,
          );
          $form['student_mail'] = array(
            '#type' => 'email',
            '#title' => $this->t('Enter Email ID:'),
            '#required' => TRUE,
          );
          $form['student_phone'] = array (
            '#type' => 'tel',
            '#title' => $this->t('Enter Contact Number'),
          );
          $form['student_dob'] = array (
            '#type' => 'date',
            '#title' => $this->t('Enter DOB:'),
            '#required' => TRUE,
          );
          $form['student_gender'] = array (
            '#type' => 'select',
            '#title' => ('Select Gender:'),
            '#options' => array(
              'Male' => $this->t('Male'),
              'Female' => $this->t('Female'),
              'Other' => $this->t('Other'),
            ),
          );
          $form['actions']['#type'] = 'actions';
          $form['actions']['submit'] = array(
            '#type' => 'submit',
            '#value' => $this->t('Register'),
            '#button_type' => 'primary',
          );
          return $form;
    }

    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if(strlen($form_state->getValue('student_rollno')) < 8) {
            $form_state->setErrorByName('student_rollno', $this->t('Please enter a valid Enrollment Number'));
          }
          if(strlen($form_state->getValue('student_phone')) < 10) {
            $form_state->setErrorByName('student_phone', $this->t('Please enter a valid Contact Number'));
          }
    }

    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        \Drupal::messenger()->addMessage($this->t("Student Registration Done!! Registered Values are:"));
	foreach ($form_state->getValues() as $key => $value) {
	  \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
    }
}


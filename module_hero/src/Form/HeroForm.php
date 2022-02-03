<?php

namespace Drupal\hero_module\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/*
** This is a custom form.
*/

class HeroForm extends FormBase {

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return "module_hero_form";
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $form['rival_1'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival One'),
        ];
        
        $form['rival_2'] = [
            '#type' => 'textfield',
            '#title' => $this->t('Rival Two'),
        ];

        $form['submit'] = [
            '#type' => 'submit',
            '#title' => $this->t('Who will win?'),
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state)
    {
        if (empty($form_state->getValue('rival_1'))) {
            $form_state->setErrorByName('rival_1', $this->t('Please specify rival one.'));
          }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $winner = rand(1,2);

        \Drupal::messenger()->addMessage(
            'The winner between' . $form_state->getValue('rival_1') . ' and ' . $form_state->getValue('rival_2') . ' is ' . $form_state->getValue('rival_'. $winner)           
        );
    }

}
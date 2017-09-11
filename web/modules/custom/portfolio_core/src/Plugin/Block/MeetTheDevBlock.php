<?php

namespace Drupal\portfolio_core\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'MeetTheDevBlock' block.
 *
 * @Block(
 *  id = "meet_the_dev_block",
 *  admin_label = @Translation("Meet the dev block"),
 * )
 */
class MeetTheDevBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'label' => $this->t('Meet The Dev'),
         'primary_heading' => $this->t('Your Name Here'),
         'heading_image' => $this->t(''),
         'body' => $this->t('Welcome to my website.'),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('The label at the top of the block'),
      '#default_value' => $this->configuration['label'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['primary_heading'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Primary Heading'),
      '#description' => $this->t('The primary header for the block, below the label.'),
      '#default_value' => $this->configuration['primary_heading'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '5',
    ];
    $form['heading_image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Heading Image'),
      '#description' => $this->t('Image placed near the primary header'),
      '#default_value' => $this->configuration['heading_image'],
      '#weight' => '10',
    ];
    $form['body'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Body'),
      '#description' => $this->t('The main content in our block'),
      '#default_value' => $this->configuration['body'],
      '#weight' => '15',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['label'] = $form_state->getValue('label');
    $this->configuration['primary_heading'] = $form_state->getValue('primary_heading');
    $this->configuration['heading_image'] = $form_state->getValue('heading_image');
    $this->configuration['body'] = $form_state->getValue('body');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['meet_the_dev_block_label']['#markup'] = '<h2>' . $this->configuration['label'] . '</h2>';
    $build['meet_the_dev_block_primary_heading']['#markup'] = '<h3>' . $this->configuration['primary_heading'] . '</h3>';
//    $build['meet_the_dev_block_heading_image']['#markup'] = '<p>' . $this->configuration['heading_image'] . '</p>';
    var_dump($this->configuration['heading_image']);
    $build['meet_the_dev_block_body']['#markup'] = '<p>' . $this->configuration['body'] . '</p>';

    return $build;
  }

}

 
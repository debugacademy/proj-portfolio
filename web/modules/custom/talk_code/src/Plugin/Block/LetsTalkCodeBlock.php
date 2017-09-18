<?php

namespace Drupal\talk_code\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'LetsTalkCodeBlock' block.
 *
 * @Block(
 *  id = "lets_talk_code_block",
 *  admin_label = @Translation("Lets talk code block"),
 * )
 */
class LetsTalkCodeBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'label' => $this->t('Build It Bold & Beautiful'),
         'subtitle_tag' => $this->t('Work with a reliable developer and build a brilliant digital experience'),
         'talk_code_submit_button' => $this->t('Lets Talk Code'),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('The title at the top of the block'),
      '#default_value' => $this->configuration['label'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['subtitle_tag'] = [
      '#type' => 'textarea',
      '#title' => $this->t('SubTitle Tag'),
      '#description' => $this->t('The subtitle of the block describing what we do'),
      '#default_value' => $this->configuration['subtitle_tag'],
      '#weight' => '1',
    ];
    $form['talk_code_submit_button'] = [
      '#type' => 'button',
      '#title' => $this->t('Talk Code Submit Button'),
      '#description' => $this->t('Lets Talk Code Submit Button'),
      '#default_value' => $this->configuration['talk_code_submit_button'],
      '#weight' => '2',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['label'] = $form_state->getValue('label');
    $this->configuration['subtitle_tag'] = $form_state->getValue('subtitle_tag');
    $this->configuration['talk_code_submit_button'] = $form_state->getValue('talk_code_submit_button');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['lets_talk_code_block_label']['#markup'] = '<p>' . $this->configuration['label'] . '</p>';
    $build['lets_talk_code_block_subtitle_tag']['#markup'] = '<p>' . $this->configuration['subtitle_tag'] . '</p>';
    $build['lets_talk_code_block_talk_code_submit_button']['#markup'] = '<p>' . $this->configuration['talk_code_submit_button'] . '</p>';

    return $build;
  }

}

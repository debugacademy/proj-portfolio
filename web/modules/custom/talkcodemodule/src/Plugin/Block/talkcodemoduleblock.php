<?php

namespace Drupal\talkcodemodule\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'talkcodemoduleblock' block.
 *
 * @Block(
 *  id = "talkcodemoduleblock",
 *  admin_label = @Translation("Talkcodemoduleblock"),
 * )
 */
class talkcodemoduleblock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'title' => $this->t('BUILD IT BOLD AND BEAUTIFUL'),
         'subtitle' => $this->t('Work with a reliable developer and build a brilliant digital experience'),
         'talkcodebutton' => $this->t('LETS TALK CODE'),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('Talk Code Title'),
      '#default_value' => $this->configuration['title'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['subtitle'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Subtitle'),
      '#description' => $this->t('Talk Code Subtitle'),
      '#default_value' => $this->configuration['subtitle'],
      '#weight' => '1',
    ];
    $form['talkcodebutton'] = [
      '#type' => 'textfield',
      '#title' => $this->t('TalkCodeButton'),
      '#description' => $this->t('Talk Code Button'),
      '#default_value' => $this->configuration['talkcodebutton'],
      '#weight' => '2',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['title'] = $form_state->getValue('title');
    $this->configuration['subtitle'] = $form_state->getValue('subtitle');
    $this->configuration['talkcodebutton'] = $form_state->getValue('talkcodebutton');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['talkcodemoduleblock_title']['#markup'] = '<h2>' . $this->configuration['title'] . '</h2>';
    $build['talkcodemoduleblock_subtitle']['#markup'] = '<h3>' . $this->configuration['subtitle'] . '</h3>';
    $build['talkcodemoduleblock_talkcodebutton']['#markup'] = '<h4><a>' . $this->configuration['talkcodebutton'] . '</a></h4>';
    $build['talkcodemoduleblock']['#attached']['library'][] = 'talkcodemodule/talkcodemodule';
    return $build;
  }

}

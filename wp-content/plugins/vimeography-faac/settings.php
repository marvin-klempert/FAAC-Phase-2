<?php

$settings = array(
  array(
    'type'       => 'colorpicker',
    'label'      => __('Video Title Color'),
    'id'         => 'video-title-color',
    'value'      => '#222222',
    'pro'        => FALSE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-info .vimeography-title', 'attribute' => 'color'),
      )
  ),
  array(
    'type'       => 'colorpicker',
    'label'      => __('Video Description Color'),
    'id'         => 'video-description-color',
    'value'      => '#aaaaaa',
    'pro'        => FALSE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-info .vimeography-description', 'attribute' => 'color'),
      )
  ),
  array(
    'type'       => 'colorpicker',
    'label'      => __('Paging Control Color'),
    'id'         => 'paging-control-color',
    'value'      => '#222222',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-paging-controls a', 'attribute' => 'color'),
      )
  ),
  array(
    'type'       => 'colorpicker',
    'label'      => __('Paging Control Text Color'),
    'id'         => 'paging-control-text-color',
    'value'      => '#222222',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-paging-controls > span', 'attribute' => 'color'),
      )
  ),
  array(
    'type'       => 'colorpicker',
    'label'      => __('Paging Loader Color'),
    'id'         => 'loader-color',
    'value'      => '#000000',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'important'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-spinner div div', 'attribute' => 'backgroundColor'),
      )
  ),
  array(
    'type'       => 'numeric',
    'label'      => __('Video Title Size'),
    'id'         => 'video-title-size',
    'value'      => '13',
    'min'        => '8',
    'max'        => '24',
    'step'       => '1',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-info .vimeography-title', 'attribute' => 'fontSize'),
      )
  ),
  array(
    'type'       => 'numeric',
    'label'      => __('Video Description Size'),
    'id'         => 'video-description-size',
    'value'      => '11',
    'min'        => '8',
    'max'        => '16',
    'step'       => '1',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-info .vimeography-description', 'attribute' => 'fontSize'),
      )
  ),
  array(
    'type'       => 'slider',
    'label'      => __('Thumbnail Width'),
    'id'         => 'thumbnail-width',
    'value'      => '200',
    'min'        => '150',
    'max'        => '500',
    'step'       => '10',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-thumbnail-container', 'attribute' => 'maxWidth'),
      )
  ),
  array(
    'type'       => 'slider',
    'label'      => __('Thumbnail Height'),
    'id'         => 'thumbnail-height',
    'value'      => '200',
    'min'        => '150',
    'max'        => '400',
    'step'       => '10',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-thumbnail-container', 'attribute' => 'height'),
      )
  ),
  array(
    'type'       => 'visibility',
    'label'      => __('Show Description'),
    'id'         => 'video-description-visibility',
    'value'      => 'block',
    'pro'        => TRUE,
    'namespace'  => TRUE,
    'properties' =>
      array(
        array('target' => '.vimeography-faac .vimeography-info .vimeography-description', 'attribute' => 'display'),
      )
  ),
);

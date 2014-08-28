<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="apple-touch-icon" href="/assets/img/m.touch.icon.png">
  <link rel="apple-touch-startup-image" href="/assets/img/m.touch.startup.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-title" content="Survey">
  <!-- iOS 6 & 7 iPad (retina, portrait) -->
 <link href="/assets/img/apple-touch-startup-image-1536x2008.png"
       media="(device-width: 768px) and (device-height: 1024px)
          and (-webkit-device-pixel-ratio: 2)"
       rel="apple-touch-startup-image">

 <!-- iOS 6 iPad (portrait) -->
 <link href="/assets/img/apple-touch-startup-image-768x1004.png"
       media="(device-width: 768px) and (device-height: 1024px)
          and (-webkit-device-pixel-ratio: 1)"
       rel="apple-touch-startup-image">

 <!-- iOS 6 & 7 iPhone 5 -->
 <link href="/assets/img/apple-touch-startup-image-640x1096.png"
       media="(device-width: 320px) and (device-height: 568px)
          and (-webkit-device-pixel-ratio: 2)"
       rel="apple-touch-startup-image">

 <!-- iOS 6 & 7 iPhone (retina) -->
 <link href="/assets/img/apple-touch-startup-image-640x920.png"
       media="(device-width: 320px) and (device-height: 480px)
          and (-webkit-device-pixel-ratio: 2)"
       rel="apple-touch-startup-image">

 <!-- iOS 6 iPhone -->
 <link href="/assets/img/apple-touch-startup-image-320x460.png"
       media="(device-width: 320px) and (device-height: 480px)
          and (-webkit-device-pixel-ratio: 1)"
       rel="apple-touch-startup-image">
       
  <?php wp_head(); ?>
  
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>

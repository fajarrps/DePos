<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Test</title>
<link rel="stylesheet" href="<?php echo get_template_directory('bootstrap-4.4.1/css/') ;?>bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory('mycss.css') ;?>"> 
<script src="<?php echo get_template_directory('jquery.js') ;?>" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?php echo get_template_directory('plugins/lightslider-master/dist/css/lightslider.css') ;?>">
<link rel="stylesheet" href="<?php echo get_template_directory('plugins/lightgallery-master/dist/css/lightgallery.css') ;?>">
<link rel="stylesheet" href="<?php echo get_template_directory('plugins/bootstrap-slider-master/dist/css/bootstrap-slider.min.css') ;?>">
<script src="<?php echo get_template_directory('plugins/lightslider-master/dist/js/lightslider.js') ;?>" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory('plugins/lightgallery-master/dist/js/lightgallery.js') ;?>" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory('plugins/bootstrap-slider-master/dist/bootstrap-slider.min.js') ;?>" crossorigin="anonymous"></script>

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/> -->


<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style>

</style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-white rounded">
  <a class="navbar-brand" href="<?=base_url()?>" style="margin-left: 10%;"><img src="<?=get_foto_assets('logodestiny.png')?>" style="width: 20%;"></a>
  <ul class="navbar-nav mr-auto">
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active" style="margin-right: 60px;">
      <a class="nav-link">HOME</a>
    </li>
    <li class="nav-item active" style="margin-right: 60px;">
      <a class="nav-link">SHOP</a>
    </li>
    <li class="nav-item" style="margin-right: 120px;">
      <a class="nav-link">ABOUT</a>
    </li>
  </ul>
</nav>
<hr class="style1 mb-3" style="padding: 0px;">
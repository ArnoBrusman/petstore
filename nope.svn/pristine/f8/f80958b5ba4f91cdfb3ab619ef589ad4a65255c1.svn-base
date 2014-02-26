<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $this->config->item('site_title'); ?></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css">
  <?php if (isset($css)): ?>
    <?php foreach ($css as $stylesheet): ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/<?php echo $stylesheet; ?>">
    <?php endforeach; ?>
  <?php endif; ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <?php if (isset($js)): ?>
    <?php foreach ($js as $script): ?>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/<?php echo $script; ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="<?php echo base_url(); ?>"><?php echo $this->config->item('site_title'); ?></a>
      <div class="nav-collapse">
        <ul class="nav">
          <li<?php if ($this->uri->segment(1) == "album") echo ' class="active"'; ?>><a href="<?php echo site_url("gallery/album"); ?>">Albums</a></li>
          <li<?php if ($this->uri->segment(1) == "feed") echo ' class="active"'; ?>><a href="<?php echo site_url("gallery/feed"); ?>">Feeds</a></li>
          <li<?php if ($this->uri->segment(1) == "user") echo ' class="active"'; ?>><a href="<?php echo site_url("gallery/user"); ?>">Users</a></li>
        </ul>
        <p class="navbar-text pull-right"><a href="<?php echo site_url("gallery/auth/logout"); ?>">Logout</a></p>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

<div class="container-fluid">

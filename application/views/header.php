<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->settings_model->get('title') ?></title>
<!--     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-grid.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css') ?>"> -->
</head>
<body>
    <div class="container">
        <div class="header row">
            <div class="col-md-12">
                <?php if(!$this->uri->segment(1)): ?>
                    <h1 class="site-title"><a href="<?php echo base_url() ?>"><?php echo $this->settings_model->get('title') ?></a></h1>
                <?php else: ?>
                    <div class="site-title"><a href="<?php echo base_url() ?>"><?php echo $this->settings_model->get('title') ?></a></div>
                <?php endif ?>
            </div>
        </div>
        <div class="main row">
            <div class="col-md-12">
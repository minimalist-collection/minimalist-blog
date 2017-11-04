<!DOCTYPE html>
<html>
<head>
    <title>minimalist-blog</title>
<!--     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-grid.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css') ?>"> -->
</head>
<body>
    <div class="container">
        <div class="header row">
            <div class="col-md-12">
                <?php if(!$this->uri->segment(1)): ?>
                    <h1 class="site-title"><a href="<?php echo base_url() ?>">minimalist-blog</a></h1>
                <?php else: ?>
                    <div class="site-title"><a href="<?php echo base_url() ?>">minimalist-blog</a></div>
                <?php endif ?>
            </div>
        </div>
        <div class="main row">
            <div class="col-md-12">
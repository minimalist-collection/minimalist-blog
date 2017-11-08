<!DOCTYPE html>
<html>
<head>
    <title><?php echo $this->settings_model->get('title') ?></title>
<!--     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-grid.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css') ?>"> -->

    <!-- Loading Bootstrap -->
    <link href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Loading Font Awesome Icons -->
    <link href="<?php echo base_url('css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Loading Drunken Parrot UI -->
    <link href="<?php echo base_url('css/drunken-parrot.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/demo.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/main.css') ?>" rel="stylesheet">


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 side">
                <?php if(!$this->uri->segment(1)): ?>
                    <h1 class="blog-title"><a href="<?php echo base_url() ?>"><?php echo $this->settings_model->get('title') ?></a></h1>
                <?php else: ?>
                    <div class="blog-title"><a href="<?php echo base_url() ?>"><?php echo $this->settings_model->get('title') ?></a></div>
                <?php endif ?>
                <p><?php echo $this->settings_model->get('description') ?></p>
                <?php if($pages = $this->pages_model->get_sidebar_pages()): ?>
                <ul class="navigation">
                    <?php foreach($pages as $page): ?>
                        <li><a href="<?php echo base_url("pages/view/{$page->page_id}") ?>"><?php echo $page->title ?></a></li>
                    <?php endforeach ?>
                </ul>
                <?php endif ?>

                <?php if($this->ion_auth->logged_in()): ?>
                    <br>
                    <a href="<?php echo base_url("posts/create") ?>">
                        <button type="button" class="btn btn-primary btn-embossed new-button">New Post</button>
                    </a>
                <?php endif ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-3 main">
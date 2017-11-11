<!DOCTYPE html>
<html>
<head>
    <title>Install Blog</title>
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
    <div class="container install">
        <div class="main row">
            <div class="col-md-12">

                <h1>Welcome!</h1>

                <?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>

                <?php echo form_open() ?>

                    <h2>Blog Information</h2>

                    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
                        <label>Blog Title</label><br>
                        <input type="text" class="form-control" name="title" value="<?php echo set_value('title') ?>">
                        <?php echo form_error('title') ?>
                    </div>

                    <div class="<?php if(form_error('description')) echo 'has-error' ?>">
                        <label>Blog Description</label><br>
                        <input type="text" class="form-control" name="description" value="<?php echo set_value('description') ?>">
                        <?php echo form_error('description') ?>
                    </div>

                    <h2>User Information</h2>


                    <div class="<?php if(form_error('first_name')) echo 'has-error' ?>">
                        <label>First Name</label><br>
                        <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name') ?>">
                        <?php echo form_error('first_name') ?>
                    </div>

                    <div class="<?php if(form_error('last_name')) echo 'has-error' ?>">
                        <label>Last Name</label><br>
                        <input type="text" class="form-control" name="last_name" value="<?php echo set_value('last_name') ?>">
                        <?php echo form_error('last_name') ?>
                    </div>
                    
                    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
                        <label>E-mail Address</label><br>
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email') ?>
                    </div>

                    <div class="<?php if(form_error('password')) echo 'has-error' ?>">
                        <label>Password</label><br>
                        <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>">
                        <?php echo form_error('password') ?>
                    </div>

                    <div class="<?php if(form_error('password2')) echo 'has-error' ?>">
                        <label>Password (Confirm)</label><br>
                        <input type="password" class="form-control" name="password2" value="<?php echo set_value('password2') ?>">
                        <?php echo form_error('password2') ?>
                    </div>

                    <input type="submit" class="btn btn-block btn-primary btn-kr btn-embossed" value="Start!">
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</body>
</html>
</html>
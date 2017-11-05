<!DOCTYPE html>
<html>
<head>
    <title>Install Blog</title>
<!--     <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-grid.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css') ?>"> -->
</head>
<body>
    <div class="container">
        <div class="header row">
            <div class="col-md-12">
                <div class="site-title">Install Blog</div>
            </div>
        </div>
        <div class="main row">
            <div class="col-md-12">

                <h1>Welcome!</h1>

                <?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
                    <div class="alert alert-error" role="alert">
                        <?php echo $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>

                <?php echo form_open() ?>

                    <h2>Blog Information</h2>

                    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
                        <label>Blog Title</label><br>
                        <input type="text" name="title" value="<?php echo set_value('title') ?>"><br>
                        <?php echo form_error('title') ?>
                    </div>

                    <div class="<?php if(form_error('description')) echo 'has-error' ?>">
                        <label>Blog Description</label><br>
                        <input type="text" name="description" value="<?php echo set_value('description') ?>"><br>
                        <?php echo form_error('description') ?>
                    </div>

                    <h2>User Information</h2>


                    <div class="<?php if(form_error('first_name')) echo 'has-error' ?>">
                        <label>First Name</label><br>
                        <input type="text" name="first_name" value="<?php echo set_value('first_name') ?>"><br>
                        <?php echo form_error('first_name') ?>
                    </div>

                    <div class="<?php if(form_error('last_name')) echo 'has-error' ?>">
                        <label>Last Name</label><br>
                        <input type="text" name="last_name" value="<?php echo set_value('last_name') ?>"><br>
                        <?php echo form_error('last_name') ?>
                    </div>
                    
                    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
                        <label>E-mail Address</label><br>
                        <input type="email" name="email" value="<?php echo set_value('email') ?>"><br>
                        <?php echo form_error('email') ?>
                    </div>

                    <div class="<?php if(form_error('password')) echo 'has-error' ?>">
                        <label>Password</label><br>
                        <input type="password" name="password" value="<?php echo set_value('password') ?>"><br>
                        <?php echo form_error('password') ?>
                    </div>

                    <div class="<?php if(form_error('password2')) echo 'has-error' ?>">
                        <label>Password (Confirm)</label><br>
                        <input type="password" name="password2" value="<?php echo set_value('password2') ?>"><br>
                        <?php echo form_error('password2') ?>
                    </div>

                    <input type="submit" value="Save">
                <?php echo form_close() ?>

            </div>
        </div>
    </div>
</body>
</html>
</html>
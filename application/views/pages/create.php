<?php $this->load->view('header.php') ?>

<h1>Create Page</h1>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
        <label>Page Title</label><br>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title') ?>">
        <?php echo form_error('title'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Page Content</label><br>
        <textarea  name="content" class="tinymce"><?php echo set_value('content') ?></textarea>
        <?php echo form_error('content'); ?>
    </div>

    <div class="<?php if(form_error('sidebar')) echo 'has-error' ?>">
        <label>Sidebar Link</label><br>
        <label>
            <input type="radio" name="sidebar" value="Y" checked> Yes
        </label>
        <label>
            <input type="radio" name="sidebar" value="N"> No
        </label>
        <?php echo form_error('sidebar'); ?>
    </div>

    <input type="submit" class="btn btn-primary" value="Save">
    <a href="<?php echo base_url("pages/all") ?>">
        <button type="button" class="btn btn-default">Cancel</button>
    </a>
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>

<h1>Create Post</h1>

<?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $this->session->flashdata('success') ?>
    </div>
<?php endif ?>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
        <label>Post Title</label><br>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title') ?>">
        <?php echo form_error('title'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Post Content</label><br>
        <textarea  name="content" class="tinymce"><?php echo set_value('content') ?></textarea>
        <?php echo form_error('content'); ?>
    </div>

    <div class="<?php if(form_error('tags')) echo 'has-error' ?>">
        <label>Post Tags</label><br>
        <input type="text" class="form-control" name="tags" value="<?php echo set_value('tags') ?>">
        <?php echo form_error('tags'); ?>
    </div>

    <input type="submit" class="btn btn-primary" value="Post">
    <input type="submit" class="btn btn-primary" name="draft" value="Save as Draft">
    <a href="<?php echo base_url("posts/all") ?>">
        <button type="button" class="btn btn-default">Cancel</button>
    </a>
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
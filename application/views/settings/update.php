<?php $this->load->view('header.php') ?>
<h1>Settings</h1>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
        <label>Blog Title</label><br>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title') ? set_value('title') : $settings->title ?>">
        <?php echo form_error('title'); ?>
    </div>

    <div class="<?php if(form_error('description')) echo 'has-error' ?>">
        <label>Blog Description</label><br>
        <input type="text" class="form-control" name="description" value="<?php echo set_value('description') ? set_value('description') : $settings->description ?>">
        <?php echo form_error('description'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Comments</label><br>
        <label>
            <input type="radio" name="comments" value="Y" <?php echo $settings->comments == 'Y' ? 'checked' : '' ?>> Enabled
        </label>
        <label>
            <input type="radio" name="comments" value="N" <?php echo $settings->comments == 'N' ? 'checked' : '' ?>> Disabled
        </label>
        <?php echo form_error('content'); ?>
    </div>

    <input type="submit" class="btn btn-primary" value="Post">
    <a href="<?php echo base_url() ?>">
        <button type="button" class="btn btn-default">Cancel</button>
    </a>
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
<h2>Comments</h2>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('name')) echo 'has-error' ?>">
        <label>Name</label><br>
        <input type="text" class="form-control" name="name" value="<?php echo set_value('name') ? set_value('name') : $post->name ?>">
        <?php echo form_error('name'); ?>
    </div>

    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
        <label>E-mail (optional)</label><br>
        <input type="text" class="form-control" name="email" value="<?php echo set_value('email') ? set_value('email') : $post->email ?>">
        <?php echo form_error('email'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Comment</label><br>
        <textarea  name="content" <?php echo form_error('content') ? 'input-error' : '' ?>"><?php echo set_value('content') ? set_value('content') : $post->content ?></textarea>
        <?php echo form_error('content'); ?>
    </div>

    <input type="submit" class="btn btn-primary" value="Post">
    <a href="<?php echo base_url("posts/view/{$post->post_id}") ?>">
        <button type="button" class="btn btn-default">Cancel</button>
    </a>
<?php echo form_close() ?>
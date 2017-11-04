<h2>Comments</h2>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-error" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('name')) echo 'has-error' ?>">
        <label>Name</label><br>
        <input type="text" name="name" value="<?php echo set_value('name') ? set_value('name') : $post->name ?>"><br>
        <?php echo form_error('name'); ?>
    </div>

    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
        <label>E-mail (optional)</label><br>
        <input type="text" name="email" value="<?php echo set_value('email') ? set_value('email') : $post->email ?>"><br>
        <?php echo form_error('email'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Comment</label><br>
        <textarea name="content" <?php echo form_error('content') ? 'input-error' : '' ?>"><?php echo set_value('content') ? set_value('content') : $post->content ?></textarea><br>
        <?php echo form_error('content'); ?>
    </div>

    <input type="submit" value="Post">
    <a href="<?php echo base_url("posts/view/{$post->post_id}") ?>">
        <button type="button" class="link">Cancel</button>
    </a>
<?php echo form_close() ?>
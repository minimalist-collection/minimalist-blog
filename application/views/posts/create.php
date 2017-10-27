<?php $this->load->view('header.php') ?>

<h1>Create Post</h1>
<?php echo form_open() ?>
    <label>Post Title</label><br>
    <input type="text" name="title" value="<?php echo set_value('title') ?>"><br>
    <?php echo form_error('title'); ?>

    <label>Post Content</label><br>
    <textarea name="content"><?php echo set_value('content') ?></textarea><br>
    <?php echo form_error('content'); ?>

    <input type="submit" value="Post">
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>
<h1>Edit Page</h1>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
        <label>Blog Title</label><br>
        <input type="text" class="form-control" name="title" value="<?php echo set_value('title') ? set_value('title') : $page->title ?>">
        <?php echo form_error('title'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Blog Content</label><br>
        <textarea  name="content" class="tinymce <?php echo form_error('title') ? 'input-error' : '' ?>"><?php echo set_value('content') ? set_value('content') : $page->content ?></textarea>
        <?php echo form_error('content'); ?>
    </div>

    <div class="<?php if(form_error('sidebar')) echo 'has-error' ?>">
        <label>Sidebar Link</label><br>
                <input type="checkbox" name="sidebar" data-toggle="switch" class="bootstrapswitch" <?php echo $page->sidebar == 'Y' ? 'checked' : '' ?>>
        <?php echo form_error('sidebar'); ?>
    </div>

    <?php if ($num_pages = count($this->pages_model->get_sidebar_pages())): ?>
        <div class="<?php if(form_error('sidebar_place')) echo 'has-error' ?>">
            <label>Sidebar Position</label><br>
            <select name="sidebar_place" class="form-control">
                <?php for($i = 1; $i < $num_pages + 1; $i++): ?>
                    <option value="<?php echo $i ?>" <?php echo ( $page->sidebar_place ) == $i  ? 'selected' : '' ?>><?php echo $i ?></option>
                <?php endfor ?>
            </select>
            <?php echo form_error('sidebar_place'); ?>
        </div>
    <?php endif ?>
    <input type="submit" class="btn btn-primary" value="Save">
    <input type="submit" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete this page?');" value="Delete">
    <a href="<?php echo base_url("pages/all") ?>">
        <button type="button" class="btn btn-default">Cancel</button>
    </a>
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
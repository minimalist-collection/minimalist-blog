<?php $this->load->view('header.php') ?>
<h1>Edit Page</h1>

<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-error" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open() ?>

    <div class="<?php if(form_error('title')) echo 'has-error' ?>">
        <label>Blog Title</label><br>
        <input type="text" name="title" value="<?php echo set_value('title') ? set_value('title') : $page->title ?>"><br>
        <?php echo form_error('title'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Blog Content</label><br>
        <textarea name="content" class="tinymce <?php echo form_error('title') ? 'input-error' : '' ?>"><?php echo set_value('content') ? set_value('content') : $page->content ?></textarea><br>
        <?php echo form_error('content'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Sidebar Link</label><br>
        <label>
            <input type="radio" name="sidebar" value="Y" <?php echo $page->sidebar == 'Y' ? 'checked' : '' ?>> Yes
        </label>
        <label>
            <input type="radio" name="sidebar" value="N" <?php echo $page->sidebar == 'N' ? 'checked' : '' ?>> No
        </label>
        <?php echo form_error('content'); ?>
    </div>

    <?php if ($num_pages = count($this->pages_model->get_sidebar_pages())): ?>
        <div class="<?php if(form_error('sidebar_place')) echo 'has-error' ?>">
            <label>Sidebar Position</label><br>
            <select name="sidebar_place">
                <?php for($i = 1; $i < $num_pages + 1; $i++): ?>
                    <option value="<?php echo $i ?>" <?php echo ( $page->sidebar_place ) == $i  ? 'selected' : '' ?>><?php echo $i ?></option>
                <?php endfor ?>
            </select>
            <?php echo form_error('sidebar_place'); ?>
        </div>
    <?php endif ?>
    <input type="submit" value="Save">
    <input type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this page?');" value="Delete">
    <a href="<?php echo base_url("pages/all") ?>">
        <button type="button" class="link">Cancel</button>
    </a>
<?php echo form_close() ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>

<h1>
    <?php echo $page->title ?>
    <?php if($this->ion_auth->logged_in()): ?>
        <a href="<?php echo base_url("pages/edit/{$page->page_id}") ?>">
            <button type="button" class="btn btn-primary pull-right">Edit</button>
        </a>
    <?php endif ?>
</h1>

<?php echo $page->content ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>

<h1>All Pages</h1>

<?php if($this->ion_auth->logged_in()): ?>
    <a href="<?php echo base_url("pages/create") ?>">
        <button type="button" class="btn btn-primary btn-embossed new-button">New Page</button>
    </a>
<?php endif ?>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Sidebar Link</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pages as $page): ?>
            <tr>
                <td><?php echo anchor( base_url("pages/view/{$page->page_id}"), $page->title) ?></td>
                <td><?php echo $page->sidebar == 'Y' ? "Yes <span class='text-muted'>( " . $page->sidebar_place . " )</span>" : "No" ?></td>
                <td>
                    <form method="page" action="<?php echo base_url("pages/delete/{$page->page_id}") ?>">
                        <a href="<?php echo base_url("pages/edit/{$page->page_id}") ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php $this->load->view('footer.php') ?>
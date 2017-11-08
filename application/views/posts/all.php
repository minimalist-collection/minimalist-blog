<?php $this->load->view('header.php') ?>

<h1>All Posts</h1>

<?php if($this->ion_auth->logged_in()): ?>
    <a href="<?php echo base_url("posts/create") ?>">
        <button type="button" class="btn btn-primary btn-embossed new-button">New Post</button>
    </a>
<?php endif ?>



<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th class="published">Published</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></td>
                <td><?php echo $post->publish_date ? date('d/m/y H:iA', strtotime($post->publish_date)) : '<span class="text-muted">Not published</span>' ?></td>
                <td>
                    <form method="post" action="<?php echo base_url("posts/delete/{$post->post_id}") ?>">
                        <a href="<?php echo base_url("posts/edit/{$post->post_id}") ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                        <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
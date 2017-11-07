<?php $this->load->view('header.php') ?>

<h1>All Posts</h1>

<?php if($this->ion_auth->logged_in()): ?>
    <a href="<?php echo base_url("posts/create") ?>">
        <button type="button">New Post</button>
    </a>
<?php endif ?>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <td><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></td>
                <td><?php echo $post->author->first_name . ' ' . $post->author->last_name ?></td>
                <td><?php echo $post->publish_date ? date('M d Y \a\t H:iA', strtotime($post->publish_date)) : '' ?></td>
                <td>
                    <form method="post" action="<?php echo base_url("posts/delete/{$post->post_id}") ?>" onclick="return confirm('Are you sure you want to delete this post?')">
                        <a href="<?php echo base_url("posts/edit/{$post->post_id}") ?>"><button type="button" class="btn btn-default">Edit</button></a>
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
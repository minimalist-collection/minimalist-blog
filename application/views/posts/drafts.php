<?php $this->load->view('header.php') ?>

<h1>Draft Posts</h1>

<a href="<?php echo base_url("posts/create") ?>">
    <button type="button">New Post</button>
</a>

<ul class="posts-list">
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></div>
        <div class="post-content"><?php echo preview($post->content, 200) ?></div>
        <?php echo anchor( base_url("posts/edit/{$post->post_id}"), 'Edit') ?>
    </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
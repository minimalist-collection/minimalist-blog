<?php $this->load->view('header.php') ?>

<h1>Posts</h1>
<ul class="posts-list">
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></div>
        <div class="post-info">Posted <?php echo date('M d Y \a\t H:iA', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
    </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('footer.php') ?>
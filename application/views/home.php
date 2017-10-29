<?php $this->load->view('header.php') ?>

<ul class="posts-list posts-list-home">
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></div>
        <div class="post-info">Posted <?php echo date('M d Y \a\t H:iA', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
        <div class="post-content"><?php echo preview($post->content, 500) ?></div>
        <?php echo anchor( base_url("posts/view/{$post->post_id}"), 'Read More') ?>
    </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
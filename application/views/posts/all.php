<?php $this->load->view('header.php') ?>

<h1>Posts</h1>

<?php if($this->ion_auth->logged_in()): ?>
	<a href="<?php echo base_url("posts/create") ?>">
	    <button type="button">New Post</button>
	</a>
<?php endif ?>

<ul class="posts-list">
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></div>
        <div class="post-info">Posted <?php echo date('M d Y \a\t H:iA', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
    </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>

<?php if( $post ): ?>
    <h1><?php echo $post->title ?></h1>
    <div class="post-info">
        <span class="author">Posted by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></span> 
        <span class="date">on <?php echo date('M d Y H:iA', strtotime($post->publish_date)) ?></span>
    </div>
    <div class="post-content">
        <?php echo $post->content ?>
    </div>
<?php else: ?>
    <h1>Post not found</h1>
    <p>The post you were looking for could not be found.</p>
<?php endif ?>

<?php if($this->ion_auth->logged_in()): ?>
    <a href="<?php echo base_url("posts/edit/{$post->post_id}") ?>">
        <button type="button">Edit</button>
    </a>
<?php endif ?>

<?php $this->load->view('footer.php') ?>
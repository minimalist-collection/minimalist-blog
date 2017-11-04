<?php $this->load->view('header.php') ?>

<?php if( $post ): ?>
    <h1><?php echo $post->title ?></h1>
    <div class="post-info">
        <span class="author">Posted by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></span> 
        <span class="date">on <?php echo date('j F Y \a\t H:ia', strtotime($post->publish_date)) ?></span>
    </div>
    <div class="post-content">
        <?php echo $post->content ?>
    </div>
    <?php if($tags = array_filter(explode(',', $post->tags))): ?>
        <div class="post-tags">
            Tagged 
            <?php foreach($tags as $tag): ?>
                <?php echo anchor( base_url("posts/tagged/$tag"), str_replace('-', ' ', $tag)) ?><?php if(end($tags) !== $tag) echo ', ' ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <?php if($this->ion_auth->logged_in()): ?>
        <a href="<?php echo base_url("posts/edit/{$post->post_id}") ?>">
            <button type="button">Edit</button>
        </a>
    <?php endif ?>


    <?php if($this->settings_model->get('comments') == 'Y'): ?>
        <a name="comments"></a>
        <h2>Add Comment</h2>
        <?php $this->load->view('comments/comments', array('post_id' => $post->post_id)) ?>
    <?php endif ?>
<?php else: ?>
    <h1>Post not found</h1>
    <p>The post you were looking for could not be found.</p>
<?php endif ?>



<?php $this->load->view('footer.php') ?>
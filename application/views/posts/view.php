<?php $this->load->view('header.php') ?>

<?php if( $post ): ?>
    <div class="single-post">
        <h1><?php echo $post->title ?></h1>
        <div class="info">Posted <?php echo date('j M Y', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
        <?php if($tags = array_filter(explode(',', $post->tags))): ?>
            <div class="tags">
                under 
                <?php foreach($tags as $tag): ?>
                    <?php echo anchor( base_url("posts/tagged/$tag"), str_replace('-', ' ', $tag), array('class' => 'label label-info')) ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <div class="content">
            <?php echo $post->content ?>
        </div>

        <?php if($this->ion_auth->logged_in()): ?>
            <a href="<?php echo base_url("posts/edit/{$post->post_id}") ?>">
                <button type="button" class="btn btn-default">Edit</button>
            </a>
        <?php endif ?>


        <?php if($this->settings_model->get('comments') == 'Y'): ?>
            <a name="comments"></a>
            <h2>Add Comment</h2>
            <?php $this->load->view('comments/comments', array('post_id' => $post->post_id)) ?>
        <?php endif ?>
    </div>
<?php else: ?>
    <h1>Post not found</h1>
    <p>The post you were looking for could not be found.</p>
<?php endif ?>



<?php $this->load->view('footer.php') ?>
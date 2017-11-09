<?php $this->load->view('header.php') ?>
<?php foreach($posts as $post): ?>
<div class="post">
    <h2 class="title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></h2>
    <div class="info">Posted <?php echo date('j M Y', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>

    <?php if($tags = array_filter(explode(',', $post->tags))): ?>
        <div class="tags">
            under 
            <?php foreach($tags as $tag): ?>
                <?php echo anchor( base_url("posts/tagged/$tag"), str_replace('-', ' ', $tag), array('class' => 'label label-info', 'style' => 'background: ' . tag_color($tag) )) ?>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <div class="content"><?php echo preview($post->content, 1200) ?></div>
</div>
<?php endforeach ?>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
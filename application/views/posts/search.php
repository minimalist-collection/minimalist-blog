<?php $this->load->view('header.php') ?>

<h1>Search <?php if($keywords) echo 'for "' . $keywords . '"' ?></h1>

<form class="form-inline" action="<?php echo base_url('posts/search') ?>">
    <input type="text" class="form-control" name="search" value="<?php echo $this->input->get('search') ?>">
    <input type="submit" class="btn btn-primary" value="Search">
</form>

<h2><?php echo count($posts) ?> results</h2>

<?php foreach($posts as $post): ?>
    <div class="post search-post">
        <h3 class="title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></h3>
        <div class="info">Posted <?php echo date('j F Y \a\t H:ia', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
        <?php if($tags = array_filter(explode(',', $post->tags))): ?>
            <div class="tags">
                under 
                <?php foreach($tags as $tag): ?>
                    <?php echo anchor( base_url("posts/tagged/$tag"), str_replace('-', ' ', $tag), array('class' => 'label label-info', 'style' => 'background: ' . tag_color($tag) )) ?>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="content"><?php echo preview($post->content, 300) ?></div>
        <?php echo anchor( base_url("posts/view/{$post->post_id}"), 'Read More', array('class' => 'read-more')) ?>
    </div>
<?php endforeach ?>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
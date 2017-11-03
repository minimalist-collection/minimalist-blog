<?php $this->load->view('header.php') ?>

<h1><?php echo ucfirst($tag) ?></h1>
<div class="sub">Posts tagged with <?php echo ucfirst($tag) ?></div>

<ul class="posts-list">
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></div>
        <div class="post-info">Posted <?php echo date('j F Y \a\t H:ia', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
        <div class="post-content"><?php echo preview($post->content, 500) ?></div>

        <?php if($tags = array_filter(explode(',', $post->tags))): ?>
            <div class="post-tags">
                Tagged 
                <?php foreach($tags as $tag): ?>
                    <?php echo anchor( base_url("posts/tagged/$tag"), str_replace('-', ' ', $tag)) ?><?php if(end($tags) !== $tag) echo ', ' ?>
                <?php endforeach ?> &middot; 
            </div>
        <?php endif ?>
        <?php echo anchor( base_url("posts/view/{$post->post_id}"), 'Read More') ?>
    </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('pagination') ?>

<?php $this->load->view('footer.php') ?>
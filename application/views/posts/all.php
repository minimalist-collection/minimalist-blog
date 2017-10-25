<ul>
    <?php foreach($posts as $post): ?>
    <li>
        <div class="post-title"><?php echo $post->title ?></div>
        <div class="post-info">Posted <?php echo date('M d Y \a\t H:iA', strtotime($post->publish_date)) ?> by <?php echo $post->author->first_name . ' ' . $post->author->last_name ?></div>
    </li>
    <?php endforeach ?>
</ul>
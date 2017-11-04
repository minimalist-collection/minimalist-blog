<?php $this->load->view('header.php') ?>

<h1>Archives</h1>

<?php if($this->ion_auth->logged_in()): ?>
	<a href="<?php echo base_url("posts/create") ?>">
	    <button type="button">New Post</button>
	</a>
<?php endif ?>

<ul>
    <?php foreach($archives as $year => $months): ?>
        <li>
            <?php echo $year?>
            <ul>
                <?php foreach($months as $month => $posts): ?>
                    <li><?php echo $month ?>
                        <ul>
                            <?php foreach($posts as $post): ?>
                            <li><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                <?php endforeach ?>
            </ul>
        </li>
    <?php endforeach ?>
</ul>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header.php') ?>

<h1>Archives</h1>

<form class="form-inline" action="<?php echo base_url('posts/search') ?>">
    <input type="text" class="form-control" name="search">
    <input type="submit" class="btn btn-primary" value="Search">
</form>

<?php foreach($archives as $year => $months): ?>
        <h3><?php echo $year?></h3>
        <hr>
            <?php foreach($months as $month => $posts): ?>
                <h4><?php echo $month ?> <span class="badge"><?php echo count($posts) ?></span></h4>
                    <ul>
                        <?php foreach($posts as $post): ?>
                        <li><?php echo anchor( base_url("posts/view/{$post->post_id}"), $post->title) ?></li>
                        <?php endforeach ?>
                    </ul>
            <?php endforeach ?>
<?php endforeach ?>

<?php $this->load->view('footer.php') ?>
<?php $this->load->view('header') ?>
<h1>Add a Comment</h1>
<?php $this->load->view('comments/comments', array('post_id' => $post_id)) ?>

<?php $this->load->view('footer') ?>
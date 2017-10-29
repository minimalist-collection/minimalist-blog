<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-error" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>

<?php echo form_open("comments/add/{$post_id}") ?>

    <div class="<?php if(form_error('name')) echo 'has-error' ?>">
        <label>Name</label><br>
        <input type="text" name="name" value="<?php echo set_value('name') ?>"><br>
        <?php echo form_error('name'); ?>
    </div>

    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
        <label>E-mail (optional)</label><br>
        <input type="email" name="email" value="<?php echo set_value('email') ?>"><br>
        <?php echo form_error('email'); ?>
    </div>

    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
        <label>Comment</label><br>
        <textarea name="content"><?php echo set_value('content') ?></textarea><br>
        <?php echo form_error('content'); ?>
    </div>

    <?php echo $this->recaptcha->getWidget() ?>

    <input type="submit" value="Comment">
<?php echo form_close() ?>

<?php if(!empty($comments)): ?>
    <h2>Comments<span class="text-muted"> (<?php echo count($comments) ?>)</h2>
    <?php foreach($comments as $comment): ?>
        <div class="comment">
            <div class="name"><?php echo $comment->name ?></div>
            <div class="content"><?php echo $comment->content ?></div>
            <div class="date"><?php echo date('d M Y H:ia', strtotime($comment->date)) ?></div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<?php echo $this->recaptcha->getScriptTag() ?>
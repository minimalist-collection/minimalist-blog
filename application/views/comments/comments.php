<?php if($this->input->method() == 'post' && $this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close fa-times fa"></button>
        <?php echo $this->session->flashdata('error') ?>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open("comments/add/{$post_id}") ?>

                    <div class="<?php if(form_error('name')) echo 'has-error' ?>">
                        <label>Name</label><br>
                        <input type="text" class="form-control" name="name" value="<?php echo set_value('name') ?>">
                        <?php echo form_error('name'); ?>
                    </div>

                    <div class="<?php if(form_error('email')) echo 'has-error' ?>">
                        <label>E-mail (optional)</label><br>
                        <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>">
                        <?php echo form_error('email'); ?>
                    </div>

                    <div class="<?php if(form_error('content')) echo 'has-error' ?>">
                        <label>Comment</label><br>
                        <textarea class="form-control" name="content"><?php echo set_value('content') ?></textarea>
                        <?php echo form_error('content'); ?>
                    </div>
                    <br>
                    <?php echo $this->recaptcha->getWidget() ?>

                    <input type="submit" class="btn btn-primary" value="Comment">
                    <?php if($this->input->method() == 'post'): ?>
                    <a href="<?php echo base_url("posts/view/{$post_id}") ?>">
                        <button type="button" class="btn btn-default">Cancel</button>
                    </a>
                <?php endif ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <?php if(!empty($comments)): ?>
            <h2>Comments<span class="text-muted"> (<?php echo count($comments) ?>)</span></h2>
            <?php foreach($comments as $comment): ?>
                <div class="panel panel-default comment">
                    <div class="panel-heading"><?php echo $comment->name ?>e</div>
                    <div class="panel-body">
                        <?php echo $comment->content ?>
                        <div class="date"><?php echo date('d M Y H:ia', strtotime($comment->date)) ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<?php echo $this->recaptcha->getScriptTag() ?>
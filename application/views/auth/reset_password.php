<?php $this->load->view('header.php') ?>

<h1>Reset Password</h1>
<div class="row">
    <div class="col-md-3">

        <?php echo $message ?>

        <form action="<?php echo base_url('auth/reset_password/' . $code) ?>" method="post" accept-charset="utf-8">
        <label for="new">New Password</label>
        <input type="password" class="form-control" name="new" value="" id="new">
        <label for="new_confirm">Confirm New Password</label>
        <input type="password" class="form-control" name="new_confirm" value="" id="new_confirm">

		<?php echo form_input($user_id) ?>
		<?php echo form_hidden($csrf) ?>
        <br>
        <input type="submit" class="btn btn-primary btn-embossed" name="submit" value="Reset">
        </form>
        <br>
        <a href="forgot_password"><?php echo lang('login_forgot_password') ?></a>
    </div>
</div>
<?php $this->load->view('footer.php') ?>
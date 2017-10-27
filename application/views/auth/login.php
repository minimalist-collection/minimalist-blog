<?php $this->load->view('header.php') ?>

<h1>Login</h1>

<div id="infoMessage"><?php echo $message ?></div>

<?php echo form_open("auth/login") ?>
<?php echo lang('login_identity_label', 'identity') ?>
<?php echo form_input($identity) ?>
<?php echo lang('login_password_label', 'password') ?>
<?php echo form_input($password) ?>
<?php echo lang('login_remember_label', 'remember') ?>
<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"') ?>
<br>
<?php echo form_submit('submit', lang('login_submit_btn')) ?>
<?php echo form_close() ?>

<a href="forgot_password"><?php echo lang('login_forgot_password') ?></a>

<?php $this->load->view('footer.php') ?>
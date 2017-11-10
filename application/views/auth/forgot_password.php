

<?php $this->load->view('header.php') ?>

<h1>Forgot Password</h1>
<div class="row">
    <div class="col-md-3">

        <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

        <?php echo $message ?>

        <form action="<?php echo base_url('auth/forgot_password') ?>" method="post" accept-charset="utf-8">
        <label for="identity">Email</label>
        <input type="text" class="form-control" name="identity" value="" id="identity">
        <br>

        <input type="submit" class="btn btn-primary btn-embossed" name="submit" value="Send">
        </form>
        <br>
        <a href="forgot_password"><?php echo lang('login_forgot_password') ?></a>
    </div>
</div>
<?php $this->load->view('footer.php') ?>
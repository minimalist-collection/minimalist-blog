
            </div>


        </div>
        <div class="row">
            
                <footer class="col-lg-9 col-lg-offset-3">
                        Copyright © <?php echo date("Y") ?> <?php echo $this->settings_model->get('title') ?>
                            &middot; <a href="<?php echo base_url("posts/archives") ?>">Archives</a> 

                        <?php if($this->ion_auth->logged_in()): ?>
                            &middot; <a href="<?php echo base_url("posts/all") ?>">Posts</a> 
                            &middot; <a href="<?php echo base_url("pages/all") ?>">Pages</a> 
                            &middot; <a href="<?php echo base_url("settings/update") ?>">Settings</a>
                            &middot; <a href="<?php echo base_url("auth/logout") ?>">Logout</a>
                        <?php endif ?>
                </footer>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('js/checkbox.js') ?>"></script>
    <script src="<?php echo base_url('js/radio.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-switch.js') ?>"></script>
    <script src="<?php echo base_url('js/toolbar.js') ?>"></script>
    <script src="<?php echo base_url('js/application.js') ?>"></script>
    <script src="<?php echo base_url('js/tinymce/tinymce.min.js') ?>"></script>
    <script>
        tinymce.init({
            selector: '.tinymce',
            height : '450',
            plugins : 'link image lists',
            toolbar: 'undo redo | styleselect | bold italic underline strikethrough | link image | bullist numlist',
            menubar: false,
            statusbar: false,
            style_formats: [
                {title: 'Header', format: 'h2'},
                {title: 'Subheading', format: 'h3'},
                {title: 'Minor Heading', format: 'h4'}
            ],
            content_css : "<?php echo base_url('css/main.css') ?>"
        });

        $(".bootstrapswitch").bootstrapSwitch();
    </script>
</body>
</html>
</html>

            </div>


        </div>
        <div class="row">
            
                <footer class="col-md-9 col-md-offset-3">
                        Copyright © <?php echo date("Y") ?> <?php echo $this->settings_model->get('title') ?>
                </footer>
        </div>

    </div>
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
    </script>
</body>
</html>
</html>
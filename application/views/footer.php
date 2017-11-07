
            </div>
        </div>

        <div class="sidebar">
            <p><?php echo $this->settings_model->get('description') ?></p>
            <?php if($pages = $this->pages_model->get_sidebar_pages()): ?>
            <ul>
                <?php foreach($pages as $page): ?>
                    <li><a href="<?php echo base_url("page/view/{$page->page_id}") ?>"><?php echo $page->title ?></a></li>
                <?php endforeach ?>
            </ul>
            <?php endif ?>
        </div>
        <div class="footer row">
            <div class="col-md-12">
                Copyright © <?php echo date("Y") ?> <?php echo $this->settings_model->get('title') ?>
            </div>
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
            content_css : "<?php echo base_url('css/style.css') ?>"
        });
    </script>
</body>
</html>
</html>
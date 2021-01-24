<div class="wrap">
    <h1>
        Test
    </h1>
    <?php
        settings_errors();
    ?>

    <form method="post">
        <?php
            settings_fields('alecaddd_options_group');
            do_settings_sections('first_plugin');
          submit_button();
        ?>
    </form>
</div>
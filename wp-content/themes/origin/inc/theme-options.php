<?php 
add_action('admin_menu', 'origin_menu_page');

function origin_menu_page() {
    add_theme_page('Origin Theme Option', 'Theme Option', 'manage_options', 'origin-theme-option', 'origin_setting_page');
}
add_action('admin_init','origin_register_setting');

function origin_register_setting() {
    register_setting('origin-group','origin-num-slides');
    register_setting('origin-group','origin-home-cat');
    register_setting('origin-group','origin-facebook');
}

function origin_setting_page() { ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>Origin Setting Page</h2>
        <form id="origin_setting" method="post" action="options.php">
        <?php settings_fields('origin-group'); ?>
            <table class="origin_page">
                <tr valign="top">
                    <th scope="row">Limit Number Slides</th>
                    <td><input type="text" value="<?php echo get_option('origin-num-slides'); ?>" name="origin-num-slides" /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Homepage Categories</th>
                    <td><input type="text" value="<?php echo get_option('origin-home-cat'); ?>" name="origin-home-cat" /></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Facebook Plugin</th>
                    <td><textarea name="origin-facebook" cols="60" rows="8"><?php echo get_option('origin-facebook'); ?></textarea></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }
?>
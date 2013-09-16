<?php
add_action('admin_menu', 'origin_menu_page');
function origin_menu_page() {
    add_theme_page('Origin Theme Option', 'Origin Option','manage_options','origin-theme-option','origin_setting_page');
}
add_action('admin_init', 'register_setting_option');

function register_setting_option() {
    register_setting('origin-group', 'origin-facebook');
    register_setting('origin-group', 'origin-analytics');
    register_setting('origin-group', 'origin-home-cat');
    register_setting('origin-group', 'origin-num-slides');
}

function origin_setting_page () { ?>
    <div class="wrap">
    <?php screen_icon(); ?>
        <h2>Orgin Theme Setting Page</h2>
        
        <form id="origin-option" action="options.php" method="post">
            <?php settings_fields('origin-group'); ?>
            <table class="form-table">
                <tr valign='top'>
                    <th scope="row">Categories</th>
                    <td><input type="text" name="origin-home-cat" value="<?php echo get_option('origin-home-cat'); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }
?>
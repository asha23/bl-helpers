<?php

add_action('admin_menu', function () {
    add_options_page('BL Helpers', 'BL Helpers', 'manage_options', 'bl-helpers', 'blh_render_settings_page');
});

add_action('admin_init', function () {
    register_setting('blh_options', BLH_Manager::$option_key);
});

function blh_render_settings_page() {
    $option_key = BLH_Manager::$option_key;
    $active_helpers = get_option($option_key, []);
    ?>
    <div class="wrap">
        <h1>BrightLocal Helpers</h1>
		<p>This is a collection of useful helpers that would ordinarily live in <code>functions.php</code>. This keeps them theme independent.</p>
        <form method="post" action="options.php">
            <?php settings_fields('blh_options'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Frontend Fix for Admin Bar</th>
                    <td>
                        <label>
                            <input type="checkbox" name="<?php echo $option_key; ?>[]" value="admin-bar-padding"
                                <?php checked(in_array('admin-bar-padding', $active_helpers)); ?>>
                            Enable
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Disable Heartbeat API</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="disable-heartbeat-api"
                        <?php checked(in_array('disable-heartbeat-api', $active_helpers)); ?>> Enable</td>
                </tr>
                <tr>
                    <th>Remove jQuery Migrate</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="remove-jquery-migrate"
                        <?php checked(in_array('remove-jquery-migrate', $active_helpers)); ?>> Enable</td>
                </tr>
                <tr>
                    <th>Remove REST API Discovery Headers</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="remove-rest-api-headers"
                        <?php checked(in_array('remove-rest-api-headers', $active_helpers)); ?>> Enable</td>
                </tr>
                <tr>
                    <th>Remove Users from REST API</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="remove-users-from-rest-api"
                        <?php checked(in_array('remove-users-from-rest-api', $active_helpers)); ?>> Enable</td>
                </tr>
                <tr>
                    <th>Remove Login Error Messages</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="remove-login-errors"
                        <?php checked(in_array('remove-login-errors', $active_helpers)); ?>> Enable</td>
                </tr>
                <tr>
                    <th>Disable Self Pingbacks</th>
                    <td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="disable-self-pingbacks"
                        <?php checked(in_array('disable-self-pingbacks', $active_helpers)); ?>> Enable</td>
                </tr>   
				<tr>
					<th>Force ACF JSON Save/Load in Theme</th>
					<td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="acf-json-in-theme"
						<?php checked(in_array('acf-json-in-theme', $active_helpers)); ?>> Enable</td>
				</tr>
				<tr>
					<th>Disable ACF Admin UI</th>
					<td><input type="checkbox" name="<?php echo $option_key; ?>[]" value="disable-acf-admin"
						<?php checked(in_array('disable-acf-admin', $active_helpers)); ?>> Enable</td>
				</tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
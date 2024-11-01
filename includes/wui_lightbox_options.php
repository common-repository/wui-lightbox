<?php 

if(is_admin()){
    add_action('admin_menu','wui_lightbox_menu');
    add_action('admin_init','wui_lightbox_register');
}
function wui_lightbox_menu(){
    add_menu_page('WUI-Lightbox', 'WUI-Lightbox Settings', 'administrator', __FILE__, 'wui_lightbox_settings_page');
}
function wui_lightbox_register(){
    register_setting('wui_lb_settings','wui_lbs_show');
    register_setting('wui_lb_settings','wui_lbs_gallery');
}

function wui_lightbox_settings_page(){ ?>
    <div class="wrap">
        <h2>WUI-Lightbox</h2>
        <form method="post" action="options.php">
        <?php
            settings_fields('wui_lb_settings');
            do_settings_fields('wui_lightbox_settings_page' , 'wui_lb_settings');
        ?>
        <table class="form-table">
            <?php //var_dump(get_option('wui_lbs_show')); ?>
            <?php //var_dump(get_option('wui_lbs_gallery')); ?>
            <tr valign="top">
            <th scope="row">Apply wui-lightbox for : </th>
                <td>
                    <input id="wasu_show_all" type="radio" name="wui_lbs_show" value="all" <?php if(get_option('wui_lbs_show')=='all') { echo 'checked'; } ?> />
                    <label for="wasu_show_all" >All images</label><br />
                    <input id="wasu_show_class" type="radio" name="wui_lbs_show" value="class"  <?php if(get_option('wui_lbs_show')=='class'){ echo 'checked'; } ?> />
                    <label for="wasu_show_class" >Images with (a) tag with class='wui_lightbox'</label><br />
                    <input id="wasu_show_disable" type="radio" name="wui_lbs_show" value="disable"  <?php if(get_option('wui_lbs_show')=='disable'){ echo 'checked'; } ?> />
                    <label for="wasu_show_disable" >Disable wui-lightbox :&#41;</label><br />
                </td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Activate WUI Gallery : </th>
                <td>
                    <input id="wasu_show_all" type="checkbox" name="wui_lbs_gallery" value="true" <?php if(get_option('wui_lbs_gallery')==true){echo 'checked'; } ?> />
                </td>
            </tr>


        </table>
            
        <?php submit_button(); ?>
        </form>
    </div>
<?php }
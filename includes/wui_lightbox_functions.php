<?php 

/* include all files needed form  ui-kit with jquery */ 
function wui_lightbox_activate(){
    ?>
    <script>
        <?php 
        if(get_option('wui_lbs_show') == 'all'){ ?>
            $('a').each(function( index ) { 
                if(/\.(?:jpg|jpeg|gif|png)$/i.test($(this).attr('href'))){
                    $(this).attr( "data-uk-lightbox" , "" );
                }
            });
        <?php }
        if(get_option('wui_lbs_show') == 'class'){ ?>
            $('a.wui_lightbox').each(function( index ) {
                if(/\.(?:jpg|jpeg|gif|png)$/i.test($(this).attr('href'))){
                    $(this).attr( "data-uk-lightbox" , "" );
                }
            });
        <?php }
        if( get_option('wui_lbs_gallery') == 'true' ){ ?>
//            $('ul').each(function( index ) {
//                var wui_lightbox_group_id = Math.floor((Math.random() * 100) + 1);
//                if($(this).children().children().attr('class') == 'wui_lightbox'){
//                    $(this).children().children().attr( "data-uk-lightbox","{group:'"+wui_lightbox_group_id+"'}" );
//                }
//            });
            $('ul').each(function( index ) {
                var wui_lightbox_group_id = Math.floor((Math.random() * 100) + 1);
                if( $(this).children().children().prop("tagName") == 'A' && /\.(?:jpg|jpeg|gif|png)$/i.test($(this).children().children().attr('href'))){
                    $(this).children().attr( "data-uk-lightbox","{group:'"+wui_lightbox_group_id+"'}" );
                }
            });
            $('div').each(function( index ) {
                var wui_lightbox_group_id = Math.floor((Math.random() * 100) + 1);
                if( $(this).children().prop("tagName") == 'A' && /\.(?:jpg|jpeg|gif|png)$/i.test($(this).children().attr('href'))){
                    $(this).children().attr( "data-uk-lightbox","{group:'"+wui_lightbox_group_id+"'}" );
                }
            });
        <?php } ?>
    </script>
<?php
}

add_action('wp_footer','wui_lightbox_activate');

/* include all files needed form  ui-kit with jquery */ 
function wui_add_lightbox(){
    wp_enqueue_script( 'jquery_wui_add_lightbox', "//code.jquery.com/jquery-1.12.0.min.js" );
    wp_enqueue_style( 'wui_lightbox_style1', plugins_url()."/wui-lightbox/css/uikit.min.css" );
    wp_enqueue_style( 'wui_lightbox_style2', plugins_url()."/wui-lightbox/css/uikit.almost-flat.min.css" );
    wp_enqueue_style( 'wui_lightbox_style3', plugins_url()."/wui-lightbox/css/components/slidenav.min.css" );
    wp_enqueue_script( 'wui_lightbox_script1', plugins_url()."/wui-lightbox/js/uikit.min.js" );
    wp_enqueue_script( 'wui_lightbox_script2' , plugins_url()."/wui-lightbox/js/components/lightbox.min.js"  );
}
add_action( 'wp_enqueue_scripts' , 'wui_add_lightbox');
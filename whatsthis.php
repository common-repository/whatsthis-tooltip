<?php
/**
 * @package Whats This
 * @version 2.3
 */
/*
Plugin Name: Whats This
Plugin URI: http://wordpress.org/extend/plugins/whatsthis-tooltip/
Add a Whats This splash box to your links and form elements
Author: Nolan Campbell
Version: 2.3
Author URI: http://nrcstudios.info
Email:Nuvuscripts@gmail.com  
*/



function whats_this_add_script() {

     echo"<link type='text/css' rel='stylesheet'  href='" . str_replace( 'index.php', '', $_SERVER['PHP_SELF'])
 ."wp-content/plugins/whatsthis-tooltip/style.whatsthis.css' />


	";

}

function whats_this_scripts_method() {

    wp_enqueue_script( 'jquery' );
   wp_enqueue_script('jquery-ui-core','jquery-ui-dialog');
//wp_register_script('jquery-ui','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.js',array('jquery'));
//wp_enqueue_script('jquery-ui');
wp_register_script('whatsthis-tooltip', plugins_url() . '/whatsthis-tooltip/jquery.whatsthis.js', array('jquery'));
wp_enqueue_script('whatsthis-tooltip');
};
add_action('wp_enqueue_scripts', 'whats_this_scripts_method');

function whats_this_admin_options(){


}



function whats_this_add_footer(){
/* echo "
 <script type='text/javascript' src='" . str_replace( 'index.php', '', $_SERVER['PHP_SELF'])
 ."wp-content/plugins/whatsthis-tooltip/jquery.whatsthis.js'></script>   "; */
 $options = get_option('wtplugin_options');

echo "
 <script type='text/javascript'>
 var jq = jQuery.noConflict();

  jq(document).ready(function(){
   jq('.whatsthis').whatsthis({
        style:'" .$options['wt_style']. "',
         symbol:'".$options['wt_symbol']."',
         size:'".$options['wt_size']."',
         duration:".$options['wt_dur'].",
         easing:'".$options['wt_ease']."',
          motion:'".$options['wt_dir']."',
          outcolor:'".$options['wt_fcol']."',
          moveTo:'".$options['wt_movet']."'

    });
     });
</script>";
}

add_action( 'wp_head', 'whats_this_add_script' );
add_action( 'wp_footer', 'whats_this_add_footer' );


//options script
add_action('admin_menu', 'wt_plugin_admin_add_page');
function wt_plugin_admin_add_page() {
add_options_page('WhatsThis Settings Page', 'WhatsThis Settings', 'manage_options', 'wtplugin', 'wt_plugin_options_page');
}
//admin options page
function wt_plugin_options_page() {
?>
<div style='background: rgb(237,232,202); /* Old browsers */

background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2VkZThjYSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUyJSIgc3RvcC1jb2xvcj0iIzY2NjE0ZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjcyJSIgc3RvcC1jb2xvcj0iIzMzMzExZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlZGU4Y2EiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(237,232,202,1) 0%, rgba(102,97,78,1) 52%, rgba(51,49,29,1) 72%, rgba(237,232,202,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(237,232,202,1)), color-stop(52%,rgba(102,97,78,1)), color-stop(72%,rgba(51,49,29,1)), color-stop(100%,rgba(237,232,202,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(237,232,202,1) 0%,rgba(102,97,78,1) 52%,rgba(51,49,29,1) 72%,rgba(237,232,202,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(237,232,202,1) 0%,rgba(102,97,78,1) 52%,rgba(51,49,29,1) 72%,rgba(237,232,202,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(237,232,202,1) 0%,rgba(102,97,78,1) 52%,rgba(51,49,29,1) 72%,rgba(237,232,202,1) 100%); /* IE10+ */
background: linear-gradient(top,  rgba(237,232,202,1) 0%,rgba(102,97,78,1) 52%,rgba(51,49,29,1) 72%,rgba(237,232,202,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=/"#ede8ca/", endColorstr=/"#ede8ca/",GradientType=0 ); /* IE6-8 */


 border-radius:20px; padding:10px; box-shadow:0px 5px 10px 1px #888; border:1px solid #999; width:900px; margin-top:20px; margin-left:50px;'>
<img src="<?php echo (str_replace( 'wp-admin/options-general.php', '', $_SERVER['PHP_SELF']))?>wp-content/plugins/whatsthis-tooltip/logo.png" style="width:500px; height:120px; border:none;" />


<form action="options.php" method="post" style='background:#ffffff; padding:20px;border-radius:0px 0px 20px 20px;margin-top:10px;'>
<?php settings_fields('whatsthis_plugin_options'); ?>

<?php do_settings_sections('wtplugin'); ?>

<input name="Submit" type="submit" style='background:#9ACB48;text-align:right; border:1px solid #111; cursor:pointer;' value="<?php esc_attr_e('Save Changes'); ?>" /><br />
<br />
<hr style='opacity:0.5;'/>
<div style='margin-top:10px'><h3>Using the plugin:</h3>
<h4>1. Adding simple text:</h4>
Add the "whatsthis" class to any element. If using on a form field wrap the element in a span and give the span the "whatsthis" class.
Add the whatsthis attribute with your custom splash text.
<br /><b>example:</b> &lt;li <b>class</b>='whatsthis' <b>whatsthis</b>='this is the whatsthis splash text.'&gt;A element with whatsthis attached.&lt;/li&gt;
<h4 >2. Loading content from a DIV using the "wtcontent" attribute.</h4>
<p>add the "wtcontent" attribute to your trigger with the DIV's ID or Class inside. </p>
<p>Example: <strong>&lt;p class="whatsthis" wtcontent="#samplediv" />&lt;/p></strong>
<p>Adding the DIV: <strong>&lt;div id="samplediv" class="wtcontent" >&lt;p>Sample content here &lt;/p> &lt;/div></strong></p>
 </p>
</div>
</form></div>  <?php }
//add intitial register settings
add_action('admin_init', 'wt_plugin_admin_init');

//register and add settings
function wt_plugin_admin_init(){
register_setting( 'whatsthis_plugin_options', 'wtplugin_options' );
add_settings_section('plugin_main', 'Main Settings', 'wt_plugin_section_text', 'wtplugin');
add_settings_field('plugin_text_string', 'Plugin Settings', 'wt_plugin_setting_string', 'wtplugin', 'plugin_main');
}

//setting discription text here
function wt_plugin_section_text() {
echo "<p>More Info: <a href='www.nrcstudios.info/wp-whatsthis'>nrcstudios.info</a>  ";
}

//set input array here
function wt_plugin_setting_string() { ?><?php
$options = get_option('wtplugin_options'); ?>

<span>Style:<select id='wt_style' name='wtplugin_options[wt_style]' style="width:90px;"><option value='copper' <?php if($options['wt_style'] == 'copper') echo 'selected="selected"'; ?>>copper</option><option value='green' <?php if($options['wt_style'] == 'green') echo 'selected="selected"'; ?>>green</option><option value='silver' <?php if($options['wt_style'] == 'silver') echo 'selected="selected"'; ?>>silver</option>
<option value='red' <?php if($options['wt_style'] == 'red') echo 'selected="selected"'; ?>>red</option>
<option value='blue' <?php if($options['wt_style'] == 'blue') echo 'selected="selected"'; ?>>blue</option>
<option value='violet' <?php if($options['wt_style'] == 'violet') echo 'selected="selected"'; ?>>violet</option>
<option value='liquidsilver' <?php if($options['wt_style'] == 'liquidsilver') echo 'selected="selected"'; ?>>liquid silver</option>
<option value='purplehaze' <?php if($options['wt_style'] == 'purplehaze') echo 'selected="selected"'; ?>>purple haze</option>
<option value='yellow' <?php if($options['wt_style'] == 'yellow') echo 'selected="selected"'; ?>>yellow</option>
<option value='sunburst' <?php if($options['wt_style'] == 'sunburst') echo 'selected="selected"'; ?>>sunburst</option>
<option value='midnight' <?php if($options['wt_style'] == 'midnight') echo 'selected="selected"'; ?>>midnight</option>
<option value='razzberry' <?php if($options['wt_style'] == 'razzberry') echo 'selected="selected"'; ?>>razzberry</option>
<option value='mocha' <?php if($options['wt_style'] == 'mocha') echo 'selected="selected"'; ?>>mocha</option>
<option value='grey' <?php if($options['wt_style'] == 'grey') echo 'selected="selected"'; ?>>grey</option>
<option value='pink' <?php if($options['wt_style'] == 'pink') echo 'selected="selected"'; ?>>pink</option></select></span><br/><br/>
<span>Symbol:<input id='wt_symbol' name='wtplugin_options[wt_symbol]' size='1' maxlength="1" type='text' value='<?php echo $options['wt_symbol']?>' /> -                                          One character symbol. example: ?,!,*,$</span><br/><br/>
<span>Size:<select id='wt_size' name='wtplugin_options[wt_size]' style="width:75px;"><option value='small' <?php if($options['wt_size'] == 'small') echo 'selected="selected"'; ?>>small</option><option value='normal' <?php if($options['wt_size'] == 'normal') echo 'selected="selected"'; ?>>normal</option><option value='large' <?php if($options['wt_size'] == 'large') echo 'selected="selected"'; ?>>large</option></select></span><br/> <br/>
<span>Duration:<input id='wt_dur' name='wtplugin_options[wt_dur]' size='10' type='text' value='<?php echo $options['wt_dur']?>' /> -             Duration in Milliseconds. example 1000 is equal to 1 second.</span><br/> <br/>

<span>Easing:<input id='wt_ease' name='wtplugin_options[wt_ease]' size='20' type='text' value='<?php echo $options['wt_ease']?>' /> -             Use jQuery or jQuery UI easing. example: swing, linear, easeOutBounce, easeInCirc</span><br/> <br/>
<span>Direction:<select id='wt_dir' name='wtplugin_options[wt_dir]' style="width:70px;"><option value='left' <?php if($options['wt_dir'] == 'left') echo 'selected="selected"'; ?>>left</option><option value='up' <?php if($options['wt_dir'] == 'up') echo 'selected="selected"'; ?>>up</option><option value='down' <?php if($options['wt_dir'] == 'down') echo 'selected="selected"'; ?>>down</option><option value='top' <?php if($options['wt_dir'] == 'top') echo 'selected="selected"'; ?>>top</option><option value='static' <?php if($options['wt_dir'] == 'static') echo 'selected="selected"'; ?>>static</option></select></span><br/><br/>
<span>Fade Color:<input id='wt_fcol' name='wtplugin_options[wt_fcol]' size='15' type='text' value='<?php echo $options['wt_fcol']?>' /> -                Use hex or rgb colors example: #FFFFFF or rgb(255,255,255)</span><br/> <br/>

<?php }





add_action('wp_loaded', 'wt_default_options_setup' );

function wt_default_options() {
$options = array(
'wt_style' => 'copper',
'wt_symbol' => '?',
'wt_size' => 'small',
'wt_dur' => 500,
'wt_ease' => 'swing',
'wt_dir' => 'top',
'wt_fcol' => '#111111'
);
return $options;
}
function wt_default_options_setup() {

global $wt_options;
$wt_options = get_option( 'wt_options' );

if ( ! $wt_options ) {
$wt_options = wt_default_options();
}
update_option( 'wt_options', $wt_options );
}

?>

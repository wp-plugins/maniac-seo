<?php
/**
 * @package Maniac SEO
 * @version 1.0
 */
/*
Plugin Name: Maniac SEO
Plugin URI: http://www.web-master.guru/wordpress/maniac-seo.html
Description: Maniac SEO is professional SEO analyzer tool for: website, blog, page. Check site with test online, free SEO Analyzer tool to give webmasters an in-depth analysis of their web pages on-site and off-site SEO ranking on a page by page basis. You can get on the first page, With helpful tips and notes to improve your SEO Writing.
Version: 1.0
Author: Webmaster Alessandro Peruch
Author URI: http://www.www.web-master.guru
Text Domain: wd-ms-og
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$maniac_seo_plugin_version='1.0';
$maniac_seo_plugin_name='Maniac SEO';
$maniac_seo_plugin_settings=array(
		
		'ms_url_show',
		'ms_url_show_twitter',
		'ms_url_canonical',
		
		
		'ms_image_use_specific',
		
);


if ($maniac_seo_settings=maniac_seo_load_settings()) {  //To avoid activation errors
	if (intval($maniac_seo_settings['ms_url_show'])==1) {
		if (intval($maniac_seo_settings['ms_url_canonical'])==1) {
			remove_action('wp_head', 'rel_canonical');
		}
	}
}








function maniac_seo_add_excerpts_to_pages() {
     add_post_type_support('page', 'excerpt');
}
add_action('init', 'maniac_seo_add_excerpts_to_pages');


//Admin
if (is_admin()) {
	
	add_action('admin_menu', 'maniac_seo_add_options');
	
	register_activation_hook(__FILE__, 'maniac_seo_activate');
	
	function maniac_seo_add_options() {
		global $maniac_seo_plugin_name;
		if(function_exists('add_options_page')){
		
		}
	}
	
	function maniac_seo_activate() {
		//Clear Maniac SEO notices
		global $wpdb;
		$wpdb->query(
			$wpdb->prepare("DELETE FROM ".$wpdb->usermeta." WHERE meta_key LIKE %s", 'wd_ms_og_wpseo_notice_ignore')
		);
	}
	
	function maniac_seo_settings_link( $links, $file ) {
		if( $file == 'maniac-seo/maniac-seo.php' && function_exists( "admin_url" ) ) {
			$settings_link = '<a href="' . admin_url( 'options-general.php?page=maniac-seo.php' ) . '">' . __('Settings') . '</a>';
			array_push( $links, $settings_link ); // after other links
		}
		return $links;
	}
	add_filter('plugin_row_meta', 'maniac_seo_settings_link', 9, 2 );
	
	
// Write our JS below here

function my_action_javascript() { 
	echo '<script type="text/javascript" >';
	$varip=$_SERVER['SERVER_NAME'];
              $varip=  base64_encode($varip);
              $varip= base64_encode($varip);	
echo '
//var jfds="'.plugins_url().'";				   
 //alert(jfds+"/maniac-seo/includes/jquery.min.js");				   
                  
jQuery(document).ready(function($) {
   
        $("div#modulo").hide();
   
    
    $("a#feedback").click(function(){
    
        //$("div#modulo").show(10);
   
        $("div#modulo").fadeIn(3000);
    });

             $("#keyword").keyup(function(){
    $("#keyword").css("background-color", "pink");
                                }); 
	                var version="1.0";
             $( "a#linkdd" ).click(function( e ) {
 
 $("div#log").html("jsiklkdslk");
  e.preventDefault();
});

       var version="1.0";
$("button#seoanalyzer").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
        if((DataDal.length != 0) && (number.length != 0)){
		var ip="'.$varip.'";
		 
		
 
               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
               
          $.ajax({url: "http://www.web-master.guru/admin/cms_trova.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress", success: function(result){

         	 $("#cerca123").html(result);
		  } });
                  
                } else { alert("Please enter keyword and address."); }
                  e.preventDefault();
                  });
                 
$("button#keywordok").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
      if((DataDal.length != 0) && (number.length != 0)){
		var ip="'.$varip.'";
		 
		
		 
               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
                
          $.ajax({url: "http://www.web-master.guru/admin/cms_keyworddensity.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress", success: function(result){
                
         	 $("#cerca123").html(result);
		  } });
                 } else { alert("Please enter keyword and  address."); }
                  e.preventDefault();
                  });

$("button#keysuggest").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
        if((DataDal.length != 0)  && (number.length != 0)){
		var ip="'.$varip.'";
		 

               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
               
          $.ajax({url: "http://www.web-master.guru/admin/cms_keysuggest.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress", success: function(result){
                
         	 $("#cerca123").html(result);
		  } });
                   
                     } else { alert("Please enter keyword and  address."); }
                  e.preventDefault();
                  });
$("button#socialurla").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
       if(number.length != 0){
		var ip="'.$varip.'";
		 
		
		
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
               
          $.ajax({url: "http://www.web-master.guru/admin/cms_socialurla.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress", success: function(result){
               
         	 $("#cerca123").html(result);
		  } });
                   } else { alert("Please enter address."); }
                  e.preventDefault();
                  });
$("button#keyposition").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
          if((DataDal.length != 0)  && (number.length != 0)){
		var ip="'.$varip.'";
		 
		var locale =$("#locale").val();
                var language =$("#language").val();
                
	 
               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
               
          $.ajax({url: "http://www.web-master.guru/admin/cms_keyposition.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress&locale="+locale+"&language"+language, success: function(result){
                
         	 $("#cerca123").html(result);
		  } });
                  
                 } else { alert("Please enter keyword and address."); }

                  e.preventDefault();
                  });
$("button#pagerank").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
              if((DataDal.length != 0)  && (number.length != 0)){
		var ip="'.$varip.'";
		 
		var locale =$("#locale").val();
                var language =$("#language").val();
                
		
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
              
          $.ajax({url: "http://www.web-master.guru/admin/cms_pagerank.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress&locale="+locale+"&language"+language, success: function(result){
                
         	 $("#cerca123").html(result);
		  } });
                 
                 } else { alert("Please enter keyword and  address."); }

                  e.preventDefault();
                  });
 $("button#backlink").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
            
		var ip="'.$varip.'";
		 
		var locale =$("#locale").val();
                var language =$("#language").val();
                
		
               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
               
          $.ajax({url: "http://www.web-master.guru/admin/cms_backlinks.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress&locale="+locale+"&language"+language, success: function(result){
               
         	 $("#cerca123").html(result);
		  } });
                  // }  
               

                  e.preventDefault();
                  });
                  
$("button#plagiarism").click(function(e){
		
		var DataDal=$("#keyword").val();
		var number="'.$_GET['post'].'";
		
              if(DataDal.address != 0){
		var ip="'.$varip.'";
		 
		var locale =$("#locale").val();
                var language =$("#language").val();
           
		
               
                $("#cerca123").html("<h1>Just moment, please. <img src=\"'.plugins_url().'/maniac-seo/77.GIF\"></h1>");
                
          $.ajax({url: "http://www.web-master.guru/admin/cms_plagiarism.php?keyword="+DataDal+"&num="+number+"&domain="+ip+"&versione="+version+"&wordpress=wordpress&locale="+locale+"&language"+language, success: function(result){
                
         	 $("#cerca123").html(result);
		  } });
                   } else { alert("Please enter address."); }
               

                  e.preventDefault();
                  });
                 
});
 
                 </script>  ';
	
	
}

 function maniac_seo_styles() {
		wp_enqueue_style('thickbox');
	}
	add_action( 'admin_footer', 'my_action_javascript' );
	//add_action('admin_print_scripts', 'maniac_seo_scripts');
	add_action('admin_print_styles', 'maniac_seo_styles');

	function maniac_seo_add_posts_options() {
		global $maniac_seo_settings, $maniac_seo_plugin_name;
		if (intval($maniac_seo_settings['ms_image_use_specific'])==1) {
			global $post;
			add_meta_box(
				'maniac_seo',
				$maniac_seo_plugin_name,
				'maniac_seo_add_posts_options_box',
					$post->post_type
			);
		}
	}
	function maniac_seo_add_posts_options_box() {
		global $post;
		// Add an nonce field so we can check for it later.
  		wp_nonce_field( 'maniac_seo_custom_box', 'maniac_seo_custom_box_nonce' );
  		
  		
  		
             
              
               echo "<br><h4 style=\"font-weight:bold ; border:1px solid darkgrey; text-align: center ; text-transform: uppercase ; background:Yellow ; color:Black; padding:10px; \"> Maniac SEO - See website: <a href=\"http://www.web-master.guru/seo/seo.html\" target=\"_blank\">Webmaster by Alessandro Peruch</a> - <a href=\"https://www.youtube.com/watch?v=xNDzqScertI\" target=\"_blank\">VIDEO: help</a> - <a href=\"#modulo\" id=\"feedback\">Can I help you?</a> - <a href=\"http://www.web-master.guru/seo-tool-online-check.html\" target=\"_blank\">Info Upgrade</a></h4>";
               echo '<div id="modulo" name="modulo" style="background:lightgreen; text-align: center ; padding:3px;"><b>Faq, suggestions, problems, improvements, please contact me, thank you <a href="mailto:super@web-master.guru">super@web-master.guru</a></b></div>
                   <div style="text-align:center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=super@web-master.guru&currency_code=EUR&item_name=%20Maniac%20SEO%20Worpress&amount=100"  target="_blank" ><img src="'.plugins_url().'/maniac-seo/paypal.png"><span style="font-size:22pt; font-weight:bold;"> BUY UPGRADE</span></a></div>
               <br><div style="text-align:center"><b>KEYWORD: </b><input type="text" id="keyword" ><span di="justm"> </span> <br>
               <br><button id="seoanalyzer" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">SEO Analyzer</button> 
                   <!--<div id="keywordok" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">keyword density</div>-->
                   <button id="keywordok" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">keyword density</button>
                   <button id="keysuggest" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">keyword suggest</button>
                   <button id="socialurla" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">Social URL Analytics</button>
                    <button id="pagerank" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">Page Rank</button>
                   <button id="backlink" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">Backlink</button>
                   <button id="plagiarism" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">Plagiarism</button>

                <br><hr>
                  <span style="font-weight:bold; font-size:large; "> International keyword rankings e Local e return the top 260 SERP (include the real results of the SERP of Google, because Google users omitted from SERP links of the same domains (double) per page)</span>
';
            
    include("nations.php");
                echo '  <br><br> <button id="keyposition" style="background:black; border-radius:10px;  height: 35px; display:inline; color:white; font-weight:bold; padding:5px; cursor:pointer">Keyword Position</button>
                  <hr>
                </div>
                <div id="cerca123" name="ancorresult"></div>
                    
                  ';
  		echo '<script type="text/javascript">
				jQuery(document).ready(function(){
					jQuery(\'#maniac_seo_specific_image_button\').live(\'click\', function() {
						tb_show(\'Upload image\', \'media-upload.php?post_id='.$post->ID.'&type=image&context=maniac_seo_specific_image_button&TB_iframe=true\');
					});
					jQuery(\'#maniac_seo_specific_image_button_clear\').live(\'click\', function() {
						jQuery(\'#maniac_seo_specific_image\').val(\'\');
					});
				});
			</script>';
	}
	add_action('add_meta_boxes', 'maniac_seo_add_posts_options');
	
}


	
function maniac_seo_default_values() {
	return array(
		
		'ms_url_show' => 1,
		
		'ms_image_use_specific' => 1,
		
	);
}
function maniac_seo_load_settings() {
	global $maniac_seo_plugin_settings;
	if (is_array($maniac_seo_plugin_settings)) {  //To errors
		$defaults=maniac_seo_default_values();
		//Load 
		if ($usersettings=get_option('maniac_seo_settings')) {
			//Merge 
			foreach($maniac_seo_plugin_settings as $key) {
				if (isset($usersettings[$key])) {
					if (strlen(trim($usersettings[$key]))==0) {
						if (!empty($defaults[$key])) {
							$usersettings[$key]=$defaults[$key];
						}
					}
				} else {
					if (!empty($defaults[$key])) {
						$usersettings[$key]=$defaults[$key];
					} else {
						$usersettings[$key]=''; 
					}
				}
			}
			
		} else {
			foreach($maniac_seo_plugin_settings as $key) {
				if (!empty($defaults[$key])) {
					$usersettings[$key]=$defaults[$key];
				} else {
					$usersettings[$key]=''; //Avoid notices
				}
			}
		}
		return $usersettings;
	} else {
		return false; //To avoid activation errors
	}
}

function maniac_seo_upgrade() {
	global $maniac_seo_plugin_version;
	$upgrade=false;
	//Upgrade  Last version with individual settings
	if (!$v=get_option('maniac_seo_version')) {
		//Convert settings
		$upgrade=true;
		global $maniac_seo_plugin_settings;
		foreach($maniac_seo_plugin_settings as $key) {
			$maniac_seo_settings[$key]=get_option('maniac_seo_'.$key);
		}
		// New ms_image_use_specific
		$maniac_seo_settings['ms_image_use_specific']=1;
		update_option('maniac_seo_settings', $maniac_seo_settings);
		foreach($maniac_seo_plugin_settings as $key) {
			delete_option('maniac_seo_'.$key);
		}
	} else {
		if ($v<$maniac_seo_plugin_version) {
			//Any version upgrade
			$upgrade=true;
		}
	}
	//Set version on database
	if ($upgrade) {
		update_option('maniac_seo_version', $maniac_seo_plugin_version);
	}
}


//Uninstall stuff
register_uninstall_hook(__FILE__, 'maniac_seo_uninstall'); 
function maniac_seo_uninstall() {
	
}


function maniac_seo_post($var, $default='') {
	return isset($_POST[$var]) ? $_POST[$var] : $default;
}

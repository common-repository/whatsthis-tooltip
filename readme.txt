=== Plugin Name ===
Contributors: Nolan Campbell
Donate link: http://www.nrcstudios.info/
Tags: tooltip, information, splashbox
Requires at least: 3
Tested up to: 3.3.1
Stable tag: "trunk"

WhatsThis Tooltip Plugin.

== Description ==

**WhatsThis Tooltip plugin. Kiss your old tooltip goodbye!**

View all our premium WordPress Plugins and Themes: **http://nuvuthemes.com**

Requires WordPress 3.0+ and PHP 5.

* Easily attach a tooltip with symbol
* Use to display simple text messages explaining your elements or load complex content
* Choose from many prestyled symbols and set background animation color
* Set tooltip loading direction - "top", "left", "bottom", "static"
* Choose from 3 symbol sizes(small, normal, large).
* Set any special character or letter for the symbol to be used (!,@,#,$,%,^,&,*,A,B,C, etc)
* Choose from many pre-styled symbol looks

View Demo: **http://www.nrcstudios.info/wp-whatsthis/** 

Download with installation support: **http://nrcstudios.info/index.php/whatsthis-plugin**

4-5-2012 Major Update: 2.0 The tooltip plugin now hides the tooltip box when mouseout of the tooltip box instead of the tooltip trigger. This allows you to add links and elements that the user can interact with while keeping the tooltip box open.
The tooltip box adjusts the fit inside the screen if your triggers are close to the edge.

2/7/2012 - Critical update:  Fixed script linking issues.

*Update 3-5-2012:* jQuery script loading changed to fix conflict issues.
*Update 4-4-2012:* Tooltip box now loads to the left of trigger elements that are greater then 50% document screen width.
*Update 4-17-2012:* Feature added - self trigger for triggering the tooltip on image and contianer elements instead of adding the trigger.






== Installation ==

**Installing and working with the plugin.**
e.g.

1. Upload `whatsthis-tooltip folder and all of it's contents` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the following class and attributes to your page elements:
4. Add "whatsthis" class to your element.
5. To add simple text splashbox to your element use the "whatsthis" attribute.
6. Example:[p class="whatsthis" whatsthis="Put your simple text here - this will be displayed within the tooltip"]This is the element that will have the whatsthis tooltip attached[/p]

(Replace the []'s with normal html greater/less than signs)



**To load content from another DIV**

1.Create a DIV and give it a custom class or id on the page. 

2. Add the 'wtcontent' attribute with the custom selector you chose for the DIV, remember to place  a "."before the name for a classname and a "#" for an id. Just like the simple text option your page element must have the 'whatsthis' class when using the 'wtcontent' attribute. To hide the DIV that the content is in give it a class of 'wtcontent'. 

3. Example one - added a DIV with an "id" of 'samplediv': 

[p class="whatsthis" wtcontent='#samplediv']This is the element that will have the tooltip attached[/p]

[div id='samplediv' class='wtcontent'][h1]Internal content goes here, This container will be hidden when you give it a class of 'wtcontent'.[/h3]<[/div]

(Replace the []'s with normal html greater/less than signs)

**Changing the Plugin Setting:**

1.Under the admin panel settings click on the 'whatsthis settings' link.

2.Edit each Plugin Settings options and clikc the 'Save Changes' button when finished. 

**Using Self Trigger **/
Wrap the element you wish to trigger in a container or a tag and give it the "whatsthis" class and "whatsthis or wtcontent" attributes. Then give the element you wish to have trigger the tooltip a class of "selftrigger".
**example: <a class="whatsthis" whatsthis="Some text on self trigger"  href="#"><img  class="selftrigger"  src="image.jpg" /></a>**

For more complete installation instructions visit: **http://www.nrcstudios.info/wp-whatsthis/**

== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.


== Screenshots ==

1. /trunk/screenshots/screenshot-1.png
2. /trunk/screenshots/screenshot-2.png
3. /trunk/screenshots/screenshot-3.png
4. /trunk/screenshots/screenshot-4.png
5. /trunk/screenshots/screenshot-5.png
6. /trunk/screenshots/screenshot-6.png

== Changelog ==
= 2.1 = Minor Update: 2.1 Feature added - self trigger for triggering the tooltip on image and contianer elements instead of adding the trigger.
= 1.0 = Major Update: 2.0 The tooltip plugin now hides the tooltip box when mouseout of the tooltip box instead of the tooltip trigger. This allows you to add links and elements that the user can interact with while keeping the tooltip box open.
The tooltip box adjusts the fit inside the screen if your triggers are close to the edge.


= 0.5 = 2/7/2012 Critical Update - Script linking/coding issues.

== Upgrade Notice ==

= 1.0 =


= 0.5 = Update 3-5-2012: jQuery script loading changed to fix conflict issues.


== Arbitrary section ==
== Loading jQuery before plugins ==

The correct way to load jQuery into your theme is to load it prior to all plugins being loaded. Having said this know that the plugin loads jQuery seperately in case your theme is not set to load jQuery. To load jQuery from the theme instead of the plugin do the following changes to your theme and plugin files.

Step One: Open your themes functions.php file and add the following code anywhere on the page:
**if( !is_admin()){
wp_deregister_script('jquery');
wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"), false, '1.7.1');
wp_enqueue_script('jquery');
}**

Step Two: Open the whatsthis.php file and comment out or delete the echo script line on line 21 by adding two backslashes before it ("//"))

  // echo "&lt;script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'>&lt;/script> " ;

*Step Three: Upload the saved files to your server.

This will load jQuery into your theme before any plugins get loaded on the page thus eliminating the need for each plugin to load jQuery.
When each plugin loads different versions of jQuery on the page this creates compatability issues and will cause your plugins to not work correctly. I seriously suggest the users of FlickrShow to use this method of including jQuery on the page.

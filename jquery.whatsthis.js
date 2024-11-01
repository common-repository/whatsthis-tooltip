/**
 * @package Whats This
 * @version 1.1
 */
/*
Plugin Name: Whats This
Plugin URI: http://wordpress.org/extend/plugins/whatsthis-tooltip/
Add a Whats This splash box to your links and form elements
Author: Nolan Campbell
Version: 1.1
Author URI: http://nrcstudios.info
Email:Nuvuscripts@gmail.com
*/

(function($){


     $.fn.whatsthis = function( options ) {



		// default options
		options = $.extend({

             style : 'blue',
             symbol: "?",
             size: "small",
             motion: "top",
             duration:700,
             easing:"swing",
             outcolor: "#eeeeee",
             bgColor: "#cccccc",
             fontColor: "#000000"
		}, options);




        //vars
             var $whatsthis = $("#whatsthis");
             var $body = $('body');

             var defcolor = $("#whatsthis").css("background-color");
        //init style
             var docw = $(document).width();
             var wtwidth = $('#whatsthis').width()*1.5;
             var thisw = $('#whatsthis').width();
             var thish = $('#whatsthis').height();
         $(".wtcontent").hide();

        $whatsthis.css({'opacity' : '0', 'z-index' :'9999', 'position' : 'absolute', 'left' : (docw-wtwidth), 'top' : "-"+thish+"px"});

      //begin return each
     return this.each(function() {
            var $this = $(this);
        //if whatsthis div does not exist add it

        //extend settings as options
            var o = $.metadata ? $.extend({}, options, $this.metadata()) : options;
            var thist = $this.position().top;
        //if $this has the whatsthis attr add the trigger symbol(icon)
if ($this.attr("whatsthis") || $this.attr("wtcontent")){
           //if whatsthis div exists else create it
  if($('#whatsthis').length){}else  {$body.append('<div id="whatsthis"></div>');};
   var bgColor = $('#whatsthis').css('background-color');  
           //append trigger element to the each returned
          if($this.children().hasClass('selftrigger')){

           $this.find('.selftrigger').wrap("<span class='wttrigger' />"); }else{
  $this.append("<span class='wttrigger "+ o.style +" "+ o.size +"' >"+o.symbol+"</span>"); //add whatsthis trigger span
                                      };
          //vars
             var thisw = $(document).width();
             var fonts =  $('#whatsthis').css('font-size');
  var docw = $(document).width();
  var halfdoc =  docw/2;
  /*bind mouseenter  functions
  *
  *
  */
  $this.find(".wttrigger").live('mouseenter' , function(event){
            var $whatsthis = $("#whatsthis");
            var wttop = $whatsthis.css('top');
            var thisy = $(this).position().left;
            var thisx = $(this).position().top;
           //set styles on mouseenter
    $whatsthis.css({ 'background-color' : bgColor});
    var wthis = $(this);
          //add wtmessage
         //if has wtcontent attribute
    if($this.attr("wtcontent")){

              var wtcontent = $this.attr('wtcontent') ;

              var whatsthiscontent = $(wtcontent).html();
     //add whatsthiscontent(external div html) into the wtmessage span
     $whatsthis.html("<span class='wtmessage'>" + whatsthiscontent + "</span>");





    } else if($this.attr("whatsthis")){
      //if not wtcontent then load simple text message from "whatsthis" attribute into wtmessage span
           var whatsthistext = $this.attr("whatsthis");
       $whatsthis.html("<span class='wtmessage'>" + whatsthistext + "</span>");
    };
        //set half of whatsthis div height
        var halfh = ($('#whatsthis').height())/2;
        var whatswidth = ($('#whatsthis').width());
    //if else for o.motion direction animations and css
    if(o.motion == "up" || o.motion == "down" || o.motion == "left"){

    if(wthis.offset().left >= halfdoc){

      $whatsthis.stop(true,true).animate({ 'opacity' : '1', 'background-color' : bgColor, 'color' : o.fontColor,   'left' : (event.pageX - (whatswidth-20))+'px', 'top' : (event.pageY - halfh)+'px' },{duration:o.duration, easing: o.easing});
    }else{
          $whatsthis.stop(true,true).animate({ 'opacity' : '1', 'background-color' : bgColor, 'color' : o.fontColor,   'left' : (event.pageX - 20)+'px', 'top' : (event.pageY - halfh)+'px' },{duration:o.duration, easing: o.easing});
          };
         }
         else if(o.motion == "static"){
            if(wthis.offset().left >= halfdoc){

      $whatsthis.css({'left' : (event.pageX - (whatswidth-20))+'px', 'top' : (event.pageY - halfh)+'px'});
             $whatsthis.stop(true,true).animate({ 'opacity' : '1', 'background-color' : bgColor, 'color' : o.fontColor },{duration:o.duration, easing: o.easing});
    }else{
           $whatsthis.css({   'left' : (event.pageX - 20)+'px', 'top' : (event.pageY - halfh)+'px'});
             $whatsthis.stop(true,true).animate({ 'opacity' : '1', 'background-color' : bgColor, 'color' : o.fontColor },{duration:o.duration, easing: o.easing});
             }
         }
         else if(o.motion == "top") {
          $whatsthis.css({'left' : (($(window).width()/2)- halfh)+'px'});
          $whatsthis.stop(true,true).animate({ 'opacity' : '1', 'background-color' : bgColor, 'color' : o.fontColor,  'top' : ($(document).scrollTop()+50)+'px' },{duration:o.duration, easing: o.easing});   };


       });/* End mouseenter function */

  /*bind  mouseout functions
  *
  *
  */
      $("#whatsthis").live('mouseleave' , function(){
           var wtwidth = $('#whatsthis').width()*1.5;
           var $whatsthis = $(this);
            var thisw = $('#whatsthis').width();

           var thish = $('#whatsthis').height();
           //set mouseout styles and animation
           $whatsthis.css({ 'background-color' : o.outcolor});
           // $whatsthis.animate({ 'color' : '#ffffff'},{duration:1});


       switch(o.motion)
        {
        case("top"):
         $whatsthis.stop(true).animate({ 'opacity' : '0','top' : "-" +thish +'px','color' : '#ffffff'},{duration: o.duration, easing: o.easing});
        break;
        case("up"):

        $whatsthis.stop(true).animate({ 'opacity' : '0','top' : "-" +thish +'px','left' : (thisw-wtwidth) +'px', 'color' : '#ffffff'},{duration: o.duration, easing: o.easing});
        break;
         case("down"):

        $whatsthis.stop(true).animate({ 'opacity' : '0','top' : ($(window).height()+thish) +'px','left' : (thisw-wtwidth) +'px', 'color' : '#ffffff'},{duration: o.duration, easing: o.easing});
        break;
         case("left"):

        $whatsthis.stop(true).animate({ 'opacity' : '0','left' : (thisw-wtwidth) +'px', 'color' : '#ffffff'},{duration: o.duration, easing: o.easing});
        break;
        case("static"):

        $whatsthis.stop(true).animate({ 'opacity' : '0', 'color' : '#ffffff'},{duration: o.duration, easing: o.easing,complete:function(){ $whatsthis.stop().css({'left':'-1000px'});}});
        break;

        };



      });
      /* end mouseout function */

       };

      });






     };//end each















     $(window).resize(function(e){
        docw  = $(document).width();
        doch = $(document).height();
      });







  })(jQuery)


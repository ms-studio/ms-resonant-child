jQuery(document).ready(function($){

/* 
 * 0: js-hidden must be hidden
 ****************************************************
 */ 
 $(".js-hidden").hide();
 $(".js-visible").show();


/*
 * Classic outgoing links script
*/

$("a[href^=http]").each(
   function(){ 
      if(this.href.indexOf(location.hostname) == -1) {
  			$(this).attr('target', '_blank');
			}
  	}
 );

/* 
 * 1.
 * EmailSpamProtection (jQuery Plugin)
 ****************************************************
 * Author: Mike Unckel
 * Description and Demo: http://unckel.de/labs/jquery-plugin-email-spam-protection
 * Example: <span class="email">info [at] domain.com</span>
 */
$.fn.emailSpamProtection = function(className) {
	return $(this).find("." + className).each(function() {
		var $this = $(this);
		var s = $this.text().replace(" [at] ", "&#64;");
		$this.html("<a href=\"mailto:" + s + "\">" + s + "</a>");
	});
};
$("body").emailSpamProtection("email");


/*
* Fix single images...
* Let's do something for images that have the following structure:

.entry-content a img 

* Give them a CSS class .fix-single-img
*/

	$(".entry-content p > a > img").each(function() {
    var $this = $(this);
    $(this).addClass('fix-single-img');
    $(this).parent().addClass('single-img-parent thickbox');
    
    if ( $(this).hasClass( "alignleft" ) ) {
     
        $(this).parent().addClass('alignleft-parent');
 
    }
        
  });


});
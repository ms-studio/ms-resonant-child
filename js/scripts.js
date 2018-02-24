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
* Fix single images
* Let's do something for images that have the following structure:

.entry-content p > a > img 
.entry-content figure > a > img

* Give them a CSS class .fix-single-img
*/

	$(".entry-content p > a > img, .entry-content figure > a > img").each(function() {
    var $this = $(this);
    $(this).addClass('fix-single-img');
    $(this).parent().addClass('single-img-parent thickbox');
    
    if ( $(this).hasClass( "alignleft" ) ) {
        $(this).parent().addClass('alignleft-parent');
    }
  });

	/*
	 * Improve Slideshare embedding
	 * Make that iframe exactly the right size!
	*/
	
	$(".entry-content iframe[src*='www.slideshare']").each(function() {
	  var $this = $(this);
	  
	  var slideW = $this.attr('width');
	  var slideH = $this.attr('height');
	  var slideRatio = (slideH / slideW);
	  
	  var itemW = $this.width();
	  var idealH = itemW*slideRatio;
	  
	  // calculate max height: window - nav bar...
	  var maxH = ( $(window).height() - 162);
	  if ( idealH > maxH ){
	  	$this.css( "height", maxH );
	  	// console.log("applied maxHeight: "+maxH);
	  } else {
	  	$this.css( "height", idealH );
	  	// console.log("applied idealHeight: "+idealH);
	  }

	});
	


});
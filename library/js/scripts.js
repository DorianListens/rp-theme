/*
Joints Scripts File

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */

    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* if is below 481px */
    if (responsive_viewport < 481) {

    } /* end smallest screen */

    /* if is larger than 481px */
    if (responsive_viewport > 481) {

    } /* end larger than 481px */

    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {

        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });

    }

    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {

    }


	// add all your scripts here
/*
*
* Switches vimeo source of main front page video player using data-attributes
*
*
*/

  $('.rp-vid-link').on("click", function(event){
      event.preventDefault();
      if ($(".bpanel")) {
        var newString = "<h2>"+$(this).data('title')+"</h2><p class='lead'>"+$(this).data('excerpt')+"</p>";
        $(".bpanel").html(newString);
        $(".bpanel").append("<a class='button radius' href='"+$(this).data("link")+"'>See More!</a>");
      }

      $("#bigvid").fadeOut().find("iframe")
                                  .attr('src', $(this).data("src"))
                                  .add('#main-vid-link')
                                  .attr('href', $(this).data('link'))
                                  .add("#bigvid")
                                  .fadeIn(800);
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;

  });

  Foundation.utils.image_loaded($("li.active img"), function() {
    $(document).find('.orbit-container ul li:eq(0)').addClass('active');
    $(document).foundation('orbit', 'reflow');
    // window.trigger("resize");
  });

  var iframe = $('#vimeoplayer')[0],
    player = $f(iframe);

    // When the player is ready, add listeners for pause, finish, and playProgress
    player.addEvent('ready', function() {
        player.addEvent('play', onPlay);

        player.addEvent('pause', onPause);
        player.addEvent('finish', onFinish);
        player.addEvent('playProgress', onPlayProgress);
    });

    // Call the API when a button is pressed
    $('button').bind('click', function() {
        player.api($(this).text().toLowerCase());
    });

    function onPlay(id) {
      console.log("play");

      $("#bigvidcontainer").dimBackground();
    }

    function onPause(id) {
        // console.log("paused");
        $("#bigvidcontainer").undim();
    }

    function onFinish(id) {
        // console.log('finished');
        $.undim();
    }

    function onPlayProgress(data, id) {
        // status.text(data.seconds + 's played');
    }
  // Foundation.utils.image_loaded($(".browse-slider li img"), function() {
  //   console.log("Loaded");
  //   $(document).foundation('orbit', 'reflow');
  //   window.trigger("resize");
  // })
// jQuery(function($) {


// });


}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );

/*
 * Load up Foundation
 */
(function(jQuery) {
  jQuery(document).foundation();
})(jQuery);

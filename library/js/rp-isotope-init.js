/*
*
* Isotope Init
*
*
*
*/

jQuery(function($){
    $(window).load(function() {
        var $container = $('#browse-grid');
        // init
        $container.isotope({
        // options
        itemSelector: '.film-item',
        layoutMode: 'fitRows'
        });

    $('#filter a').click(function(){
      console.log("Clicked");
          var selector = $(this).attr('data-filter');
            $('#browse-grid').isotope({ filter: selector });
            $(this).parents('dl').find('dd').removeClass('active');
            $(this).parent().addClass('active');
          return false;
        });
    });
});

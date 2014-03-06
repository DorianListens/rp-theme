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

    $('.filter a').click(function(){
          var selector = $(this).attr('data-filter');
            $('#browse-grid').isotope({ filter: selector });
            $(this).parents('ul').find('a').removeClass('active');
            $(this).addClass('active');
          return false;
        });
    });
});
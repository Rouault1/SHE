function slideSwitch() {
    var $active = $('#slideshow IMG.active');
  
    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');
  
    // use this to pull the images in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');
  
    // uncomment the 3 lines below to pull the images in random order
  
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );
  
    $active.addClass('last-active');
  
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
  
$(function() {
    setInterval( "slideSwitch()", 5000 );
});

$(function() {
                /* 
                 * just for this demo:
                 */
                $('#showcode').toggle(
                    function() {
                        $(this).addClass('up').removeClass('down').next().slideDown();
                    },
                    function() {
                        $(this).addClass('down').removeClass('up').next().slideUp();
                    }
                );
                $('#panel').toggle(
                    function() {
                        $(this).addClass('show').removeClass('hide');
                        $('#overlay').stop().animate( { left : - $('#overlay').width() + 20 + 'px' }, 300 );
                    },
                    function() {
                        $(this).addClass('hide').removeClass('show');
                        $('#overlay').stop().animate( { left : '0px' }, 300 );
                    }
                );
                
                var $container  = $('#am-container'),
                    $imgs       = $container.find('img').hide(),
                    totalImgs   = $imgs.length,
                    cnt         = 0;
                
                $imgs.each(function(i) {
                    var $img    = $(this);
                    $('<img/>').load(function() {
                        ++cnt;
                        if( cnt === totalImgs ) {
                            $imgs.show();
                            $container.montage({
                                liquid  : false,
                                fillLastRow : true
                            });
                            
                            /* 
                             * just for this demo:
                             */
                            $('#overlay').fadeIn(500);
                        }
                    }).attr('src',$img.attr('src'));
                }); 
                
            });

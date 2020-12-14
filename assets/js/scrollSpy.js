/**
 * Name file:   Scroll Soy
 * Description: This script will add a smooth scrolling animation
 *              to the body thanks to the data-spy attribute
 *
 * Version: 1.0
 * Author: Enza Lombardo
 */

(function($){

    // =============
    // = SCROLLSPY =
    // =============
    $(document).ready(function () {
        // init => scrollspy
        $('body').scrollspy({ target: '#navbar-example' });

        // animation scrool
        // quand je click sur un élément de la navigation
        // il scroll à son point d'encrage (#)
        $('.navbar-collapse ul li a[href^="#"]').on('click', function(e){
            target = this.hash;
            e.preventDefault();

            $('html, body').animate({
                scrollTop : $(this.hash).offset().top
            }, 600, function(){
                window.location.hash = target;
            });
        });

    });

})(jQuery);
(function ($) {
    $(function () {

        $('.button-collapse').sideNav();
        $('.parallax').parallax();
        $('.materialboxed').materialbox({});
        $('.carousel').carousel({});
        $('.modal-trigger').leanModal();

        $('.search-modal-trigger').leanModal(
            {
                dismissible: true,
                //starting_top: '10%', // Starting top style attribute
                //ending_top: '50%', // Ending top style attribute
            }
        );


    }); // end of document ready
})(jQuery); // end of jQuery name space
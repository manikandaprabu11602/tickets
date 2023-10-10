$(document).ready(function() {
    // Fading in the special text on page load
    $('.special-text').fadeIn(1000); // Adjust the duration as needed (in milliseconds)

    // Toggle a class on button click
    $('.btn-toggle').click(function() {
        $('.special-text').toggleClass('special-text-active');
    });
});
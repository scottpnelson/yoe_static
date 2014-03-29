$(document).ready(function() {



});

// Refresh the captcha
$("#refresh-captcha").click(function() {
    event.preventDefault();
    var captchaImg = $("#captcha-img");
    var loadingSpinner = $("#captcha-spinner");

    captchaImg.attr('src', "/captcha"+'?'+Math.random());

    captchaImg.hide();
    loadingSpinner.show();


});

$("#captcha-img").on('load', function() {
    var loadingSpinner = $("#captcha-spinner");

    console.log('loaded!');

    loadingSpinner.hide();
    $(this).show();
});

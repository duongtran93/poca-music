$(document).on('click', '#toggle-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    let input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

$(document).on('click', '#toggle-password-confirm', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    let input = $("#password-confirm");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

$(document).on('click', '#toggle-new-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    let input = $("#new-password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

$(document).on('click', '#toggle-old-password', function() {

    $(this).toggleClass("fa-eye fa-eye-slash");

    let input = $("#old-password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});


function sign_in(){
    $("#signin-card").show();
}

function sign_in_hide(){
    $("#signin-card").hide();
}

function sign_up(){
    $("#signup-card").show();
}

function sign_up_hide(){
    $("#signup-card").hide();
}

$(document).ready(function() {
    // Open the sign-in form card
    $("#open-button").click(function () {
        sign_in();
    });

    // Close the sign-in form card
    $(".close-button").click(function() {
        sign_in_hide();
        sign_up_hide();
    });

    // Open Sign-up form card
    $(".sign-up-button").click(function() {    
        sign_in_hide();
        sign_up();
    });
    
    $(".sign-up-to-in").click(function() {
        sign_in();
        sign_up_hide();
    });
});


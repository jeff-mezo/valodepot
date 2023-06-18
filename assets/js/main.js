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

function postbox_hide() {
    $("#post-box").hide();
}

function postbox_show() {
    $("#post-box").show();
}

function plus_hide() {
    $("#add-button").hide();
}

function plus_show() {
    $("#add-button").show();
}

function minus_show() {
    $("#minus-button").show();
}

function minus_hide() {
    $("#minus-button").hide();
}

function show_update() {
    $("#submit-button").hide();
    $("#update-button").show();
}

function delete_card_close($button) {
    $agent_id = $($button).data('agent-id');
    //console.log('agent id: ' + $agent_id);
    $deletebox_id = "#agent-delete-" + $agent_id;

    $ability_agent_id = $($button).data('agent-id');
    $abilityaddbox_id = "#ability-add-" + $ability_agent_id;

    $($deletebox_id).hide();
    $($abilityaddbox_id).hide();
}


$(document).ready(function() {
    // Open the sign-in form card
    $(".open-button").click(function () {
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

    $("#add-button").click(function() {
        postbox_show();
        plus_hide();
        minus_show();
    });

    $("#minus-button").click(function() {
        postbox_hide();
        minus_hide();
        plus_show();
    });
    

    $(document).on('click', '#post-container .edit-button', function() {
        postbox_show();
        show_update();

        var post_id = $(this).attr('name');
        var content_id = '#' + post_id;
        var content = $(content_id).text();

        $("#message").val(content);
        $("#post-id-val").val(post_id);

        $('html, body').scrollTop(0);
    });

    // DELETE POST

    $(document).on('click', '#post-container .delete-button', function() {
        var post_id = $(this).data('post-id');
        
        // Send an AJAX request to the PHP script
        $.ajax({
            url: 'assets/includes/postdelete.inc.php',
            method: 'POST',
            data: { post_id: post_id },
            success: function(response) {
                console.log(response);
                location.reload(); // Reload the page
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    // DELETE ABILITY

    $(document).on('click', '.ability-delete-button', function() {
        var agent_name = $(this).data('agent-name');
        var ability_name = $(this).data('ability-name');

        // console.log(agent_name);
        // console.log(ability_name);

        //Send an AJAX request to the PHP script
        $.ajax({
            url: 'assets/includes/deleteability.inc.php',
            method: 'POST',
            data: { 
                ability_name: ability_name,
                agent_name: agent_name
            },
            success: function(response) {
                console.log(response);
                location.reload(); // Reload the page
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });

    var clientTimeZoneOffset = new Date().getTimezoneOffset();
    console.log('HTTP request calling');
    // Make an AJAX request to the same file (self) and pass the timeZoneOffset value

    console.log(clientTimeZoneOffset);

    // INDEX TO ABILITIES

    // is Admin


    // Set default value when the page loads
    // $('input[name="isAdmin"]').val(0);

    $('#adminRadioButton').on('change', function() {
        var isAdminValue = this.checked ? 1 : 0;
        $('input[name="isAdmin"]').val(isAdminValue);
    });

    // EDIT AGENTS

    $('.edit-agent').click(function() {
        $agent_id = $(this).data('agent-id');
        //console.log('agent id: ' + $agent_id);

        $editbox_id = "#agent-" + $agent_id;
        console.log($editbox_id);

        $($editbox_id).show();
        //console.log('done');
    });
    
    $('.delete-agent').click(function() {
        $agent_id = $(this).data('agent-id');
        //console.log('agent id: ' + $agent_id);

        $deletebox_id = "#agent-delete-" + $agent_id;
        console.log($deletebox_id);

        $($deletebox_id).show();
        //console.log('done');
    });
    

    $('.agent-edit-close').click(function() {
        $agent_id = $(this).data('agent-id');
        //console.log('agent id: ' + $agent_id);
        $editbox_id = "#agent-" + $agent_id;

        $($editbox_id).hide();
    });

    $('.delete-card-close').click(function() { 
        delete_card_close(this);
    });


    $(document).on('click', '#preview-img', function() {
        var inputElement = $(this).closest('.col-4').find('input[name="img"]').val();
        var imgTag = $(this).closest('.col-4').find('img');

        console.log(inputElement);
        imgTag.attr('src', inputElement);

    });

    $(document).on('click', '#preview-ability-img', function() {
        var inputElement = $(this).closest('.col-4').find('input[name="icon"]').val();
        var imgTag = $(this).closest('.col-4').find('img');

        console.log(inputElement);
        imgTag.attr('src', inputElement);

    });

    // ADMIN - ADD AGENT

    $('#add-agent').click(function() {
        console.log("add-agent opening");

        $('#agent-editor-card').show();
        //console.log('done');
    });

    $('.agent-add-close').click(function() { 
        console.log("add-agent closing");

        $('#agent-editor-card').hide();
    });


    // ADMIN - ADD WEAPONS
    $('#add-weapon').click(function() {
        console.log("add-agent opening");

        $('#weapon-editor-card').show();
        //console.log('done');
    });

    $('.weapon-add-close').click(function() { 
        console.log("add-agent closing");

        $('#weapon-editor-card').hide();
    });

    // ABILITITY TOOLTIP

        $(document).on('click', '.skill-card', function() {
            console.log('clicked tooltip');

            // Hide all other tooltips
            $('.ability-tooltip').hide();

            // Toggle the tooltip for the clicked skill-card

            $(this).parent('.ability-wrap').find('.ability-tooltip').show();


        });

        $(document).on('click', '.ability-tooltip', function() {
            console.log('clicked tooltip');

            // Hide all other tooltips
            $('.ability-tooltip').hide();
        });

    // ABILITY DELETE

    $(document).on('click', '.agent-container .ability-delete-toggle', function() {

        $agent_id = $(this).data('agent-id');
        //console.log('agent id: ' + $agent_id);
        $abilities_class = ".ability-delete-button";

        $($abilities_class).toggle();
    
    });

    // ABILITY ADD

        $(document).on('click', '.agent-container .ability-add-toggle', function() {

            $agent_id = $(this).data('agent-id');
            //console.log('agent id: ' + $agent_id);
            $abilities_class = "#ability-add-" + $agent_id;

            $($abilities_class).toggle();
        
        });


});


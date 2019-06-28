/*
 * Scripts for chat.php
 */

setInterval(function () {
    updateChat();
}, 2000);

function updateChat() {
    $.post
    $.get

    $.ajax({
        url: 'process-chat.php',
        type: 'POST',
        data: 'chatUpdate=messages',
        success: function (serverResponse) {
            $("#show-messages").html(serverResponse);
        }
    });
}

function sendMessage() {
    let userName = $('#uname').val();
    let chatMsg = $('#msg').val();

    // $('#uname').val('');
    $('#msg').val('');

    if (userName == '') {
        alert("Username can't be blank");
        return;
    }

    else if (chatMsg == '') {
        alert("Message can't be blank");
        return;
    }

    $.ajax({
        url: 'process-chat.php',
        type: 'POST',
        data: 'username=' + userName + '&message=' + chatMsg,
        success: function (serverResponse) {
        }
    });
    $('#msg').focus();
    updateChat();
}

$(document).keypress(function (e) {
    if (e.which == 13) {
        e.preventDefault();
        sendMessage();
    }
})
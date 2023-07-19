//
// HUGE SHOUT-OUT TO YULYA FOR HELPING ME WITH THIS CODE!
//

// This code toggles the hidden class on the emojiDropdown element when the emojiBtn element is clicked.
$('.emojiBtn').on('click', function() {
    $('#emojiDropdown').toggleClass('hidden')
})

// This code is for the reaction buttons, it will add one to the counter each time a reaction is clicked.
$('body').on('click', '#reactionBlock button', function() {
    // get the unicode value from the button
    var unicode = $(this).data('unicode');

    $(this).find('span').html(function(i, val) {
        return val * 1 + 1
    });

    // Save the reaction to the database
    saveReaction(unicode);
})

// This code adds a reaction to a post when the emoji is clicked.
// It checks to see if the emoji has already been used, and if so, increments the count for that emoji.
// If the emoji has not been used, it adds it to the list of reactions.
$('body').on('click', '#emojiDropdown li', function() {
    var unicode = $(this).data('unicode');

    var exist = $('#reactionBlock').find("[data-unicode='" + unicode + "']");
    if (!exist.length) {
        $('#reactionBlock').append('<button data-unicode="' + unicode + '">&#' + unicode + '<span>1</span></button>');
    } else {
        $(exist).find('span').html(function(i, val) {
            return val * 1 + 1
        });
    }

    // Call the saveReaction function to save the reaction to the database
    saveReaction(unicode);

    $('#emojiDropdown').toggleClass('hidden')
})

// function to save the reaction
function saveReaction(unicode) {
    // get the endpoint from the value
    var reactionUrl = $('#reactionUrl').val();
    var reactionXid = $('#reactionXid').val();
    var entry_id = $('#entryId').val();

    $.ajax({
        url: reactionUrl,
        type: 'POST',
        data: {
            'entry_id': entry_id,
            'unicode': unicode,
            'XID': reactionXid
        }
    });
}

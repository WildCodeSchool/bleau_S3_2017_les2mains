//animate page home

$(document).ready(function () {
    $(".open-overlay").delay(3000).queue(function() {
        $(".open-overlay").trigger('click');
    });

    $(".titre").delay(1000).animate({left: "0"}, {duration: 1000});
});
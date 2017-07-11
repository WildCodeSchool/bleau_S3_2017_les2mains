$(document).ready(function(){

    // Init script materialize
    init();

    // Flèche up
    $(window).scroll(function() {
        if ($(window).scrollTop() <= 5) {
            $('.fleche_img').css({right: '-100px', 'transition': '.4s'});
        } else {
            $('.fleche_img').css({right: '0px', 'transition': '.4s'});
        }
    });

    $(".fleche_img").click(function () {
        $(window).scrollTop();
    });

    // Animation menu
    $('.open-overlay').click(function() {
        $('.open-overlay').css('pointer-events', 'none');
        var overlay_navigation = $('.overlay-navigation'),
            top_bar = $('.bar-top'),
            middle_bar = $('.bar-middle'),
            bottom_bar = $('.bar-bottom');

        overlay_navigation.toggleClass('overlay-active');
        if (overlay_navigation.hasClass('overlay-active')) {

            top_bar.removeClass('animate-out-top-bar').addClass('animate-top-bar');
            middle_bar.removeClass('animate-out-middle-bar').addClass('animate-middle-bar');
            bottom_bar.removeClass('animate-out-bottom-bar').addClass('animate-bottom-bar');
            overlay_navigation.removeClass('overlay-slide-up').addClass('overlay-slide-down')
            overlay_navigation.velocity('transition.slideLeftIn', {
                duration: 300,
                delay: 0,
                begin: function() {
                    $('nav ul li').velocity('transition.perspectiveLeftIn', {
                        stagger: 150,
                        delay: 0,
                        complete: function() {
                            $('nav ul li a').velocity({
                                opacity: [1, 0],
                            }, {
                                delay: 10,
                                duration: 140
                            });
                            $('.open-overlay').css('pointer-events', 'auto');
                        }
                    })
                }
            })

        } else {
            $('.open-overlay').css('pointer-events', 'none');
            top_bar.removeClass('animate-top-bar').addClass('animate-out-top-bar');
            middle_bar.removeClass('animate-middle-bar').addClass('animate-out-middle-bar');
            bottom_bar.removeClass('animate-bottom-bar').addClass('animate-out-bottom-bar');
            overlay_navigation.removeClass('overlay-slide-down').addClass('overlay-slide-up')
            $('nav ul li').velocity('transition.perspectiveRightOut', {
                stagger: 150,
                delay: 0,
                complete: function() {
                    overlay_navigation.velocity('transition.fadeOut', {
                        delay: 0,
                        duration: 300,
                        complete: function() {
                            $('nav ul li a').velocity({
                                opacity: [0, 1],
                            }, {
                                delay: 0,
                                duration: 50
                            });
                            $('.open-overlay').css('pointer-events', 'auto');
                        }
                    });
                }
            })
        }
    });

    // Show title with animate homepage
    $(".titre").delay(1000).animate({fontSize:'65px'}, {duration: 1500});

});

function init(){
    // Modal init
    $('.modal').modal();

    // TODO: Delete if ok
    // $('.button-collapse').sideNav();

    // Parallax init
    $('.parallax').parallax();

    // Select field form init
    $('select').material_select();

    // Textearea field init
    $('textarea').trigger('autoresize');

    // DatePicker Init
    $('.datepicker').pickadate({
        selectMonths: true,//Creates a dropdown to control month
        selectYears: 15,//Creates a dropdown of 15 years to control year
        //The title label to use for the month nav buttons
        labelMonthNext: 'Next Month',
        labelMonthPrev: 'Last Month',
        //The title label to use for the dropdown selectors
        labelMonthSelect: 'Select Month',
        labelYearSelect: 'Select Year',
        //Months and weekdays
        monthsFull: [ 'January', 'February', 'March', 'April', 'March', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
        monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mar', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ],
        weekdaysFull: [ 'Lundi', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
        weekdaysShort: [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ],
        //Materialize modified
        weekdaysLetter: [ 'S', 'M', 'T', 'W', 'T', 'F', 'S' ],
        //Today and clear
        today: 'Today',
        clear: 'Clear',
        close: 'Close',
        //The format to show on the `input` element
        format: 'dd/mm/yyyy',
        closeOnSelect: false,
    });
    
    $('.datepicker').on('change', function(){
        $(this).next().find('.picker__close').click();
    });
}

function showEditFormAjax(targetListen, targetPath){
    $(targetListen).click(function (e) {
        $(targetListen).modal();
        e.preventDefault();
        var idElem = $(this).data('id');
        var modalContent = $('#modal' + idElem);
        $.ajax({
            url: targetPath,
            data: {'idElem': idElem },
            method: 'post',
            success: function (response) {
                modalContent.html(response);
                init();
            }
        })
    });
}
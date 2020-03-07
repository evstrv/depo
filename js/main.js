$(document).ready(function () {
    console.log('Good');

    // плавное поялвение текста в начале страницы
    $("section.main-photo > div.title").fadeIn(1400);

    // fancybox
    $("a#image").fancybox({
        // 'centerOnScroll' : true
    });  
});

// плавный спуск по меню
var $page = $('html, body');

$('a[href*="#"]').click(function () {
    $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 1500);

    return false;
});

// смена карты
$('#first').click(function () {
    $('footer > section.contacts > div.map > iframe.first').fadeIn(1400);
    $('footer > section.contacts > div.map > iframe.second').hide();
    $('footer > section.contacts > div.map > iframe.third').hide();
});

$('#second').click(function () {
    $('footer > section.contacts > div.map > iframe.second').fadeIn(1400);
    $('footer > section.contacts > div.map > iframe.first').hide();
    $('footer > section.contacts > div.map > iframe.third').hide();
});

$('#third').click(function () {
    $('footer > section.contacts > div.map > iframe.third').fadeIn(1400);
    $('footer > section.contacts > div.map > iframe.first').hide();
    $('footer > section.contacts > div.map > iframe.second').hide();
});

// меню
$('header > div.header > div.burger-container').click(function () {
    $('header > div.header > div.black-mobile').fadeToggle(300);
});

$('header > div.header > div.black-mobile > nav > a').click(function () {
    $('header > div.header > div.black-mobile').fadeOut(300);
});

// подробнее
$('section.results > div > article > button').click(function () {
    $(this).next().fadeToggle(300);
    $(this).next().css('display', 'flex');
});

// увеличение количества объявлений
var limit = 0;

function add() {
    var url = '../php/action.php';
    limit = limit + 12;
    var data = 'limit=' + limit;
    console.log(data);
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function(data)
        {
            if (data == 'null') {
                $('#add').hide();
            } else {
                $('.data_ajax').append(data);
                $("a#image").fancybox({
                    // 'centerOnScroll' : true 
                }); 
                $('section.results > div > article > button').click(function () {
                    $(this).next().fadeToggle(300);
                    $(this).next().css('display', 'flex');
                }); 
            }
        }
    });
}

$('form#telegram').submit(function () {
    var url = '../php/telegram.php';
    var data = $( "form#telegram" ).serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (data) {
            swal({
                title: "Отправлено",
                icon: "success",
            });
            $('form input[type="text"], form input[type="tel"], form textarea').val('');
        },
        error: function (data) {
            swal({
                title: "Ошибка",
                icon: "error",
            });
        }
    });
    return false;
});
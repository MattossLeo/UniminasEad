/*----Menu Mobile Click----*/
$('.main__menu--svg').on('click', function(){
    if ($('.main__menu--mob').css("display") === "none") {
        $('.main__menu--mob').toggle();
        $('.menu__mob--content').animate({
            width: "100%"
        }, 250);
        $('body').css({
            "overflow-y": 'hidden',
        });
    }else {
        $('body').css({
            "overflow-y": 'scroll',
        });
        $('.menu__mob--content').animate({
            width: "0%"
        }, 250, function () {
            $('.main__menu--mob').toggle();
        });
    }
});



/*----jQuery Redirect Menu----*/

$('.menu_header-mob li a').click(function(){
    $('body').css({
        "overflow-y": 'scroll',
    });
    $('.menu__mob--content').animate({
        width: "0%"
    }, 250, function (){
        $('.main__menu--mob').toggle();
    });

});

/*--------Mascara Phone-------*/

$('#formPhone').mask('(99) 99999-9999');

$("#form").on('submit',function(e){

    $.ajax({
        datatype: "json",
        type: "POST",
        url: "https://uniminasposead.com.br/wp-admin/admin-ajax.php",
        data:{
            'action': 'form_contact',
            'name': $('#formName').val(),
            'mail': $('#formMail').val(),
            'phone': $('#formPhone').val(),
            'checkyes': $('#formCheckBoxYes').val(),
            'checkno': $('#formRadioNo').val()
        },
        success: function (data){
            console.log(data);
            window.location.href = 'https://uniminasposead.com.br/obrigado';
        }
    });
});





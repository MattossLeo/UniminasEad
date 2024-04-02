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
let page = 1;

$('.btn-pagination').on('click', function () {
    let btn = $(this);
    btn.text('Carregando...');
    let data = new FormData();

    data.append('action', 'load_more_courses');
    data.append('page', page + 1);
    data.append('area', $(this).data('area'));

    $.ajax({
        url: "https://uniminasposead.com.br/wp-admin/admin-ajax.php",
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            if (response.length > 0) {
                $.each(response, function (index, course) {
                    let div = $('<div>').addClass('main__card--courses');
                    let row = $('<div>').addClass('row align-items-end');
                    let col1 = $('<div>').addClass('col-lg-9');
                    let col2 = $('<div>').addClass('col-lg-3');
                    col1.append($('<div>').addClass('card__courses--title').append($('<h2>').addClass('tittle-courses color-white').text(course.title)));
                    col1.append($('<div>').addClass('card__courses--content').append($('<p>').addClass('courses-texts color-white').text(course.objective)));
                    col1.append($('<div>').addClass('card__courses--price').append($('<p>').addClass('main-prices color-white').html('<b>12x34,90</b>&nbsp;&nbsp;&nbsp;<s class="fake-price">12x 44,90</s>')));
                    col2.append($('<div>').addClass('main__card--btn').append($('<a>').addClass('btn-courses').attr('href', course.url).text('CONHEÇER O CURSO')));
                    row.append(col1).append(col2);
                    div.append(row);
                    $('#cursos-container').append(div);
                });
                page++; // Atualizar a variável page
                console.log(page);
                btn.text('Carregar Mais');
            } else {
                btn.text('Todos os Cursos carregados');
            }
        },
    });
});

let countdown = $('#countdown');

let endDate = new Date(localStorage.getItem('endDate')) || new Date();
function update() {
    const timeNow = new Date();
    const difference = Math.max(endDate - timeNow, 0);

    const days = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((difference % (1000 * 60)) / 1000);

    countdown.html(`${days}d ${hours}h ${minutes}m ${seconds}s`);

    // Se a contagem regressiva atingir zero ou menos, reinicie
    if (difference <= 0) {
        reset();
    }
}

// Função para iniciar o contador
function initiateCountdown() {
    setInterval(update, 1000); // Atualiza a cada segundo (1000 milissegundos)
}

// Função para resetar o contador
function reset() {
    const timeNow = new Date();
    // Defina a nova data de término (por exemplo, 7 dias a partir de agora)
    endDate.setTime(timeNow.getTime() + 7 * 24 * 60 * 60 * 1000);
    // Salvar a nova data de término no Armazenamento Local
    localStorage.setItem('endDate', endDate.toISOString());
}

// Inicialização
initiateCountdown();

console.log(endDate);





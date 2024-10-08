/*--------Mascara Phone-------*/
$('document').ready(function() {
    $('#phone').mask('(99) 99999-9999');
});

/*--------Mascara Phone-------*/

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

/*----Menu Mobile Click----*/

/*----Menu Stop Page----*/

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

/*----Menu Stop Page----*/

/*----Ajax Pagination Courses----*/

let page = 1;
let currentCategory = 'sevenHundredTwenty';

function loadCourses(category) {
    let btn = $('.btn-pagination');
    btn.text('Carregando...');
    let data = new FormData();

    data.append('action', 'load_more_courses');
    data.append('page', page);
    data.append('area', btn.data('area'));
    data.append('category', category);

    $.ajax({
        url: "/wp-admin/admin-ajax.php",
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.length > 0) {
                if (page === 1) {
                    $('#courses-row').empty();
                }
                $.each(response, function (index, course) {
                    let htmlContent = `
<div class="col-lg-4">
    <div class="main__card--courses">
        <div class="row align-items-center">
            <div class="col-lg-12"> 
                <div class="course--main__card">
                    <div class="card__courses--title">
                        <h2 class="tittle-courses">${course.title}</h2>
                    </div>
                    <div class="card__courses--content">
                        <p class="courses-texts">${course.objective}</p>
                    </div>
                </div>
                <div class="card__courses--price">
                    <p class="main__fake--price">De: <s class="fake-price">12x ${course.fakePrice}</s></p>
                    <p class="main-prices">Por: <b>12x ${course.price}</b></p>
                </div>
                <div class="main__card--btn">
                    <a class="btn-courses" href="${course.url}">CONHECER O CURSO</a>
                </div>
            </div>
        </div>
    </div>
</div>`;
                    $('#courses-row').append(htmlContent);
                });
                page++;
                btn.text('Carregar Mais');
                btn.prop('disabled', false);
            } else {
                btn.text('Todos os Cursos Carregados');
                btn.prop('disabled', true);
            }
        },
        error: function(xhr, status, error) {
            console.error("Erro na requisição: ", error);
            btn.text('Erro ao Carregar');
        }
    });
}

$('#workload720h').on('click', function () {
    currentCategory = 'sevenHundredTwenty';
    page = 1;
    loadCourses(currentCategory);
});

$('#workload360h').on('click', function () {
    currentCategory = 'threeHundredSixty';
    page = 1;
    loadCourses(currentCategory);
});

$('.btn-pagination').on('click', function () {
    loadCourses(currentCategory);
});

// Load initial courses
loadCourses(currentCategory);

/*----Ajax Pagination Courses----*/

/*----Courses Countdown----*/

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
    setInterval(update, 1000);
}
function reset() {
    const timeNow = new Date();
    endDate.setTime(timeNow.getTime() + 7 * 24 * 60 * 60 * 1000);
    localStorage.setItem('endDate', endDate.toISOString());
}

initiateCountdown();

/*----Courses Countdown----*/

/*---- Popup ----*/
$('document').ready(function() {
    $('#closeBtn').on('click', function () {
        $('#popupForm').css('display', 'none');
    });
    $('.open__popup--btn').on('click', function () {
        $('#popupForm').css('display', 'block');
    });
});
/*---- Popup ----*/

/*----Search Courses----*/

$(document).ready(function() {
    function handleSearch(inputElement, resultsContainer) {
        let words = $(inputElement).val();
        let data = {
            "action": 'search_courses',
            "searchData": words
        };

        if (words.length >= 3) {
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(responseData) {
                    console.log(responseData);
                    $(resultsContainer).css('display', 'block').empty();
                    if (responseData.length > 0) {
                        $(resultsContainer).show();
                        $(resultsContainer).css('overflow-y', responseData.length > 5 ? 'scroll' : 'hidden');
                        responseData.forEach(function(course) {
                            $(resultsContainer).append(
                                `<div class="course-result">
                                    <a href="https://pos.faculdadeuniminasead.com.br/pos-graduacao/${course.area}/${course.url}">
                                       <p class="main__options--courses">${course.titulo}</p>
                                    </a>
                                </div>`
                            );
                        });
                    } else {
                        $(resultsContainer).hide();
                    }
                }
            });
        } else {
            $(resultsContainer).empty().hide();
        }
    }
    $('#originalSearchCourses').on('input', function() {
        handleSearch(this, '#originalResults');
        console.log($(this));
    });

    $('#fixSearchCourses').on('input', function() {
        handleSearch(this, '#fixResults');
        console.log($(this));
    });
});

/*----Search Courses----*/

/*----Course Form----*/

$(document).ready(function() {
    $('#courseForm').on('submit', function(e) {
        e.preventDefault();
        var formDataArray = $(this).serializeArray();
        var formData = {};
        $.each(formDataArray, function() {
            formData[this.name] = this.value;
        });

        function getCurrentDateTime() {
            var currentDate = new Date();
            var formattedDateTime = currentDate.toISOString();
            return formattedDateTime;
        }
        var currentDateTime = getCurrentDateTime();
        var price = parseFloat(formData.price);

        var bodyData = {
            "action": 'form_data_send',
            "formData": {
                "name":formData.name,
                "price": price,
                "dateCreate": currentDateTime,
                "email": formData.email,
                "whatsapp": formData.whatsapp,
                "area": formData.area,
                "course": formData.course,
                "graduation": formData.graduation
            }
        };
        console.log(bodyData);

        $.ajax({
            url: "wp-admin/admin-ajax.php",
            type: 'POST',
            data: bodyData,
            success: function(response) {
                console.log(response);
                window.location.href = 'https://pos.faculdadeuniminasead.com.br/obrigado';
            },
        });
    });
});

/*----Course Form----*/

$(document).ready(function() {
    function adjustStickyCardMargin() {
        // Verificar a largura da tela
        if ($(window).width() <= 767) {
            $('.main__styck--options').css('margin-top', '0');
            return; // Parar a execução da função se a largura for menor ou igual a 767px
        }

        var $courseObjective = $('#courseObjective');
        var $stickyCard = $('.main__styck--options');

        if ($courseObjective.length && $stickyCard.length) {
            var courseObjectiveOffset = $courseObjective.offset().top;
            var stickyCardOffset = $stickyCard.offset().top;
            var stickyCardTop = parseInt($stickyCard.css('top'), 10); // Posição sticky inicial
            var paddingTop = parseInt($stickyCard.css('padding-top'), 10); // padding-top

            // Calcular a margem superior
            var marginTopValue = courseObjectiveOffset - stickyCardOffset - paddingTop;

            // Ajustar a margem superior do card sticky
            $stickyCard.css('margin-top', `${marginTopValue}px`);
        }
    }

    // Ajuste inicial
    adjustStickyCardMargin();

    // Ajustar quando a janela é redimensionada
    $(window).resize(adjustStickyCardMargin);
});



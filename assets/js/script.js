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
            if (response.length > 0) {
                $.each(response, function (index, course) {
                    let htmlContent = `
<div class="col-lg-4">
    <div class="main__card--courses">
        <div class="row align-items-center">
            <div class="col-lg-12"> 
                <div class="course--main__card">
                    <div class="card__courses--title">
                        <h2 class="tittle-courses color-white">${course.title}</h2>
                    </div>
                    <div class="card__courses--content">
                        <p class="courses-texts color-white">${course.objective}</p>
                    </div>
                </div>
                <div class="card__courses--price">
                    <p class="main__fake--price">De: <s class="fake-price">12x 44,90</s></p>
                    <p class="main-prices color-white">Por: <b>12x34,90</b></p>
                </div>
                <div class="main__card--btn">
                    <a class="btn-courses" href="${course.url}">CONHEÇER O CURSO</a>
                </div>
            </div>
        </div>
    </div>
</div>`;

                    document.querySelector('#cursos-container .row').insertAdjacentHTML('beforeend', htmlContent);
                });
                page++;
                btn.text('Carregar Mais');
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
});

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
    $('#openPopupBtn').on('click', function () {
        $('#popupForm').css('display', 'block');
    });
});
/*---- Popup ----*/

/*----Search Courses----*/
$(document).ready(function() {
    $('.search-courses').on('input', function () {
        let words = $(this).val();
        let data = {
            "action": 'search_courses',
            "searchData": words
        };
        if (words.length >= 3) {
            $.ajax({
                url: 'https://uniminasposead.com.br/wp-admin/admin-ajax.php',
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    $('.results-search').css('display', 'block');
                    $(".results-search").empty();
                    if (data.length > 0) {
                        $(".results-search").show();
                        if (data.length > 5) {
                            $(".results-search").css('overflow-y', 'scroll');
                        } else {
                            $(".results-search").css('overflow-y', 'hidden');
                        }
                        data.forEach(function(course) {
                            $(".results-search").append(
                                `<div class="course-result">
                                     <a href="https://uniminasposead.com.br/pos-graduacao/${course.area}/${course.url}">
                                        <p class="main__options--courses">${course.titulo}</p>
                                     </a>
                                 </div>`
                            );
                        });
                    } else {
                        $(".results-search").hide();
                    }
                }
            });
        } else {
            $(".results-search").empty();
            $(".results-search").hide();
        }
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
            "formData": JSON.stringify({
                "id": 74221,
                "createdBy": { "id": 98411 },
                "responsible": { "id": 98411 },
                "dateCreated": currentDateTime,
                "name": formData.name,
                "price": price,
                "source": "MOSKIT_API_V2",
                "origin": "SITE PRINCIPAL",
                "status": "OPEN",
                "closeDate": "string",
                "entityCustomFields": [
                    {
                        "id": "CF_nrLDXoiVCaAgPmOa",
                        "textValue": formData.email,
                        "options": [
                            0
                        ]
                    },
                    {
                        "id": "CF_rpGmBPioCn6QEqeR",
                        "textValue": formData.whatsapp,
                        "options": [
                            0
                        ]
                    },
                    {
                        "id": "CF_dVKmQ5i1CwY1PmWR",
                        "textValue": formData.graduation,
                        "options": [
                            0
                        ]
                    },
                    {
                        "id": "CF_oJZmP1iKCV0JzDgv",
                        "textValue": "SITE PRINCIPAL",
                        "options": [
                            0
                        ]
                    },
                    {
                        "id": "CF_G21qV7ilCe68YMAX",
                        "textValue": formData.area,
                        "options": [
                            0
                        ]
                    },
                    {
                        "id": "CF_eZYm9BiyCo0gZD47",
                        "textValue": formData.course,
                        "options": [
                            0
                        ]
                    }
                ],
                "stage": { "id": 347501 }
            })
        };


        $.ajax({
            url: "https://uniminasposead.com.br/wp-admin/admin-ajax.php",
            type: 'POST',
            data: bodyData,
            success: function(response) {
                console.log(response)
                window.location.href = 'https://uniminasposead.com.br/obrigado';
            },
        });
    });
});

/*$(document).ready(function() {
    $('#courseForm').on('submit', function(e) {
        e.preventDefault();
        let formDataArray = $(this).serializeArray();
        let formData = {};
        $.each(formDataArray, function() {
            formData[this.name] = this.value;
        });

        let bodyData = {
            action: 'form_data_send',
            formData: JSON.stringify({
                name: formData.name,
                phone: formData.whatsapp,
                email: formData.email,
                course: formData.course
            })
        };

        $.ajax({
            url: "https://uniminasposead.com.br/wp-admin/admin-ajax.php",
            type: 'GET',
            data: bodyData,
            success: function(response) {
                console.log(response);
                let checkoutUrl = 'https://uniminasposead.com.br/checkout?';
                checkoutUrlName = 'nome=' + encodeURIComponent(formData.name);
                checkoutUrlPhone = '&numero=' + encodeURIComponent(formData.whatsapp);
                checkoutUrlMail = '&email=' + encodeURIComponent(formData.email);
                checkoutUrlCourse = '&curso=' + encodeURIComponent(formData.course);
                window.location.href = 'https://uniminasposead.com.br/checkout?'+checkoutUrlName + checkoutUrlPhone + checkoutUrlMail + checkoutUrlCourse;
            },
            error: function(response) {
                console.error('Erro:', response);
            }
        });
    });
});*/
/*----Course Form----*/



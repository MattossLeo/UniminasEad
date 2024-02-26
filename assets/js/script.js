document.addEventListener('DOMContentLoaded', function () {
    // Chame a função para atualizar a tabela no carregamento e a cada 20 segundos
    atualizarTabela();
    setInterval(atualizarTabela, 5 * 1000); // Atualizar a cada 20 segundos
});

function atualizarTabela() {
    const tabelaDados = document.getElementById('dashboard-container');

    if (!tabelaDados) {
        console.error('Elemento com ID "dashboard-container" não encontrado no DOM.');
        return;
    }

    const fetchURL = 'https://uniminasposead.com.br/wp-content/themes/uniminaspos/sql-conn.php?get_all_data';

    fetch(fetchURL, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na requisição ao servidor');
            }
            return response.json();
        })
        .then(data => {
            if (data.allData) {
                // Cabeçalho da tabela
                tabelaDados.innerHTML = '<thead><tr><th>Nome</th><th>Whatsapp</th><th>Fila</th><th>Quantidade de Leads</th></tr></thead>';

                // Corpo da tabela
                const corpoTabela = document.createElement('tbody');
                data.allData.forEach(item => {
                    /*console.log(item.clicked);*/
                    const linha = document.createElement('tr');

                    // Modificação aqui: exibir "Próximo" para 0 e "Recebido" para 1
                    let clickedText = '';
                    if (item.clicked === '0'){
                        clickedText = 'Próximo';
                    }else{
                        clickedText = 'Recebido';
                    }
                    linha.innerHTML = `<td>${item.name}</td><td>${item.number}</td><td>${clickedText}</td><td>${item.amount}</td>`;
                    corpoTabela.appendChild(linha);
                });
                tabelaDados.appendChild(corpoTabela);

                // Adicionar estilos ou classes à tabela se necessário
                tabelaDados.classList.add('suaClasseCSS'); // Substitua 'suaClasseCSS' pela classe desejada
            } else {
                alert('Erro ao obter dados da tabela.');
            }
        })
        .catch(error => {
            console.error('Erro:', error.message);
        });
}

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


/*--------Listagem e DashBoard-------*/


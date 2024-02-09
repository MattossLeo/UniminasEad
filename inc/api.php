<?php
/*-----------------------------IDEIA 1------------------------------ */

/*
// Função para obter dados de cursos de um sistema externo
function obterDadosCursosExternos() {
    // Lógica para chamar a API externa e obter os dados
    // Substitua este trecho de código com a lógica real de integração
    // Exemplo fictício:
    $url = 'https://api.externa.com/cursos';
    $dadosExternos = file_get_contents($url);
    return json_decode($dadosExternos, true);
}

$cursosExternos = obterDadosCursosExternos();

echo json_encode($cursosExternos);*/
/*// Defina o cabeçalho para permitir solicitações de qualquer origem (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Rota para obter cursos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['rota']) && $_GET['rota'] === 'cursos') {
    include_once '../cursos/cursos.php';
} else {
    // Rota desconhecida
    http_response_code(404);
    echo json_encode(['mensagem' => 'Rota não encontrada']);
}*/

/*-----------------------------IDEIA 1------------------------------ */
/*-----------------------------IDEIA 2------------------------------ */


/*
// Defina o cabeçalho para permitir solicitações de qualquer origem (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// URL do sistema externo que fornece dados de cursos
$urlSistemaExterno = 'https://exemplo.com/api/cursos';

// Realiza a solicitação para o sistema externo
$dadosExternos = file_get_contents($urlSistemaExterno);

if ($dadosExternos === false) {
    http_response_code(500);
    echo json_encode(['mensagem' => 'Erro ao obter dados do sistema externo']);
} else {
    // Retorna os dados obtidos do sistema externo
    echo $dadosExternos;
}*/

/*-----------------------------IDEIA 2------------------------------ */

/*-----------------------------IDEIA 3------------------------------ */

/*
class Curso {
    private $id;
    private $nome;
    private $descricao;

    public function __construct($id, $nome, $descricao) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
        ];
    }
}*/

/*class CursosExternos {
    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function obterDadosCursos() {
        // Lógica para chamar a API externa e obter os dados
        // Substitua este trecho de código com a lógica real de integração
        // Exemplo:
        $dadosExternos = file_get_contents($this->url);
        return json_decode($dadosExternos, true);
    }
}


require_once 'curso.php';
require_once 'cursos_externos.php';

$cursosExternos = new CursosExternos('https://api.externa.com/cursos');
$dadosExternos = $cursosExternos->obterDadosCursos();

$cursos = [];
foreach ($dadosExternos as $dadosCurso) {
    $curso = new Curso($dadosCurso['id'], $dadosCurso['nome'], $dadosCurso['descricao']);
    $cursos[] = $curso->toArray();
}

echo json_encode($cursos);*/

/*-----------------------------IDEIA 3------------------------------ */
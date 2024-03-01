<?php
/*
$url = 'https://uniminasead.com.br/api/cursos';
$json = file_get_contents($url);

if ($json !== false) {
    $cursos = json_decode($json, true);

    if ($cursos !== null) {
        $areas = array();

        // Agrupar cursos por área
        foreach ($cursos as $curso) {
            $area = $curso['area'];
            if (!isset($areas[$area])) {
                $areas[$area] = array();
            }
            $areas[$area][] = $curso;
        }

        // Exibir cursos por área
        foreach ($areas as $area => $cursos_na_area) {
            echo "Área: $area\n";
            foreach ($cursos_na_area as $curso) {
                echo " - {$curso['nome']}\n";
            }
        }
    } else {
        echo "Erro ao decodificar JSON.";
    }
} else {
    echo "Erro ao obter JSON da URL.";
}*/

<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);
$area_name = basename($url_path);
$area_file = $area_name . '.json';
?>

<section class="area-search">
    <div class="container">
        <div class="row">
            <div class="main__title--search">
                <h2 class="main__title--h2 color-dark--green">Encontre seu curso</h2>
                <div class="main__subititle--search">
                    <img width="60" height="56"
                         src="<?php echo get_template_directory_uri() ?>/assets/img/search-certifier.svg"
                         alt="search-certifier">
                    <p class="main__text--subtitle color-dark--green">Cursos reconhecidos pelo MEC, por Portaria nº 314,
                        de 2 de março de 2020.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="search--course">
                    <div class="input__search">
                        <input class="main__input--search" id="searchCourse" type="search"
                               placeholder="Digite o curso que você procura">
                        <div class="main__icon--search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="cursos-container">
                    <!-- Aqui é onde os cursos serão exibidos -->
                    <?php include get_template_directory(). '/blocks/pagination-courses.php'; ?>
                </div>
                <button id="getCourses" data-area="<?php echo $area_file?>" class="btn-pagination">Carregar Mais</button>
            </div>
        </div>
    </div>
</section>
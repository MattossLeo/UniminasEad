<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);
$area_name = basename($url_path);
$area_file = $area_name . '.json';
?>

<section class="area-search" id="areacourse">
    <div class="container">
        <div class="row">
            <div class="main__title--search">
                <h2 class="main__title--h2 search__areas--title">Encontre seu curso</h2>
                <p class="main__text--subtitle search__areas--subtitle">Cursos reconhecidos pelo MEC, por Portaria nº 314, de 2 de março de 2020.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="search--course">
                    <div class="input__search">
                        <input class="main__input--search search-courses" id="originalSearchCourses" type="search" placeholder="Escolha seu curso:">
                        <div class="main__icon--search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div class="results-search" id="originalResults"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="main__workload--buttons">
                    <div class="workload-720">
                        <button id="workload720h" class="button-workload button-720">720H</button>
                    </div>
                    <div class="workload-360">
                        <button id="workload360h" class="button-workload button-360">360H</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="cursos-container">
            <div class="row" id="courses-row">
                <?php include get_template_directory(). '/blocks/pagination-courses.php';
                ?>
            </div>
        </div>
        <div class="main__btn--pagination">
            <button id="getCourses" data-area="<?php echo $area_file ?>" class="btn-pagination" data-category="sevenHundredTwenty">Carregar Mais</button>
        </div>
    </div>
</section>

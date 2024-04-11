<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url_path = parse_url($url, PHP_URL_PATH);
$url_separate = explode('/', $url_path);
$area_name = $url_separate['2'];
$course_name = $url_separate['3'];

?>
<section class="main__form--content">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 offset-3">
                <div class="popup-content">
                    <span id="closeBtn" class="closeBtn">&times;</span>
                    <div class="main__title--form">
                        <h2 class="title-form color-white">Preencha o formulario abaixo e garanta o seu curso!</h2>
                    </div>
                    <form id="courseForm" action="" method="post">
                        <div class="main__fields main__name">
                            <label for="name">Nome&nbsp;<span style="color:red; font-size:20px">*</span></label>
                            <input class="form__inputs--main form_name" type="text" id="name" name="name" placeholder="Ex: Leonardo de Sousa Mattos" required>
                        </div>
                        <div class="main__fields main__mail">
                            <label for="email">Email&nbsp;<span style="color:red; font-size:20px">*</span></label>
                            <input class="form__inputs--main form_mail" type="email" id="email" name="email" placeholder="Ex: leonardomattos@exemplo.com" required>
                        </div>
                        <div class="main__fields main__phone">
                            <label for="phone">Whatsapp&nbsp;<span style="color:red; font-size:20px">*</span></label>
                            <input class="form__inputs--main form_phone" type="text" id="phone" name="whatsapp" placeholder="Ex:(31) 98888-8888" required>
                        </div>
                        <div class="main__graduation">
                            <label for="graduation">Possui Graduação?&nbsp;<span style="color:red; font-size:20px">*</span></label><br>
                            <input type="radio" id="gradYes" name="graduation" value="Sim">
                            <label for="gradYes">Sim</label><br>
                            <input type="radio" id="gradNo" name="graduation" value="Não">
                            <label for="gradNo">Não</label><br>
                        </div>
                        <div class="hidden__camps">
                            <input type="hidden" name="area" value="<?php echo course_area($area_name)?>">
                            <input type="hidden" name="price" value="3490">
                            <input type="hidden" name="course" value="<?php echo mb_convert_case($course_name, MB_CASE_TITLE, "UTF-8")?>">
                        </div>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
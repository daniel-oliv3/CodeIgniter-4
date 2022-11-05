<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">
                <h3 class="text-center">Recuperar Senha</h3>
                <hr>

                <?= form_open('recover_password_submit', ['novalidate' => true]) ?>

                <div class="mb-3">
                    <label for="text_username" class="form-label">Qual é o seu nome de usuário?</label>
                    <input type="email" name="text_username" id="text-username" class="form-control" placeholder="Digite seu Email" required value="<?= old('text_username') ?>">
                    <?php if(!empty($validation_errors)): ?>
                        <span class="text-danger fst-italic"><small><?= show_form_errors('text_username', $validation_errors) ?></small></span>
                    <?php endif; ?>  
                </div>

                <div class="mb-3 text-center">
                    <a href="<?= site_url('user_recover_password') ?>">Esqueci a minha senha</a>
                    <input type="submit" value="Login" class="btn btn-primary w-50">
                </div>

                <?= form_close() ?>  

            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>




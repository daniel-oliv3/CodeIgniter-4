<?= $this->extend('layouts/out_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">
                <h3 class="text-center">Login</h3>
                <hr>

                <?= form_open('main/login_submit') ?>

                <div class="mb-3">
                    <label for="text_username" class="form-label">Email</label>
                    <input type="email" name="text_username" id="text-username" class="form-control" placeholder="Digite seu Email" required>
                </div>

                <div class="mb-3">
                    <label for="text_passwrd" class="form-label">Senha</label>
                    <input type="password" name="text_passwrd" id="text_passwrd" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <div class="mb-3 text-center">
                    <a href="#">Esqueci a minha senha</a>
                    <span class="mx-2 opacity-25">|</span>
                    <a href="#">Criar nova conta</a>
                </div>

                <div class="mb-3 text-center">
                    <input type="submit" value="Login" class="btn btn-primary w-50">
                </div>

                <?= form_close() ?>  

            </div>

        </div>
    </div>
</div>
    

<?= $this->endSection() ?>




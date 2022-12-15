<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">
                <h3 class="text-center">Nova conta de usuário</h3>
                <hr>

                <?= form_open('new_user_account_submit') ?>

                <div class="mb-3">
                    <label for="text_username" class="form-label">Email</label>
                    <input type="email" name="text_username" id="text-username" class="form-control" placeholder="Digite seu Email" required value="<?= old('text_username') ?>">
                    <?php if(!empty($validation_errors)): ?>
                        <span class="text-danger fst-italic"><small><?= show_form_errors('text_username', $validation_errors) ?></small></span>
                    <?php endif; ?>  
                </div>

                <div class="mb-3">
                    <label for="text_passwrd" class="form-label">Senha</label>
                    <input type="password" name="text_passwrd" id="text_passwrd" class="form-control" placeholder="Digite sua senha" required>
                    <?php if(!empty($validation_errors)): ?>
                        <span class="text-danger fst-italic"><small><?= show_form_errors('text_passwrd', $validation_errors) ?></small></span>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="text_repeat_passwrd" class="form-label">Repetir Senha</label>
                    <input type="password" name="text_repeat_passwrd" id="text_passwrd" class="form-control" placeholder="Repetir sua senha" required>
                    <?php if(!empty($validation_errors)): ?>
                        <span class="text-danger fst-italic"><small><?= show_form_errors('text_repeat_passwrd', $validation_errors) ?></small></span>
                    <?php endif; ?>
                </div>                

                <div class="mb-3 text-center">
                    <input type="submit" value="Criar nova conta" class="btn btn-primary w-50">
                </div>

                <div class="mb-3 text-center">
                    <a href="<?= site_url('/') ?>">Voltar</a>
                </div>

                <?= form_close() ?>  

            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>




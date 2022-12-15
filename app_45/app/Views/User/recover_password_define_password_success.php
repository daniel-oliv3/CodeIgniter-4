<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">
                <h3 class="text-center">Senha atualizada com sucesso!</h3>
                <hr>

                <p class="text-center">Já está em condições de fazer o login!</p>
                <div class="text-center mt-5">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary w-50">Login</a>
                </div>

            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>





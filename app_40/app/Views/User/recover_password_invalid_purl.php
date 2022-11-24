<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">
                <h3 class="text-center">Código de recuperação de senha inválido ou expirado</h3>
       
                <div class="text-center mt-5">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary w-50">Voltar</a>
                </div>

            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>





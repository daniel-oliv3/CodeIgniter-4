<?= $this->extend('layouts/user/user_layout') ?>
<?= $this->section('content') ?>


<div class="container vh-100">
    <div class="row vh-100 justify-content-center align-items-center">
        <div class="col-sm-10 col-lg-6 col-xl-5">

            <div class="card p-5">

                <h1 class="text-center text-danger"><i class="fa-regular fa-circle-xmark"></i></h1>

                <p class="text-center">Código de recuperação de senha é inválido ou expirado</p>
       
                <div class="text-center mt-3">
                    <a href="<?= site_url('/') ?>" class="btn btn-primary w-50">Voltar</a>
                </div>

            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>





<?= $this->extend('layouts/main/main_layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col p-4">
            <a href="<?= site_url('area1') ?>">
                <div class="card p-3 text-center">
                    Área 1
                </div>
            </a>
        </div>
        <div class="col p-4">
            <a href="<?= site_url('area2') ?>">
                <div class="card p-3 text-center">
                    Área 2
                </div>
            </a>    
        </div>

        <?php if(isAdmin()): ?>
        <div class="col p-4">
            <a href="<?= site_url('area3') ?>">
                <div class="card p-3 text-center">
                    Área 3 (Admin)
                </div>
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>


<h1>TESTE</h1>









<?= $this->endSection() ?>
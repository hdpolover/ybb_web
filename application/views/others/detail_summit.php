<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Summit Details</h6>
        </div>
        <div class="card-body">
            <?php foreach ($summit as $p) : ?>
                <div class="row">
                    <div class="col">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Summit Name</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $p['description']; ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Registration Fee</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= 'Rp. ' . number_format($p['regist_fee'], 2, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Program Fee</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= 'Rp. ' . number_format($s['p'], 2, ',', '.'); ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Status</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;">
                                    <?php switch ($p['status']) {
                                        case 0:
                                            echo ("Inactive");
                                            break;
                                        case 1:
                                            echo ("Active");
                                            break;
                                    }; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
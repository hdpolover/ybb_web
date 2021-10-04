<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Influencer Details</h6>
        </div>
        <div class="card-body">
            <?php foreach ($influencers as $sc) : ?>
                <div class="row">
                    <div class="col">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Referral Code</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $sc['referral_code']; ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Full Name</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $sc['inf_name']; ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Institution</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $sc['institution']; ?></p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Field of Study</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $sc['field_of_study']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black;  font-weight: bold;">Tiktok Account</p>
                            </div>
                            <div class="col">
                                <a href="<?= $sc['tiktok']; ?>" target="_blank"><?= $sc['tiktok']; ?></a>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Instagram Account</p>
                            </div>
                            <div class="col">
                                <a href="<?= $sc['instagram']; ?>" target="_blank"><?= $sc['instagram']; ?></a>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Status</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;">
                                    <?php switch ($sc['status']) {
                                        case 0:
                                            echo 'Inactive';
                                            break;
                                        case 1:
                                            echo 'Active';
                                    } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col">
                                <p class="card-text" style="color: black; font-weight: bold;">Referral Count</p>
                            </div>
                            <div class="col">
                                <p class="card-text" style="color: black;"><?= $sc['referral_count']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
                <div class="row" style="padding: 20px 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Participant Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($referred_participants as $sc) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sc['full_name']; ?></td>
                                        <td><?= $sc['email']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>participant/detail/<?= $sc['id_participant']; ?>" class="btn btn-info">Detail</i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
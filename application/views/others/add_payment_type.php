<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add New Payment Type</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('others/save_new_pt'); ?>">
                <div class="form-group row">
                    <label for="id_summit" class="col-sm-4 col-form-label">Summit</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="id_summit" name="id_summit">
                            <?php foreach ($summit as $s) : ?>
                                <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" name="description" class="form-control" id="description" placeholder="Insert payment type description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start_date" class="col-sm-4 col-form-label">Start Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Choose payment type start date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="end_date" class="col-sm-4 col-form-label">End Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Choose payment type end date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-4 col-form-label">Payment Type</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="type" name="type">
                            <option value="" disabled selected>--Select a payment type--</option>
                            <option value="regist_fee">Registration Fee</option>
                            <option value="program_fee_1">Program Fee Batch 1</option>
                            <option value="program_fee_2">Program Fee Batch 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col">
                        <div class="text-align-right">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
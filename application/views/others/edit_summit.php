<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Summit</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('others/update_summit'); ?>">
                <input type="hidden" name="id_summit" value="<?php echo $summit[0]['id_summit']; ?>">
                <div class="form-group row">
                    <label for="desc" class="col-sm-4 col-form-label">Summit Description/Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="desc" class="form-control" id="desc" value="<?= $summit[0]['description']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regist_fee" class="col-sm-4 col-form-label">Registration Fee</label>
                    <div class="col-sm-8">
                        <input type="number" name="regist_fee" class="form-control" id="regist_fee" value="<?= $summit[0]['regist_fee']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="program_fee" class="col-sm-4 col-form-label">Program Fee</label>
                    <div class="col-sm-8">
                        <input type="number" name="program_fee" class="form-control" id="program_fee" value="<?= $summit[0]['program_fee']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Summit Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="status" name="status">
                            <option value="0" <?php if ($summit[0]['status'] == 0) echo ('selected'); ?>>Inactive</option>
                            <option value="1" <?php if ($summit[0]['status'] == 1)  echo ('selected'); ?>">Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regist_status" class="col-sm-4 col-form-label">Registration Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="regist_status" name="regist_status">
                            <option value="0" <?php if ($summit[0]['regist_status'] == 0) echo ('selected'); ?>>Inactive</option>
                            <option value="1" <?php if ($summit[0]['regist_status'] == 1)  echo ('selected'); ?>">Active</option>
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
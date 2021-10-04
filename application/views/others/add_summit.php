<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Summit</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('others/create_new_summit'); ?>">
                <div class="form-group row">
                    <label for="desc" class="col-sm-4 col-form-label">Summit Description/Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="desc" class="form-control" id="desc">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regist_fee" class="col-sm-4 col-form-label">Registration Fee</label>
                    <div class="col-sm-8">
                        <input type="number" name="regist_fee" class="form-control" id="regist_fee">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="program_fee" class="col-sm-4 col-form-label">Program Fee</label>
                    <div class="col-sm-8">
                        <input type="number" name="program_fee" class="form-control" id="program_fee">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-4 col-form-label">Summit Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="status" name="status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="regist_status" class="col-sm-4 col-form-label">Registration Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="regist_status" name="regist_status">
                            <option value="0">Inactive</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col">
                        <div class="text-align-right">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Create
                            </button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
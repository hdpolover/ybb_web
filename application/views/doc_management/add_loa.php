<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New LoA</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('doc_management/save_new_loa'); ?>">
                <div class="form-group row">
                    <label for="full_name" class="col-sm-4 col-form-label">Full Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="full_name" class="form-control" id="full_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="institution" class="col-sm-4 col-form-label">Institution</label>
                    <div class="col-sm-8">
                        <input type="text" name="institution" class="form-control" id="institution">
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
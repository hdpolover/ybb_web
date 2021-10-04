<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create QR Code</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('doc_management/save_new_qr_code'); ?>">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" id="email">
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
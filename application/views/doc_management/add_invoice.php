<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Invoice</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('doc_management/save_invoice'); ?>">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" id="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nationality" class="col-sm-4 col-form-label">Nationality</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="nationality" name="nationality">
                            <option value="id">Indonesian</option>
                            <option value="eng">Foreigners</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="type" class="col-sm-4 col-form-label">Payment Invoice</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="type" name="type">
                            <option value="1">Batch 1</option>
                            <option value="2">Batch 2</option>
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
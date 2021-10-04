<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Influencer</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('influencer/save_new_influencer'); ?>">
                <div class="form-group row">
                    <label for="referral_code" class="col-sm-4 col-form-label">Referral Code</label>
                    <div class="col-sm-8">
                        <input type="text" name="referral_code" class="form-control" id="referral_code">
                    </div>
                </div>
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
                <div class="form-group row">
                    <label for="field_of_study" class="col-sm-4 col-form-label">Field of Study</label>
                    <div class="col-sm-8">
                        <input type="text" name="field_of_study" class="form-control" id="field_of_study">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tiktok" class="col-sm-4 col-form-label">Tiktok Account</label>
                    <div class="col-sm-8">
                        <input type="text" name="tiktok" class="form-control" id="tiktok">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="instagram" class="col-sm-4 col-form-label">Instagram Account</label>
                    <div class="col-sm-8">
                        <input type="text" name="instagram" class="form-control" id="instagram">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label">Influencer Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="status" name="status">
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
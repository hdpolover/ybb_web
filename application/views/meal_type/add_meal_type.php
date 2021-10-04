<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">New Meal Type</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?= base_url('meal_type/create_new_meal'); ?>">
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label">Description</label>
          <div class="col-sm-8">
            <input type="text" name="desc" class="form-control" id="desc" placeholder="Input meal type description">
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
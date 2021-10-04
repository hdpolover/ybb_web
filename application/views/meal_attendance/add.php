<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">New Meal Attendance</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?= base_url('meal_attendance/save_add'); ?>">
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label" style="color: black;">Participant Name</label>
          <div class="col-sm-8">
            <select class="form-control" id="id_participant" name="id_participant">
              <?php foreach ($participants as $s) { ?>
                <option value="<?php echo $s['id_participant']; ?>"><?php echo $s['full_name']; ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label" style="color: black;">Summit Day</label>
          <div class="col-sm-8">
            <select class="form-control" id="id_summit_day" name="id_summit_day">
              <?php foreach ($summit_days as $s) { ?>
                <option value="<?php echo $s['id_summit_day']; ?>"><?php echo $s['sd_desc']; ?> -- <?php echo $s['description']; ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label" style="color: black;">Meal Type</label>
          <div class="col-sm-8">
            <select class="form-control" id="id_meal_type" name="id_meal_type">
              <?php foreach ($meal_types as $s) { ?>
                <option value="<?php echo $s['id_meal_type']; ?>"><?php echo $s['description']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <p class="card-text" style="color: black;">Check In Time</p>
            </div>
            <div class="col-sm-8">
              <input type="datetime-local" name="check_in_time" class="form-control" id="check_in_time" style="color: black;" value="">
            </div>
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
      </form>
    </div>
  </div>
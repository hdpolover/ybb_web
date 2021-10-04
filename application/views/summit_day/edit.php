<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Summit Day</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?= base_url('summit_day/update_sd'); ?>">
        <input type="hidden" name="id_summit_day" value="<?php echo $summit_days[0]['id_summit_day']; ?>">
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label" style="color: black;">Summit</label>
          <div class="col-sm-8">
            <select class="form-control" id="id_summit" name="id_summit">
              <?php foreach ($summits as $s) : ?>
                <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <p class="card-text" style="color: black;">Day Date</p>
            </div>
            <div class="col-sm-8">
              <input type="date" name="day_date" class="form-control" id="day_date" style="color: black;" value="<?= $summit_days[0]['day_date']; ?>">
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label" style="color: black;">Description</label>
          <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" value="<?= $summit_days[0]['sd_desc']; ?>">
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
      </form>
    </div>
  </div>
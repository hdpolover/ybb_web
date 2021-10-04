<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Admin</h6>
    </div>
    <div class="card-body">
      <form method="post" action="<?= base_url('admin/edit'); ?>">
        <input type="hidden" name="id_admin" value="<?php echo $admin[0]['id_admin']; ?>">
        <div class="form-group row">
          <label for="username" class="col-sm-4 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" name="username" class="form-control" id="username" value="<?= $admin[0]['username']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-sm-4 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="text" name="password" class="form-control" id="password" value="<?= $admin[0]['password']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label">Summit</label>
          <div class="col-sm-8">
            <select class="form-control" id="summit" name="summit">
              <?php foreach ($summits as $s) : ?>
                <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label">Status</label>
          <div class="col-sm-8">
            <select class="form-control" id="status" name="status">
              <option value="0" selected>Inactive</option>
              <option value="1">Active</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-4"></div>
          <div class="col">
            <button type="submit" class="btn btn-primary btn-user btn-block">
              CREATE
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
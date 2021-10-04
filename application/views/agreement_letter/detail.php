<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Participant Agreement Letter Details</h6>
    </div>
    <div class="card-body">
      <?php foreach ($agreement_letters as $sc) : ?>
        <div class="row">
          <div class="col">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Full Name</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['full_name']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 50px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Email</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['email']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col" >
                <a style="display: block;" href="<?= base_url(); ?>participant/detail/<?= $sc['id_participant']; ?>" class="btn btn-info">View Participant</a>
              </div>
              <div class="col">
                <a style="display: block;" href="<?= base_url('assets/img/docs/al/') . $sc['file_path'] ?>" class="btn btn-success">Download Agreement Letter</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row">
              <embed type="application/pdf" src="<?= base_url('assets/img/docs/al/') . $sc['file_path'] . "#toolbar=0&navpanes=0&scrollbar=0"; ?> " width="100%" height="700px"></embed>
            </div>
            </br>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
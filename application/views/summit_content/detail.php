<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Summit Content Details</h6>
    </div>
    <div class="card-body">
      <?php foreach ($summit_content as $sc) : ?>
        <div class="row">
          <div class="col">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Created Date</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['created_date']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Modified Date</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['modified_date']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Status</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;">
                  <?php switch ($sc['status']) {
                    case 0:
                      echo 'Draft';
                      break;
                    case 1:
                      echo 'Published';
                      break;
                    case 2:
                      echo 'Archived';
                      break;
                  } ?>
                </p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black;  font-weight: bold;">Title</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['title']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Description</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $sc['description']; ?></p>
              </div>
            </div>

          </div>
          <div class="col">
            <div class="row">
              <?php if ($sc['file_type'] == 'pdf') { ?>
                <embed type="application/pdf" src="<?= base_url('assets/img/summit_contents/') . $sc['id_summit'] . "/" . $sc['file_path'] . "#toolbar=0&navpanes=0&scrollbar=0"; ?> " width="100%" height="500px"></embed>
              <?php } else if ($sc['file_type'] == 'no type') { ?>
                <div style="text-align: center; display:block;">
                  <p ">No file attached</p>
                </div>
              <?php } else {; ?>
                <img src=" <?= base_url('assets/img/summit_contents/') . $sc['id_summit'] . "/" . $sc['file_path']; ?>" class="card-img border" style="width: 90%; height: 90%; display:block;
    margin:auto;">
                  <?php }; ?>
                </div>
                </br>
            </div>
          </div>
        <?php endforeach ?>
        </div>
    </div>
  </div>
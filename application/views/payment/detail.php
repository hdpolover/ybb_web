<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Participant Payment Details</h6>
    </div>
    <div class="card-body">
      <?php foreach ($payment as $p) : ?>
        <div class="row">
          <div class="col">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Payment Date</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $p['payment_date']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Status</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;">
                  <?php switch ($p['payment_status']) {
                    case 0:
                      echo ('Pending');
                      break;
                    case 1:
                      echo ('Valid');
                      break;
                    case 2:
                      echo ('Invalid');
                      break;
                  }; ?>
                </p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Full Name</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $p['full_name']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Account Name</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $p['account_name']; ?></p>
              </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col">
                <p class="card-text" style="color: black; font-weight: bold;">Bank Name</p>
              </div>
              <div class="col">
                <p class="card-text" style="color: black;"><?= $p['bank_name']; ?></p>
              </div>
            </div>

          </div>
          <div class="col">
            <div class="row" style="margin-bottom: 10px;">
              <img src="<?= base_url('assets/img/payments/') . $p['id_payment_type'] . "/" . $p['payment_proof']; ?>" class="card-img border">
            </div>
            </br>
            <?php if ($p['payment_status'] == 0) { ?>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col">
                  <a href="<?= base_url(); ?>payment/validate_payment/<?= $p['id_payment']; ?>" class="btn btn-info">Validate Payment</i></a>
                </div>
                <div class="col">
                  <a href="<?= base_url(); ?>payment/invalidate_payment/<?= $p['id_payment']; ?>" class="btn btn-danger">Invalidate Payment</i></a>
                </div>
              </div>
            <?php }; ?>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
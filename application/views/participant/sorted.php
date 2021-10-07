<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-4">
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <div class="row">
            <h6 class="ml-2 mt-2 font-weight-bold text-primary">Sorted Participants</h6>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" height="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($participants as $p) : ?>
                  <tr>
                    <td><?= $p['full_name']; ?></td>
                    <td>
                      <!-- <a href="<?= base_url(); ?>participant/detail/<?= $p['id_participant']; ?>" class="btn btn-info">Detail</a> -->
                      <button class="btn btn-info" id="showDetails<?= $i; ?>">Detail</button>
                    </td>
                  </tr>
                  <script>
                    $(document).ready(function() {
                      $('#showDetails<?= $i; ?>').on('click', function() {
                        $("#detailsP").html(`<center class="mt-lg-10 my-auto mx-lg-10"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...</center>`);
                        jQuery.ajax({
                          url: "<?= base_url('participant/detail_sorted_ajax/'. $p['id_participant']) ?>",
                          type: "GET",
                          success: function(data) {
                            $("#detailsP").html(data);
                          }
                        });
                      });
                    });
                  </script>
                  <?php $i++; ?>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div id="detailsP" style="align-content: center;">
        <center>
          <h6>Click on "Detail" button to view the participant's details.</h6>
        </center>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>



<!-- End of Main Content -->
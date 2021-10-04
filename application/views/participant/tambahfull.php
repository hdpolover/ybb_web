<div class="container-fluid">
  <!-- Page Heading -->

  <!-- Custom Filter -->
  <!--<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add New Fully Funded Participants</h6>
    </div>

    <div class="card-body">
      <div class="form-group">
        <div class="row">
          <div class="col-2">
            <label for="summit">Select Summit</label>
          </div>
          <div class="col-4">
            <?php
            echo "<select class='form-control' name='summit' id='myInput' onclick='myFunction()'>";
            echo '<option value="" selected="selected">All Summits</option>'; ?>
            <?php foreach ($summits as $s) : ?>
              <?php unset($id, $name);
              $id = $s['id_summit'];
              $name = $s['description'];
              echo '<option value="' . $name . '">' . $name . '</option>'; ?>
            <?php endforeach; ?>
            <?php echo "</select>"; ?>
          </div>
        </div>


      </div>

      <!-- <div class="form-group">
              <label for="fullParticipant">Select Participant</label>
              <select class="form-control" id="myInput2" name="full">
                  <?php foreach ($participants as $p) : ?>
                        <?php unset($idp, $name, $id);
                        $id = $p['id_participant'];
                        $name = $p['full_name'];
                        echo '<option value="' . $name . '">' . $name . '</option>'; ?>
                  <?php endforeach; ?>
              </select>
          </div> -->
      <form action="" method="post">

        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Summit</th>
                <th>Add Action</th>
              </tr>
            </thead>

            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($participants as $p) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $p['full_name']; ?></td>
                  <td><?= $p['email']; ?></td>
                  <td><?= $p['description']; ?></td>
                  <td>
                    <a href="<?= base_url(); ?>participant/tambahin/<?= $p['id_participant']; ?>" class="btn btn-info">Add</a>

                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach ?>
            </tbody>
          </table>

        </div>
      </form>
      <!-- <div style="float:left;">
            <a href="<?= base_url(); ?>participant/full" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Add</button>
          </div> -->
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
</script>

<!-- <script>
$(document).ready(function(){

  // Initialize Select2
  $('#myInput2').select2();

  // Set option selected onchange
  $('#myInput1').change(function(){
    var value = $(this).val();

    // Set selected
    $('#myInput2').val(value);
    $('#myInput2').select2().trigger('change');

  });
});
</script> -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row ml-1">
    <a href="<?= base_url(); ?>participant/tambah" class="btn btn-primary mb-4">Add New Participants</a>
  </div>

  <!-- Custom Filter -->
  <!--<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="ml-2 mt-2 font-weight-bold text-primary">Participants</h6>

      </div>
    </div>
    <div class="card-body">
      <div class="row" style="padding-bottom: 20px;">
        <div class="col-4">
          <div class="filter-group">
            <?php
            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')
                or die ('Cannot connect to db');

            $result = $conn->query("SELECT id_summit, description from summits");
            echo "<select class='form-control' name='summit' id='myInput' onclick='myFunction()'>";
            echo '<option value="" selected="selected">All Summits</option>';
            while ($row = $result->fetch_assoc()) {

              unset($id, $name);
              $id = $row['id_summit'];
              $name = $row['description'];
              echo '<option value="' . $name . '">' . $name . '</option>';
            }
            echo "</select>"; ?>
          </div>
        </div>
        <div class="col-4">
          <div class="filter-group">
            <?php
            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')
                or die ('Cannot connect to db');

            $result = $conn->query("SELECT id_participant, status from participants group by status");
            echo "<select class='form-control' name='status' id='myInput2' onclick='myFunction2()'>";
            echo '<option value="" selected="selected">All statuses</option>';
            while ($row = $result->fetch_assoc()) {

              switch ($row['status']) {
                case '1':
                  unset($id, $name);
                  $id = $row['id_participant'];
                  $name = "Waiting for registration Fee Payment";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
                case '2':
                  unset($id, $name);
                  $id = $row['id_participant'];
                  $name = "Registered";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
                case '3':
                  unset($id, $name);
                  $id = $row['id_participant'];
                  $name = "Paid 1st Batch";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
                case '4':
                  unset($id, $name);
                  $id = $row['id_participant'];
                  $name = "Paid 2nd Batch";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
              }
            }
            echo "</select>"; ?>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Email</th>
              <th hidden>Summit</th>
              <th hidden>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($participants as $p) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $p['full_name']; ?></td>
                <td><?= $p['email']; ?></td>
                <td hidden><?= $p['description']; ?></td>
                <td hidden>
                  <?php switch ($p['status']) {
                    case '0':
                      echo "Waiting for Form Completion";
                      break;
                    case '1':
                      echo "Waiting for registration Fee Payment";
                      break;
                    case '2':
                      echo "Registered";
                      break;
                    case '3':
                      echo "Paid 1st Batch";
                      break;
                    case '4':
                      echo "Paid 2nd Batch";
                      break;
                  } ?>
                </td>
                <td>
                  <a href="<?= base_url(); ?>participant/detail/<?= $p['id_participant']; ?>" class="btn btn-info">Detail</a>
                  <a href="<?= base_url(); ?>participant/edit/<?= $p['id_participant']; ?>" class="btn btn-danger">Edit</a>
                  <!-- <a href="<?= base_url(); ?>peserta/hapus/<?= $p['id_participant']; ?>"
                                  class="btn btn-danger" onclick="return confirm('Apa anda ingin menghapus data tersebut?');">Hapus</a> -->

                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

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

<script>
  function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
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

<!-- End of Main Content -->
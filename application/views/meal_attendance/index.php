<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row ml-1">
    <a href="<?= base_url(); ?>meal_attendance/add" class="btn btn-primary mb-4">Add New Attendance</a>
  </div>

  <?php echo $this->session->flashdata('message'); ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Meal Attendances</h6>
    </div>
    <div class="card-body">
      <div class="row" style="padding-bottom: 20px; padding-left: 20px;">
        <div class="col">
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
        <div class="col">
          <div class="filter-group">

            <?php
            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')
                or die ('Cannot connect to db');

            $result = $conn->query("SELECT description, id_summit_day from summit_days");
            echo "<select class='form-control' name='summit_day' id='myInput2' onclick='myFunction2()'>";
            echo '<option value="" selected="selected">All Summit Days</option>';
            while ($row = $result->fetch_assoc()) {

              unset($id, $name);
              $id = $row['id_summit_day'];
              $name = $row['description'];
              echo '<option value="' . $name . '">' . $name . '</option>';
            }
            echo "</select>"; ?>

          </div>

        </div>
        <div class="col">
          <div class="filter-group">

            <?php
            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')
                or die ('Cannot connect to db');

            $result = $conn->query("SELECT description, id_meal_type from meal_types");
            echo "<select class='form-control' name='meal_type' id='myInput3' onclick='myFunction3()'>";
            echo '<option value="" selected="selected">All Meal Types</option>';
            while ($row = $result->fetch_assoc()) {

              unset($id, $name);
              $id = $row['id_meal_type'];
              $name = $row['description'];
              echo '<option value="' . $name . '">' . $name . '</option>';
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
              <th hidden>Summits</th>
              <th hidden>Summit Days</th>
              <th hidden>Meal Types</th>
              <th>Participant Name</th>
              <th>Check in Time</th>
            </tr>
          </thead>

          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($meal_attendances as $mt) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td hidden><?= $mt['summit_name']; ?></td>
                <td hidden><?= $mt['sd_name']; ?></td>
                <td hidden><?= $mt['meal_name']; ?></td>
                <td><?= $mt['full_name']; ?></td>
                <td><?= $mt['check_in_time']; ?></td>
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

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

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
      td = tr[i].getElementsByTagName("td")[0];
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

  function myFunction2() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput2");
    filter = input.value.toUpperCase();
    table = document.getElementById("dataTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
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

  function myFunction3() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput3");
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

<!-- End of Main Content -->
<div class="container-fluid">



  <?php echo $this->session->flashdata('message'); ?>



  <!-- DataTales Example -->

  <div class="card shadow mb-4">

    <div class="card-header py-3">

      <div class="row">

        <h6 class="ml-2 mt-2 font-weight-bold text-primary">Participant Payments</h6>

      </div>

    </div>



    <div class="card-body">

      <div class="row" style="padding-bottom: 20px;">

        <div class="col-3">

          <div class="filter-group">

            <?php

            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')

              or die('Cannot connect to db');



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

        <div class="col-3">

          <div class="filter-group">



            <?php

            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')

              or die('Cannot connect to db');



            $result = $conn->query("SELECT description, id_payment_type from payment_types");

            echo "<select class='form-control' name='payment_type' id='myInput2' onclick='myFunction2()'>";

            echo '<option value="" selected="selected">All Payment Types</option>';

            while ($row = $result->fetch_assoc()) {



              unset($id, $name);

              $id = $row['id_payment_type'];

              $name = $row['description'];

              echo '<option value="' . $name . '">' . $name . '</option>';
            }

            echo "</select>"; ?>



          </div>



        </div>

        <div class="col-3">

          <div class="filter-group">



            <?php

            $conn = new mysqli('localhost', 'u1437096_hendra', 'Metamorphose16@', 'u1437096_ybbadminweb_db')

              or die('Cannot connect to db');



            $result = $conn->query("SELECT payment_status, id_payment from payments group by payment_status");

            echo "<select class='form-control' name='payment_status' id='myInput3' onclick='myFunction3()'>";

            echo '<option value="" selected="selected">All Payment Statuses</option>';

            while ($row = $result->fetch_assoc()) {

              switch ($row['payment_status']) {
                case '0':
                  unset($id, $name);
                  $id = $row['id_payment'];
                  $name = "Pending";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
                case '1':
                  unset($id, $name);
                  $id = $row['id_payment'];
                  $name = "Valid";
                  echo '<option value="' . $name . '">' . $name . '</option>';
                  break;
                case '2':
                  unset($id, $name);
                  $id = $row['id_payment'];
                  $name = "Invalid";
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

              <th>Payment Date</th>

              <th>Participant Name</th>

              <th hidden>Summit</th>

              <th hidden>Payment Type</th>
              <th>Email</th>

              <th>Status</th>

              <th>Action</th>

            </tr>

          </thead>



          <tbody>

            <?php $i = 1; ?>

            <?php foreach ($payment as $p) : ?>

              <tr>

                <th scope="row"><?= $i; ?></th>

                <td><?= $p['payment_date']; ?></td>

                <td><?= $p['full_name']; ?></td>

                <td hidden><?= $p['summit']; ?></td>

                <td hidden><?= $p['payment_type']; ?></td>

                <td><?= $p['email']; ?></td>

                <td>

                  <?php switch ($p['payment_status']) {

                    case 0:

                      echo 'Pending';

                      break;

                    case 1:

                      echo 'Valid';

                      break;

                    case 2:

                      echo 'Invalid';

                      break;
                  } ?>

                </td>

                <td>

                  <a href="<?= base_url(); ?>payment/detail/<?= $p['id_payment']; ?>" class="btn btn-info">Detail</a>
                  <a href="<?= base_url(); ?>participant/detail/<?= $p['id_participant']; ?>" class="btn btn-success">View Participant</a>
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

<!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->

<a class="scroll-to-top rounded" href="#page-top">

  <i class="fas fa-angle-up"></i>

</a>



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

  function myFunction3() {

var input, filter, table, tr, td, i, txtValue;

input = document.getElementById("myInput3");

filter = input.value.toUpperCase();

table = document.getElementById("dataTable");

tr = table.getElementsByTagName("tr");

for (i = 0; i < tr.length; i++) {

  td = tr[i].getElementsByTagName("td")[4];

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
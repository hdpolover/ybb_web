<div class="container-fluid">

    <a href="<?= base_url(); ?>summit_content/add_new_content" class="btn btn-primary mb-4">Add Summit Content</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Summit Content Management</h6>
        </div>
        <div class="card-body">
            <div class="row" style="padding-bottom: 20px; padding-left: 20px;">
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th hidden>Summit</th>
                            <th>title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($summit_contents as $sc) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sc['modified_date']; ?></td>
                                <td hidden><?= $sc['summit']; ?></td>
                                <td><?= $sc['title']; ?></td>
                                <td>
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
                                </td>
                                <td>
                                    <a href="<?= base_url(); ?>summit_content/view/<?= $sc['id_summit_content']; ?>" class="btn btn-info">Detail</i></a>
                                    <a href="<?= base_url(); ?>summit_content/edit/<?= $sc['id_summit_content']; ?>" class="btn btn-danger">Edit</i></a>

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
</script>

<!-- End of Main Content -->
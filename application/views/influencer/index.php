<div class="container-fluid">
    <?php echo $this->session->flashdata('message'); ?>

    <a href="<?= base_url(); ?>influencer/add_influencer" class="btn btn-primary mb-4">Add Influencer</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Influencer Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Referral Code</th>
                            <th>Name</th>
                            <th>Referral count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($influencers as $sc) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $sc['referral_code']; ?></td>
                                <td><?= $sc['full_name']; ?></td>
                                <td><?= $sc['referral_count']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>influencer/view/<?= $sc['referral_code']; ?>" class="btn btn-info">Detail</i></a>
                                    <a href="<?= base_url(); ?>influencer/edit/<?= $sc['referral_code']; ?>" class="btn btn-danger">Edit</i></a>
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
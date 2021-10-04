<div class="container-fluid">

    <center>
        <!-- Topbar Search -->
        <br>
        <h4>Search your summit documents</h4>
        <br>
        <form class=" navbar-search" method="post" action="<?= base_url('summit_docs/result'); ?>">
            <div class="input-group">
                <input name="email" type="text" class="form-control bg-light border-0 small" placeholder="Enter your email" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

        <br>
        <?php echo $this->session->flashdata('message'); ?>
    </center>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- End of Main Content -->
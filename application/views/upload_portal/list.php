<div class="container-fluid" style="justify-content: center; display: flex; position: relative; padding-top: 10%;">
    <br>
    <div class="card bg-light text-black shadow">
        <div class="card-header py-3.5">
            <h5 style="color: black; padding-bottom: 0px;"><strong>The 5th Istanbul Youth Summit Agreement Letter Upload Form</strong></h5>
        </div>
        <div class="card-body" style="padding: 20px;">
            <div class="row">
                <p style="color: black; margin-left: 15px;"><?= $full_name; ?></p>
            </div>
            <div class="row">
                <p style="color: black; margin-left: 15px;"><?= $institution; ?></p>
            </div>
            <div class="row" style="padding: 1.5%;">
                <?= form_open_multipart('upload_portal/save_al'); ?>
                <input type="hidden" name="id_participant" value="<?php echo $id_participant; ?>">
                <input type="hidden" name="full_name" value="<?php echo $full_name; ?>">
                <p><strong>Note:</strong> You can upload the agreement letter that has been filled out and signed by clicking the button below. The scanned document must be in the PDF format.</p>
                <br>
                <div class="form-group row">
                    <label for="image" class="col-sm-4 col-form-label">Agreement Letter File</label>
                    <div class="col">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Upload
                        </button>
                    </div>
                    <div class="col-2"></div>
                </div>
                </form>
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>
    <br>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- End of Main Content -->
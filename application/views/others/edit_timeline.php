<div class="container-fluid">

    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Timeline</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('others/update_timeline'); ?>">
                <input type="hidden" name="id_summit_timeline" value="<?php echo $timeline[0]['id_summit_timeline']; ?>">
                <div class="form-group row">
                    <label for="id_summit" class="col-sm-4 col-form-label">Summit</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="id_summit" name="id_summit">
                            <?php foreach ($summit as $s) : ?>
                                <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" name="description" class="form-control" id="description" value="<?= $timeline[0]['timeline_desc']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="timeline" class="col-sm-4 col-form-label">Timeline</label>
                    <div class="col-sm-8">
                        <input type="text" name="timeline" class="form-control" id="timeline" value="<?= $timeline[0]['timeline']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="start_timeline" class="col-sm-4 col-form-label">Start Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="start_timeline" class="form-control" id="start_timeline" value="<?= $timeline[0]['start_timeline']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="end_timeline" class="col-sm-4 col-form-label">End Date</label>
                    <div class="col-sm-8">
                        <input type="date" name="end_timeline" class="form-control" id="end_timeline" value="<?= $timeline[0]['end_timeline']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col">
                        <div class="text-align-right">
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Update
                            </button>
                        </div>
                    </div>
                </div>

        </div>
    </div>
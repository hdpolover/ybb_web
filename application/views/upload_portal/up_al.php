<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Upload Agreement Letter</h6>
    </div>
    <div class="card-body">
      <?= form_open_multipart('upload_portal/save_al'); ?>

      <div class="form-group row">
        <label for="desc" class="col-sm-4 col-form-label">Summit</label>
        <div class="col-sm-8">
          <select class="form-control" id="summit" name="summit">
            <?php foreach ($summit as $s) : ?>
              <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label for="desc" class="col-sm-4 col-form-label">Title</label>
        <div class="col-sm-8">
          <input type="text" name="title" class="form-control" id="title">
        </div>
      </div>
      <div class="form-group row">
        <label for="desc" class="col-sm-4 col-form-label">Description</label>
        <div class="col">
          <!-- <input type="text" name="desc" class="form-control" id="desc"> -->
          <textarea rows="8" class="form-control" cols="60" name="desc" placeholder="Enter description"></textarea>
        </div>
      </div>
      <div class="form-group row">
        <label for="image" class="col-sm-4 col-form-label">Content file</label>
        <div class="col">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="desc" class="col-sm-4 col-form-label">Content Status</label>
        <div class="col-sm-8">
          <select class="form-control" id="status" name="status">
            <option value="0">Draft</option>
            <option value="1">Published</option>
            <option value="2">Archived</option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-4"></div>
        <div class="col align-self-end">
          <button type="submit" class="btn btn-primary btn-user btn-block">
            Create Content
          </button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <script type="application/javascript">
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>
<div class="container-fluid">

  <?php echo $this->session->flashdata('message'); ?>

  <!-- Basic Card Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Edit Summit Content</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <p><b>Note:</b> You can't edit the content's file. If you want to change the file, archive the content and make a new content with the wanted file.</p>
        </div>
      </div>
      <form method="post" action="<?= base_url('summit_content/save_edit'); ?>">
        <input type="hidden" name="id_summit_content" value="<?php echo $summit_content[0]['id_summit_content']; ?>">
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label">Summit</label>
          <div class="col-sm-8">
            <select class="form-control" id="id_summit" name="id_summit">
              <?php foreach ($summit as $s) : ?>
                <option value="<?php echo $s['id_summit']; ?>"><?php echo $s['description']; ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="desc" class="col-sm-4 col-form-label">Title</label>
          <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" value="<?= $summit_content[0]['title']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="description" class="col-sm-4 col-form-label">Description</label>
          <div class="col">
            <!-- <input type="text" name="desc" class="form-control" id="desc"> -->
            <textarea rows="8" class="form-control" cols="60" name="description" id="description" placeholder="<?= $summit_content[0]['description']; ?>" value=" <?= $summit_content[0]['description']; ?>"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="file" class="col-sm-4 col-form-label">Content file</label>
          <div class="col">
            <input type="text" name="file" class="form-control" id="file" value="<?= $summit_content[0]['file_path']; ?>" disabled>
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
              Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
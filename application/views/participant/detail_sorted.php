<div class="container-fluid">
  <!--photo,full_name,birthdate, gender, address, nationality, occupation, field_of_study, institution, emergency_contact
  wa_number,ig_account,tshirt_size, disease_history,contact_relation,is_vegetarian,subtheme,(essay,social_project,talents,achievements,experiences)
  know_program_from, source_account_name, vide_link-->
  <!-- Page Heading -->

  <div class="row">
    <div class="col">
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary"><?= $participants[0]['full_name']; ?>'s Details</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse collapse" id="collapseCardExample">
          <div class="card-body">
            <?php foreach ($participants as $p) : ?>
              <div>
                <img src="<?= base_url('assets/img/profile/participants/') . $p['photo']; ?>" class="card-img border" style="width: 30%; height: 30%; display:block;
    margin:auto;">
              </div>
              </br>
              <div class="row">
                <div class="col">
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Full Name</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['full_name']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Gender</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['gender']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Birthdate</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['birthdate']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Address</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['address']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Nationality</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['nationality']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Occupation</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['occupation']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Field of Study</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['field_of_study']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Institution</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['institution']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Whatsapp Number</p>
                    </div>
                    <div class="col">
                      <a href="https://api.whatsapp.com/send?phone=<?= $p['wa_number']; ?>" target="_blank"><?= $p['wa_number']; ?></a>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Emergency Contact</p>
                    </div>
                    <div class="col">
                      <a href="https://api.whatsapp.com/send?phone=<?= $p['emergency_contact']; ?>" target="_blank"><?= $p['emergency_contact']; ?></a>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Contact Relation</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['contact_relation']; ?></p>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Tshirt Size</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['tshirt_size']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Disease History</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['disease_history']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Vegetarian</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;">
                        <?php
                        if ($p['is_vegetarian'] == 0) {
                          echo "No";
                        } else {
                          echo "Yes";
                        } ?></p>
                    </div>
                  </div>

                  <div class="row style=" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Instagram</p>
                    </div>
                    <div class="col">
                      <a href="https://instagram.com/<?= $p['ig_account']; ?>" target="_blank">@<?= $p['ig_account']; ?></a>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Known Program From</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['know_program_from']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Source Account</p>
                    </div>
                    <div class="col">
                      <p class="card-text" style="color: black;"><?= $p['source_account_name']; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Motivation Video Link</p>
                    </div>
                    <div class="col">
                      <a href="https://<?php echo $p['video_link']; ?>" target="_blank"><?= $p['video_link']; ?></a>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 10px;">
                    <div class="col">
                      <p class="card-text" style="color: black; font-weight: bold;">Referral Code</p>
                    </div>
                    <div class="col">
                      <?php if ($p['referral_code'] == "-") { ?>
                        <p class="card-text" style="color: black;"><?= $p['referral_code']; ?></p>

                      <?php } else { ?>
                        <a href="<?php echo base_url('influencer/view/' . $p['referral_code']); ?>" target="_blank"><?= $p['referral_code']; ?></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>

      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
          <h6 class="m-0 font-weight-bold text-primary">Other details</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardExample1">
          <div class="card-body">
            <?php foreach ($participants as $p) : ?>
              </br>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                  <p class="card-text" style="color: black; font-weight: bold;">Chosen Sub-theme</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['subtheme']; ?></p>
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                  <p class="card-text" style="color: black; font-weight: bold;">Essay</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['essay']; ?></p>
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                  <p class="card-text" style="color: black; font-weight: bold;">Social Project</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['social_projects']; ?></p>
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                  <p class="card-text" style="color: black; font-weight: bold;">Talents</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['talents']; ?></p>
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col">
                  <p class="card-text" style="color: black; font-weight: bold;">Achievements</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['achievements']; ?></p>
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-4">
                  <p class="card-text" style="color: black; font-weight: bold;">Experiences</p>
                </div>
                <div class="col-8">
                  <p class="card-text" style="color: black;"><?= $p['experiences']; ?></p>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
      <!-- Circle Buttons -->


    </div>
    <!-- Split Buttons -->
  </div>

</div>
<!-- /.container-fluid -->

</div>
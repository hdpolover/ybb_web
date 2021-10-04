<div class="container-fluid">
                    <!-- Page Heading -->

                    <h1 class="h3 mb-4 text-gray-800"><?= $title?></h1>

                    <div class="row">

                        <div class="col">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Participant Detail</h6>
                                </div>
                                <div class="card-body">
                                  <form action="" method="post">
                                      <?php foreach ($participant as $p): ?>
                                        <input type="hidden" name="id" value="<?= $p['id_participant']; ?>">
                                        <input type="hidden" name="id_detail" value="<?= $p['id_participant_detail']; ?>">
                                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $p['photo'] ).'">';  ?>
                                        <div class="row">
                                          <div class="col">
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Participant Name</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="fullname" class="form-control card-text" id="fullname" style="color: black;" value="<?= $p['full_name']; ?>">
                                              <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Gender</p>
                                            </div>
                                            <div class="col">
                                              <select name="gender" class="form-control" id="gender" style="color: black;">
                                                <?php foreach( $gender as $g ) : ?>
                                                    <?php if( $g == $p['gender'] ) : ?>
                                                        <option value="<?= $g; ?>" selected><?= $g; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $g; ?>"><?= $g; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Birth Date</p>
                                            </div>
                                            <div class="col">
                                              <input type="date" name="birthdate" class="form-control" id="birthdate" style="color: black;" value="<?= $p['birthdate']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Address</p>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="address" class="form-control card-text" id="address" style="color: black;" value="<?= $p['address']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Nationality</p>
                                            </div>
                                            <div class="col">
                                              <!-- <input type="text" name="nationality" class="form-control card-text" id="nationality" style="color: black;" value="<?= $p['nationality']; ?>"> -->
                                              <select style="color: black;" name="nationality" class="form-control" id="nationality">
                                                <option value="<?= $p['nationality']; ?>" selected><?= $p['nationality']; ?></option>
                                                <option value="Afganistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bonaire">Bonaire</option>
                                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                <option value="Brunei">Brunei</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Canary Islands">Canary Islands</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Channel Islands">Channel Islands</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Island">Cocos Island</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote DIvoire">Cote D'Ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curaco">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="East Timor">East Timor</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands">Falkland Islands</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Ter">French Southern Ter</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Great Britain">Great Britain</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea North">Korea North</option>
                                                <option value="Korea Sout">Korea South</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Midway Islands">Midway Islands</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Nambia">Nambia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherland Antilles">Netherland Antilles</option>
                                                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                <option value="Nevis">Nevis</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau Island">Palau Island</option>
                                                <option value="Palestine">Palestine</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Phillipines">Philippines</option>
                                                <option value="Pitcairn Island">Pitcairn Island</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                <option value="Republic of Serbia">Republic of Serbia</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="St Barthelemy">St Barthelemy</option>
                                                <option value="St Eustatius">St Eustatius</option>
                                                <option value="St Helena">St Helena</option>
                                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                <option value="St Lucia">St Lucia</option>
                                                <option value="St Maarten">St Maarten</option>
                                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                                <option value="Saipan">Saipan</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="Samoa American">Samoa American</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Tahiti">Tahiti</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Erimates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States of America">United States of America</option>
                                                <option value="Uraguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Vatican City State">Vatican City State</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                <option value="Wake Island">Wake Island</option>
                                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zaire">Zaire</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Occupation</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="occupation" class="form-control card-text" id="occupation" style="color: black;" value="<?= $p['occupation']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Field of Study</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="field" class="form-control card-text" id="field" style="color: black;" value="<?= $p['field_of_study']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Institution</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="institution" class="form-control card-text" id="institution" style="color: black;" value="<?= $p['institution']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Emergency Contact</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="emergency" class="form-control card-text" id="emergency" style="color: black;" value="<?= $p['emergency_contact']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Whatsapp Number</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="wa" class="form-control card-text" id="wa" style="color: black;" value="<?= $p['wa_number']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Instagram Account</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="ig" class="form-control card-text" id="ig" style="color: black;" value="<?= $p['ig_account']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Tshirt Size</p>
                                            </div>
                                            <div class="col">
                                              <select name="tshirt" class="form-control card-text" id="tshirt" style="color: black;">
                                                <?php foreach( $tshirt as $t ) : ?>
                                                    <?php if( $t == $p['tshirt_size'] ) : ?>
                                                        <option value="<?= $t; ?>" selected><?= $t; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $t; ?>"><?= $t; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Disease History</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="disease" class="form-control card-text" id="disease" style="color: black;" value="<?= $p['disease_history']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Contact Relation</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="relation" class="form-control card-text" id="relation" style="color: black;" value="<?= $p['contact_relation']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Vegetarian</p>
                                            </div>
                                            <div class="col">
                                              <select name="vegetarian" class="form-control card-text" id="vegetarian" style="color: black;">
                                                <?php foreach( $veget as $v ) : ?>
                                                <?php if( $v == $p['is_vegetarian'] ) : ?>
                                                    <option value="<?php if ($p['is_vegetarian'] == 0) {
                                                        $v = "No";
                                                      }else{
                                                        $v =  "Yes";
                                                      }?>" selected><?= $v; ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $v; ?>"><?php if ($v == 1) {
                                                        echo "Yes";
                                                      }else{
                                                        echo "No";
                                                      }?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Subtheme</p>
                                            </div>
                                            <div class="col">
                                              <select name="subtheme" class="form-control card-text" id="subtheme" style="color: black;">
                                                <?php foreach( $subtheme as $s ) : ?>
                                                    <?php if( $s == $p['subtheme'] ) : ?>
                                                        <option value="<?= $s; ?>" selected><?= $s; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $s; ?>"><?= $s; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Know Program From</p>
                                            </div>
                                            <div class="col">
                                              <select name="know" class="form-control card-text" id="know" style="color: black;">
                                                <?php foreach( $program as $pr ) : ?>
                                                    <?php if( $pr == $p['know_program_from'] ) : ?>
                                                        <option value="<?= $pr; ?>" selected><?= $pr; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $pr; ?>"><?= $pr; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                              </select>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Source Account</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="source" class="form-control card-text" id="source" style="color: black;" value="<?= $p['source_account_name']; ?>">
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Link Video</p>
                                            </div>
                                            <div class="col">
                                              <input type="text" name="videolink" class="form-control card-text" id="videolink" style="color: black;" value="<?= $p['video_link']; ?>">
                                            </div>
                                          </div>
                                        </div>

                                      </div>
                                      <div class="col">
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Essay</p>
                                            </div>
                                            <div class="col">
                                              <textarea type="text" name="essay" class="form-control card-text" id="essay" style="height:200px" style="color: black;" value="<?= $p['essay']; ?>"><?= $p['essay']; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Social Project</p>
                                            </div>
                                            <div class="col">
                                              <textarea type="text" name="social" class="form-control card-text" id="social" style="height:200px" style="color: black;" value="<?= $p['social_projects']; ?>"><?= $p['social_projects']; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Talents</p>
                                            </div>
                                            <div class="col">
                                              <textarea type="text" name="talents" class="form-control card-text" id="talents" style="height:200px" style="color: black;" value="<?= $p['talents']; ?>"><?= $p['talents']; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Achievements</p>
                                            </div>
                                            <div class="col">
                                              <textarea type="text" name="achievements" class="form-control card-text" id="achievements" style="height:200px" style="color: black;" value="<?= $p['achievements']; ?>"><?= $p['achievements']; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="row">
                                            <div class="col">
                                              <p class="card-text" style="color: black;">Experiences</p>
                                            </div>
                                            <div class="col">
                                              <textarea type="text" name="experiences" class="form-control card-text" id="experiences" style="height:200px" style="color: black;" value="<?= $p['experiences']; ?>"><?= $p['experiences']; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                  </div>
                                  <?php endforeach ?>

                                  <a href="<?= base_url(); ?>participant" class="btn btn-primary mt-2">Kembali</a>
                                  <button type="submit" name="save" class="btn btn-danger mt-2">Save</button>
                                </form>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->

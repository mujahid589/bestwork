
      <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content text-left">
            <div class="modal-header">
            <h4>Add New Language</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Choose Language</label>
                    <select class="form-control" required name="language" id="lang">
                      <option value="">Select Language</option>
                      <option value="Afrikaans">Afrikaans</option>
                          <option value="Albanian">Albanian</option>
                          <option value="Arabic">Arabic</option>
                          <option value="Armenian">Armenian</option>
                          <option value="Basque">Basque</option>
                          <option value="Bengali">Bengali</option>
                          <option value="Bulgarian">Bulgarian</option>
                          <option value="Catalan">Catalan</option>
                          <option value="Cambodian">Cambodian</option>
                          <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                          <option value="Croatian">Croatian</option>
                          <option value="Czech">Czech</option>
                          <option value="Danish">Danish</option>
                          <option value="Dutch">Dutch</option>
                          <option value="English">English</option>
                          <option value="Estonian">Estonian</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finnish">Finnish</option>
                          <option value="French">French</option>
                          <option value="Georgian">Georgian</option>
                          <option value="German">German</option>
                          <option value="Greek">Greek</option>
                          <option value="Gujarati">Gujarati</option>
                          <option value="Hebrew">Hebrew</option>
                          <option value="Hindi">Hindi</option>
                          <option value="Hungarian">Hungarian</option>
                          <option value="Icelandic">Icelandic</option>
                          <option value="Indonesian">Indonesian</option>
                          <option value="Irish">Irish</option>
                          <option value="Italian">Italian</option>
                          <option value="Japanese">Japanese</option>
                          <option value="Javanese">Javanese</option>
                          <option value="Korean">Korean</option>
                          <option value="Latin">Latin</option>
                          <option value="Latvian">Latvian</option>
                          <option value="Lithuanian">Lithuanian</option>
                          <option value="Macedonian">Macedonian</option>
                          <option value="Malay">Malay</option>
                          <option value="Malayalam">Malayalam</option>
                          <option value="Maltese">Maltese</option>
                          <option value="Maori">Maori</option>
                          <option value="Marathi">Marathi</option>
                          <option value="Mongolian">Mongolian</option>
                          <option value="Nepali">Nepali</option>
                          <option value="Norwegian">Norwegian</option>
                          <option value="Persian">Persian</option>
                          <option value="Polish">Polish</option>
                          <option value="Portuguese">Portuguese</option>
                          <option value="Punjabi">Punjabi</option>
                          <option value="Quechua">Quechua</option>
                          <option value="Romanian">Romanian</option>
                          <option value="Russian">Russian</option>
                          <option value="Samoan">Samoan</option>
                          <option value="Serbian">Serbian</option>
                          <option value="Slovak">Slovak</option>
                          <option value="Slovenian">Slovenian</option>
                          <option value="Spanish">Spanish</option>
                          <option value="Swahili">Swahili</option>
                          <option value="Swedish ">Swedish </option>
                          <option value="Tamil">Tamil</option>
                          <option value="Tatar">Tatar</option>
                          <option value="Telugu">Telugu</option>
                          <option value="Thai">Thai</option>
                          <option value="Tibetan">Tibetan</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Turkish">Turkish</option>
                          <option value="Ukrainian">Ukrainian</option>
                          <option value="Urdu">Urdu</option>
                          <option value="Uzbek">Uzbek</option>
                          <option value="Vietnamese">Vietnamese</option>
                          <option value="Welsh">Welsh</option>
                          <option value="Xhosa">Xhosa</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Choose Level</label>

                      <select class="form-control" required name="level" id="level">
                        <option value="">Select Level</option>
                        <option value="Basic">Basic</option>
                        <option value="Fluent">Fluent</option>
                        <option value="Native">Native</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <span id="lang-error"></span>
                  <button class="blue_btn" id="lang-btn" onclick="addLanguage(<?php echo $pid ?>)">Add Language</button>
                </div>
                <div class="clearfix">

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>



            <!-- Modal to Add Experience-->
            <div class="modal fade" id="addexp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                  <div class="modal-header">
                  <h4>Add Professional Experience</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Experience Title</label>
                          <input type="text" name="exptitle" class="form-control" id="exptitle" placeholder="Web Developer..." value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Company</label>
                          <input type="text" name="expcompany" class="form-control" id="expcompany" placeholder="Microsoft.." value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Location</label>
                          <input type="text" name="exploc" class="form-control" id="exploc" placeholder="Location" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Start Date</label>
                          <input type="date" name="expst" class="form-control" id="expst" placeholder="Start Date" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>End Date</label>
                          <input type="date" name="exped" class="form-control" id="exped" placeholder="End Date" value="">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <textarea name="desc" class="form-control" id="expdesc"></textarea>
                      </div>

                      <div class="col-md-12">
                        <br>
                        <span id="exp-error"></span>
                        <button class="blue_btn" id="exp-btn" onclick="addExperience(<?php echo $pid ?>)">Add Experience</button>
                      </div>
                      <div class="clearfix">

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>


<!-- Add Qualification  Modal -->

            <div class="modal fade" id="addQual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content text-left">
                  <div class="modal-header">
                  <h4>Add Professional Experience</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                  <div class="modal-body">
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label>University</label>
                          <input type="text" name="university" id="university" class="form-control" placeholder="Enter University Name">
                        </div>
                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label>Date from</label>
                          <input type="date" name="datefrom" id="qdatefrom" class="form-control" placeholder="Degree Started On">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Date To</label>
                          <input type="date" name="dateto" id="qdateto" class="form-control input-sm" placeholder="Degree Ended On">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Area of Study</label>
                          <input type="<text" name="aos" id="aos" class="form-control input-sm" placeholder="Area Of Study">
                        </div>
                      </div>
                      <div class="col-md-12">

                        <div class="form-group">
                          <label>Description</label>
                        <textarea id="qdesc" class="form-control input-sm" placeholder="Description of Degree"></textarea >
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="alert hidden" id="msgq">

                        </div>
                          <div class="form-group">
                            <input type="button" value="Add Qualification" class="blue_btn" id="addq">
                          </div>
                        </div>


                    </div>
                  </div>

                </div>
              </div>
            </div>




            <!-- Add Certification  Modal -->

                        <div class="modal fade" id="addCert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content text-left">
                              <div class="modal-header">
                              <h4>Add Professional Experience</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                              <div class="modal-body">
                                <div class="row">


                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <input type="text" name="name" id="namec" class="form-control input-sm" placeholder="Name of Certification">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="" id="orgc" class="form-control input-sm" placeholder="Certification Organization">
                                    </div>
                                  </div>
                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                      <input type="date" name="date" id="awardedon" class="form-control input-sm" placeholder="Awarded On">
                                    </div>
                                    <div class="form-group">
                                      <input type="text" name="" id="linkc" class="form-control input-sm" placeholder="link">
                                    </div>

                                  </div>
                                  <div class="col-md-12">
                                    <div class="alert hidden" id="msgc">

                                    </div>

                                    <div class="form-group">
                                    <input type="button" value="Add Certification" class="blue_btn" id="addc">
                                    </div>
                                  </div>


                                </div>
                              </div>

                            </div>
                          </div>
                        </div>

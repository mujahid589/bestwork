
<div class="container">
<div class="row">
<?php
    if($client['status']==0){?>
    <div class="col-md-12 ">
        <div class="_card text-left">
            Complete your profile and update all required details to continue next.
        </div>
    </div>

    <?php
    }
    else if($client['status']==1){
    ?>
    <div class="col-md-12 ">
    <div class="_card text-left">
        <p>
        You have filled out your all required details and your profile is ready to be submitted for review.
        </p>
        <form method="post">
            <button type="submit" name="approval"  class="blue_btn">Submit Profile for Review</button>
        </form>
    </div>
    </div>
    <?php
    }
    else   if($client['status']==3){
        ?>


                        <div class="col-md-12 ">
                            <div class="_card text-left">
                                <p>
                                    <i class="fa fa-times text-danger" style="font-size:22px;margin-top:5px" ></i>
                                    Your Profile was declined. Please update your information and try again
                                </p>
                                <form method="post">
                                    <button type="submit" name="approval"  class="blue_btn">Submit Profile for Review</button>
                                </form>
                            </div>
                        </div>



        <?php
    }
    ?>
<div class="col-md-9">
<div class="_card text-left">
<h2>
Welcome <?php echo $user['name'] ?> !
</h2>
    <form method="post" id="updprofile">
<p>
Let's Complete Your Profile

</p>
        <div class="alert alert-danger hidden" id="validerror">
        </div>
        <?php
        if($msg!=""){
            echo $msg;
        }
        ?>
<div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label >Company Name</label>
    <input type="text" name="cname" id="cname" placeholder="Microsoft.." class="form-control" value="<?php echo $client['name'];?>">
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label>Country</label>
      <select class="form-control" id="country" name="country">
          <option value="">Select Your Country</option>
          <option value="Afghanistan">Afghanistan</option>
          <option value="Åland Islands" <?php if($client['country']=="Åland Islands"){echo "selected";} ?>>Åland Islands</option>
          <option value="Albania" <?php if($client['country']=="Albania"){echo "selected";} ?>>Albania</option>
          <option value="Algeria" <?php if($client['country']=="Algeria"){echo "selected";} ?>>Algeria</option>
          <option value="American Samoa" <?php if($client['country']=="American Samoa"){echo "selected";} ?>>American Samoa</option>
          <option value="Andorra" <?php if($client['country']=="Andorra"){echo "selected";} ?>>Andorra</option>
          <option value="Angola" <?php if($client['country']=="Angola"){echo "selected";} ?>>Angola</option>
          <option value="Anguilla" <?php if($client['country']=="Anguilla"){echo "selected";} ?>>Anguilla</option>
          <option value="Antarctica" <?php if($client['country']=="Antarctica"){echo "selected";} ?>>Antarctica</option>
          <option value="Antigua and Barbuda" <?php if($client['country']=="Antigua and Barbuda"){echo "selected";} ?>>Antigua and Barbuda</option>
          <option value="Argentina" <?php if($client['country']=="Argentina"){echo "selected";} ?>>Argentina</option>
          <option value="Armenia" <?php if($client['country']=="Armenia"){echo "selected";} ?>>Armenia</option>
          <option value="Aruba" <?php if($client['country']=="Aruba"){echo "selected";} ?>>Aruba</option>
          <option value="Australia" <?php if($client['country']=="Australia"){echo "selected";} ?>>Australia</option>
          <option value="Austria" <?php if($client['country']=="Austria"){echo "selected";} ?>>Austria</option>
          <option value="Azerbaijan" <?php if($client['country']=="Azerbaijan"){echo "selected";} ?>>Azerbaijan</option>
          <option value="Bahamas" <?php if($client['country']=="Bahamas"){echo "selected";} ?>>Bahamas</option>
          <option value="Bahrain" <?php if($client['country']=="Bahrain"){echo "selected";} ?>>Bahrain</option>
          <option value="Bangladesh" <?php if($client['country']=="Bangladesh"){echo "selected";} ?>>Bangladesh</option>
          <option value="Barbados" <?php if($client['country']=="Barbados"){echo "selected";} ?>>Barbados</option>
          <option value="Belarus" <?php if($client['country']=="Belarus"){echo "selected";} ?>>Belarus</option>
          <option value="Belgium" <?php if($client['country']=="Belgium"){echo "selected";} ?>>Belgium</option>
          <option value="Belize" <?php if($client['country']=="Belize"){echo "selected";} ?>>Belize</option>
          <option value="Benin" <?php if($client['country']=="Benin"){echo "selected";} ?>>Benin</option>
          <option value="Bermuda" <?php if($client['country']=="Bermuda"){echo "selected";} ?>>Bermuda</option>
          <option value="Bhutan" <?php if($client['country']=="Bhutan"){echo "selected";} ?>>Bhutan</option>
          <option value="Bolivia" <?php if($client['country']=="Bolivia"){echo "selected";} ?>>Bolivia</option>
          <option value="Bosnia and Herzegovina" <?php if($client['country']=="Bosnia and Herzegovina"){echo "selected";} ?>>Bosnia and Herzegovina</option>
          <option value="Botswana" <?php if($client['country']=="Botswana"){echo "selected";} ?>>Botswana</option>
          <option value="Bouvet Island" <?php if($client['country']=="Bouvet Island"){echo "selected";} ?>>Bouvet Island</option>
          <option value="Brazil" <?php if($client['country']=="Brazil"){echo "selected";} ?>>Brazil</option>
          <option value="British Indian Ocean Territory" <?php if($client['country']=="British Indian Ocean Territory"){echo "selected";} ?>>British Indian Ocean Territory</option>
          <option value="Brunei Darussalam" <?php if($client['country']=="Brunei Darussalam"){echo "selected";} ?>>Brunei Darussalam</option>
          <option value="Bulgaria" <?php if($client['country']=="Bulgaria"){echo "selected";} ?>>Bulgaria</option>
          <option value="Burkina Faso" <?php if($client['country']=="Burkina Faso"){echo "selected";} ?>>Burkina Faso</option>
          <option value="Burundi" <?php if($client['country']=="Burundi"){echo "selected";} ?>>Burundi</option>
          <option value="Cambodia" <?php if($client['country']=="Cambodia"){echo "selected";} ?>>Cambodia</option>
          <option value="Cameroon" <?php if($client['country']=="Cameroon"){echo "selected";} ?>>Cameroon</option>
          <option value="Canada" <?php if($client['country']=="Canada"){echo "selected";} ?>>Canada</option>
          <option value="Cape Verde" <?php if($client['country']=="Cape Verde"){echo "selected";} ?>>Cape Verde</option>
          <option value="Cayman Islands" <?php if($client['country']=="Cayman Islands"){echo "selected";} ?>>Cayman Islands</option>
          <option value="Central African Republic" <?php if($client['country']=="Central African Republic"){echo "selected";} ?>>Central African Republic</option>
          <option value="Chad" <?php if($client['country']=="Chad"){echo "selected";} ?>>Chad</option>
          <option value="Chile" <?php if($client['country']=="Chile"){echo "selected";} ?>>Chile</option>
          <option value="China" <?php if($client['country']=="China"){echo "selected";} ?>>China</option>
          <option value="Christmas Island" <?php if($client['country']=="Christmas Island"){echo "selected";} ?>>Christmas Island</option>
          <option value="Cocos (Keeling) Islands" <?php if($client['country']=="Cocos (Keeling) Islands"){echo "selected";} ?>>Cocos (Keeling) Islands</option>
          <option value="Colombia" <?php if($client['country']=="Colombia"){echo "selected";} ?>>Colombia</option>
          <option value="Comoros" <?php if($client['country']=="Comoros"){echo "selected";} ?>>Comoros</option>
          <option value="Congo" <?php if($client['country']=="Congo"){echo "selected";} ?>>Congo</option>
          <option value="The Democratic Republic of The Congo" <?php if($client['country']=="The Democratic Republic of The Congo"){echo "selected";} ?>>Congo, The Democratic Republic of The</option>
          <option value="Cook Islands" <?php if($client['country']=="Cook Islands"){echo "selected";} ?>>Cook Islands</option>
          <option value="Costa Rica" <?php if($client['country']=="Costa Rica"){echo "selected";} ?>>Costa Rica</option>
          <option value="Cote D'ivoire" <?php if($client['country']=="Cote D'ivoire"){echo "selected";} ?>>Cote D'ivoire</option>
          <option value="Croatia" <?php if($client['country']=="Croatia"){echo "selected";} ?>>Croatia</option>
          <option value="Cuba" <?php if($client['country']=="Cuba"){echo "selected";} ?>>Cuba</option>
          <option value="Cyprus" <?php if($client['country']=="Cyprus"){echo "selected";} ?>>Cyprus</option>
          <option value="Czech Republic" <?php if($client['country']=="Czech Republic"){echo "selected";} ?>>Czech Republic</option>
          <option value="Denmark" <?php if($client['country']=="Denmark"){echo "selected";} ?>>Denmark</option>
          <option value="Djibouti" <?php if($client['country']=="Djibouti"){echo "selected";} ?>>Djibouti</option>
          <option value="Dominica" <?php if($client['country']=="Dominica"){echo "selected";} ?>>Dominica</option>
          <option value="Dominican Republic" <?php if($client['country']=="Dominican"){echo "selected";} ?>>Dominican Republic</option>
          <option value="Ecuador" <?php if($client['country']=="Ecuador"){echo "selected";} ?>>Ecuador</option>
          <option value="Egypt" <?php if($client['country']=="Egypt"){echo "selected";} ?>>Egypt</option>
          <option value="El Salvador" <?php if($client['country']=="El Salvador"){echo "selected";} ?>>El Salvador</option>
          <option value="Equatorial Guinea" <?php if($client['country']=="Equatorial Guinea"){echo "selected";} ?>>Equatorial Guinea</option>
          <option value="Eritrea" <?php if($client['country']=="Eritrea"){echo "selected";} ?>>Eritrea</option>
          <option value="Estonia" <?php if($client['country']=="Estonia"){echo "selected";} ?>>Estonia</option>
          <option value="Ethiopia" <?php if($client['country']=="Ethiopia"){echo "selected";} ?>>Ethiopia</option>
          <option value="Falkland Islands (Malvinas)" <?php if($client['country']=="Falkland Islands (Malvinas)"){echo "selected";} ?>>Falkland Islands (Malvinas)</option>
          <option value="Faroe Islands" <?php if($client['country']=="Faroe Islands"){echo "selected";} ?>>Faroe Islands</option>
          <option value="Fiji" <?php if($client['country']=="Fiji"){echo "selected";} ?>>Fiji</option>
          <option value="Finland" <?php if($client['country']=="Finland"){echo "selected";} ?>>Finland</option>
          <option value="France" <?php if($client['country']=="France"){echo "selected";} ?>>France</option>
          <option value="French Guiana" <?php if($client['country']=="French Guiana"){echo "selected";} ?>>French Guiana</option>
          <option value="French Polynesia" <?php if($client['country']=="French Polynesia"){echo "selected";} ?>>French Polynesia</option>
          <option value="French Southern Territories" <?php if($client['country']=="French Southern Territories"){echo "selected";} ?>>French Southern Territories</option>
          <option value="Gabon" <?php if($client['country']=="Gabon"){echo "selected";} ?>>Gabon</option>
          <option value="Gambia" <?php if($client['country']=="Gambia"){echo "selected";} ?>>Gambia</option>
          <option value="Georgia" <?php if($client['country']=="Georgia"){echo "selected";} ?>>Georgia</option>
          <option value="Germany" <?php if($client['country']=="Germany"){echo "selected";} ?>>Germany</option>
          <option value="Ghana" <?php if($client['country']=="Ghana"){echo "selected";} ?>>Ghana</option>
          <option value="Gibraltar" <?php if($client['country']=="Gibraltar"){echo "selected";} ?>>Gibraltar</option>
          <option value="Greece" <?php if($client['country']=="Greece"){echo "selected";} ?>>Greece</option>
          <option value="Greenland" <?php if($client['country']=="Greenland"){echo "selected";} ?>>Greenland</option>
          <option value="Grenada" <?php if($client['country']=="Grenada"){echo "selected";} ?>>Grenada</option>
          <option value="Guadeloupe" <?php if($client['country']=="Guadeloupe"){echo "selected";} ?>>Guadeloupe</option>
          <option value="Guam" <?php if($client['country']=="Guam"){echo "selected";} ?>>Guam</option>
          <option value="Guatemala" <?php if($client['country']=="Guatemala"){echo "selected";} ?>>Guatemala</option>
          <option value="Guernsey" <?php if($client['country']=="Guernsey"){echo "selected";} ?>>Guernsey</option>
          <option value="Guinea" <?php if($client['country']=="Guinea"){echo "selected";} ?>>Guinea</option>
          <option value="Guinea-bissau" <?php if($client['country']=="Guinea-bissau"){echo "selected";} ?>>Guinea-bissau</option>
          <option value="Guyana" <?php if($client['country']=="Guyana"){echo "selected";} ?>>Guyana</option>
          <option value="Haiti" <?php if($client['country']=="Haiti"){echo "selected";} ?>>Haiti</option>
          <option value="Heard Island and Mcdonald Islands" <?php if($client['country']=="Heard Island and Mcdonald Islands"){echo "selected";} ?>>Heard Island and Mcdonald Islands</option>
          <option value="Holy See (Vatican City State)" <?php if($client['country']=="Holy See (Vatican City State)"){echo "selected";} ?>>Holy See (Vatican City State)</option>
          <option value="Honduras" <?php if($client['country']=="Honduras"){echo "selected";} ?>>Honduras</option>
          <option value="Hong Kong" <?php if($client['country']=="Hong Kong"){echo "selected";} ?>>Hong Kong</option>
          <option value="Hungary" <?php if($client['country']=="Hungary"){echo "selected";} ?>>Hungary</option>
          <option value="Iceland" <?php if($client['country']=="Iceland"){echo "selected";} ?>>Iceland</option>
          <option value="India" <?php if($client['country']=="India"){echo "selected";} ?>>India</option>
          <option value="Indonesia" <?php if($client['country']=="Indonesia"){echo "selected";} ?>>Indonesia</option>
          <option value="Iran, Islamic Republic of" <?php if($client['country']=="Iran, Islamic Republic of"){echo "selected";} ?>>Iran, Islamic Republic of</option>
          <option value="Iraq" <?php if($client['country']=="Iraq"){echo "selected";} ?>>Iraq</option>
          <option value="Ireland" <?php if($client['country']=="Ireland"){echo "selected";} ?>>Ireland</option>
          <option value="Isle of Man" <?php if($client['country']=="Isle of Man"){echo "selected";} ?>>Isle of Man</option>
          <option value="Israel" <?php if($client['country']=="Israel"){echo "selected";} ?>>Israel</option>
          <option value="Italy" <?php if($client['country']=="Italy"){echo "selected";} ?>>Italy</option>
          <option value="Jamaica" <?php if($client['country']=="Jamaica"){echo "selected";} ?>>Jamaica</option>
          <option value="Japan" <?php if($client['country']=="Japan"){echo "selected";} ?>>Japan</option>
          <option value="Jersey" <?php if($client['country']=="Jersey"){echo "selected";} ?>>Jersey</option>
          <option value="Jordan" <?php if($client['country']=="Jordan"){echo "selected";} ?>>Jordan</option>
          <option value="Kazakhstan" <?php if($client['country']=="Kazakhstan"){echo "selected";} ?>>Kazakhstan</option>
          <option value="Kenya" <?php if($client['country']=="Kenya"){echo "selected";} ?>>Kenya</option>
          <option value="Kiribati" <?php if($client['country']=="Kiribati"){echo "selected";} ?>>Kiribati</option>
          <option value="Korea, Democratic People's Republic of" <?php if($client['country']=="Korea, Democratic People's Republic of"){echo "selected";} ?>>Korea, Democratic People's Republic of</option>
          <option value="Korea, Republic of" <?php if($client['country']=="Korea, Republic of"){echo "selected";} ?>>Korea, Republic of</option>
          <option value="Kuwait" <?php if($client['country']=="Kuwait"){echo "selected";} ?>>Kuwait</option>
          <option value="Kyrgyzstan" <?php if($client['country']=="Kyrgyzstan"){echo "selected";} ?>>Kyrgyzstan</option>
          <option value="Lao People's Democratic Republic" <?php if($client['country']=="Lao People's Democratic Republic"){echo "selected";} ?>>Lao People's Democratic Republic</option>
          <option value="Latvia" <?php if($client['country']=="Latvia"){echo "selected";} ?>>Latvia</option>
          <option value="Lebanon" <?php if($client['country']=="Lebanon"){echo "selected";} ?>>Lebanon</option>
          <option value="Lesotho" <?php if($client['country']=="Lesotho"){echo "selected";} ?>>Lesotho</option>
          <option value="Liberia" <?php if($client['country']=="Liberia"){echo "selected";} ?>>Liberia</option>
          <option value="Libyan Arab Jamahiriya" <?php if($client['country']=="Libyan Arab Jamahiriya"){echo "selected";} ?>>Libyan Arab Jamahiriya</option>
          <option value="Liechtenstein" <?php if($client['country']=="Liechtenstein"){echo "selected";} ?>>Liechtenstein</option>
          <option value="Lithuania" <?php if($client['country']=="Lithuania"){echo "selected";} ?>>Lithuania</option>
          <option value="Luxembourg" <?php if($client['country']=="Luxembourg"){echo "selected";} ?>>Luxembourg</option>
          <option value="Macao" <?php if($client['country']=="Macao"){echo "selected";} ?>>Macao</option>
          <option value="Macedonia, The Former Yugoslav Republic of" <?php if($client['country']=="Macedonia, The Former Yugoslav Republic of"){echo "selected";} ?>>Macedonia, The Former Yugoslav Republic of</option>
          <option value="Madagascar" <?php if($client['country']=="Madagascar"){echo "selected";} ?>>Madagascar</option>
          <option value="Malawi" <?php if($client['country']=="Malawi"){echo "selected";} ?>>Malawi</option>
          <option value="Malaysia" <?php if($client['country']=="Malaysia"){echo "selected";} ?>>Malaysia</option>
          <option value="Maldives" <?php if($client['country']=="Maldives"){echo "selected";} ?>>Maldives</option>
          <option value="Mali" <?php if($client['country']=="Mali"){echo "selected";} ?>>Mali</option>
          <option value="Malta" <?php if($client['country']=="Malta"){echo "selected";} ?>>Malta</option>
          <option value="Marshall Islands" <?php if($client['country']=="Marshall Islands"){echo "selected";} ?>>Marshall Islands</option>
          <option value="Martinique" <?php if($client['country']=="Martinique"){echo "selected";} ?>>Martinique</option>
          <option value="Mauritania" <?php if($client['country']=="Mauritania"){echo "selected";} ?>>Mauritania</option>
          <option value="Mauritius" <?php if($client['country']=="Mauritius"){echo "selected";} ?>>Mauritius</option>
          <option value="Mayotte" <?php if($client['country']=="Mayotte"){echo "selected";} ?>>Mayotte</option>
          <option value="Mexico" <?php if($client['country']=="Mexico"){echo "selected";} ?>>Mexico</option>
          <option value="Micronesia, Federated States of" <?php if($client['country']=="Micronesia, Federated States of"){echo "selected";} ?>>Micronesia, Federated States of</option>
          <option value="Moldova, Republic of" <?php if($client['country']=="Moldova, Republic of"){echo "selected";} ?>>Moldova, Republic of</option>
          <option value="Monaco" <?php if($client['country']=="Monaco"){echo "selected";} ?>>Monaco</option>
          <option value="Mongolia" <?php if($client['country']=="Mongolia"){echo "selected";} ?>>Mongolia</option>
          <option value="Montenegro" <?php if($client['country']=="Montenegro"){echo "selected";} ?>>Montenegro</option>
          <option value="Montserrat" <?php if($client['country']=="Montserrat"){echo "selected";} ?>>Montserrat</option>
          <option value="Morocco" <?php if($client['country']=="Morocco"){echo "selected";} ?>>Morocco</option>
          <option value="Mozambique" <?php if($client['country']=="Mozambique"){echo "selected";} ?>>Mozambique</option>
          <option value="Myanmar" <?php if($client['country']=="Myanmar"){echo "selected";} ?>>Myanmar</option>
          <option value="Namibia" <?php if($client['country']=="Namibia"){echo "selected";} ?>>Namibia</option>
          <option value="Nauru" <?php if($client['country']=="Nauru"){echo "selected";} ?>>Nauru</option>
          <option value="Nepal" <?php if($client['country']=="Nepal"){echo "selected";} ?>>Nepal</option>
          <option value="Netherlands" <?php if($client['country']=="Netherlands"){echo "selected";} ?>>Netherlands</option>
          <option value="Netherlands Antilles" <?php if($client['country']=="Netherlands Antilles"){echo "selected";} ?>>Netherlands Antilles</option>
          <option value="New Caledonia" <?php if($client['country']=="New Caledonia"){echo "selected";} ?>>New Caledonia</option>
          <option value="New Zealand" <?php if($client['country']=="New Zealand"){echo "selected";} ?>>New Zealand</option>
          <option value="Nicaragua" <?php if($client['country']=="Nicaragua"){echo "selected";} ?>>Nicaragua</option>
          <option value="Niger" <?php if($client['country']=="Niger"){echo "selected";} ?>>Niger</option>
          <option value="Nigeria" <?php if($client['country']=="Nigeria"){echo "selected";} ?>>Nigeria</option>
          <option value="Niue" <?php if($client['country']=="Niue"){echo "selected";} ?>>Niue</option>
          <option value="Norfolk Island" <?php if($client['country']=="Norfolk Island"){echo "selected";} ?>>Norfolk Island</option>
          <option value="Northern Mariana Islands" <?php if($client['country']=="Northern Mariana Islands"){echo "selected";} ?>>Northern Mariana Islands</option>
          <option value="Norway" <?php if($client['country']=="Norway"){echo "selected";} ?>>Norway</option>
          <option value="Oman" <?php if($client['country']=="Oman"){echo "selected";} ?>>Oman</option>
          <option value="Pakistan" <?php if($client['country']=="Pakistan"){echo "selected";} ?>>Pakistan</option>
          <option value="Palau" <?php if($client['country']=="Palau"){echo "selected";} ?>>Palau</option>
          <option value="Palestinian Territory, Occupied" <?php if($client['country']=="Palestinian Territory, Occupied"){echo "selected";} ?>>Palestinian Territory, Occupied</option>
          <option value="Panama" <?php if($client['country']=="Panama"){echo "selected";} ?>>Panama</option>
          <option value="Papua New Guinea" <?php if($client['country']=="Papua New Guinea"){echo "selected";} ?>>Papua New Guinea</option>
          <option value="Paraguay" <?php if($client['country']=="Paraguay"){echo "selected";} ?>>Paraguay</option>
          <option value="Peru" <?php if($client['country']=="Peru"){echo "selected";} ?>>Peru</option>
          <option value="Philippines" <?php if($client['country']=="Philippines"){echo "selected";} ?>>Philippines</option>
          <option value="Pitcairn" <?php if($client['country']=="Pitcairn"){echo "selected";} ?>>Pitcairn</option>
          <option value="Poland" <?php if($client['country']=="Poland"){echo "selected";} ?>>Poland</option>
          <option value="Portugal" <?php if($client['country']=="Portugal"){echo "selected";} ?>>Portugal</option>
          <option value="Puerto Rico" <?php if($client['country']=="Puerto Rico"){echo "selected";} ?>>Puerto Rico</option>
          <option value="Qatar" <?php if($client['country']=="Qatar"){echo "selected";} ?>>Qatar</option>
          <option value="Reunion" <?php if($client['country']=="Reunion"){echo "selected";} ?>>Reunion</option>
          <option value="Romania" <?php if($client['country']=="Romania"){echo "selected";} ?>>Romania</option>
          <option value="Russian Federation" <?php if($client['country']=="Russian Federation"){echo "selected";} ?>>Russian Federation</option>
          <option value="Rwanda" <?php if($client['country']=="Rwanda"){echo "selected";} ?>>Rwanda</option>
          <option value="Saint Helena" <?php if($client['country']=="Saint Helena"){echo "selected";} ?>>Saint Helena</option>
          <option value="Saint Kitts and Nevis" <?php if($client['country']=="Saint Kitts and Nevis"){echo "selected";} ?>>Saint Kitts and Nevis</option>
          <option value="Saint Lucia" <?php if($client['country']=="Saint Lucia"){echo "selected";} ?>>Saint Lucia</option>
          <option value="Saint Pierre and Miquelon" <?php if($client['country']=="Saint Pierre and Miquelon"){echo "selected";} ?>>Saint Pierre and Miquelon</option>
          <option value="Saint Vincent and The Grenadines" <?php if($client['country']=="Saint Vincent and The Grenadines"){echo "selected";} ?>>Saint Vincent and The Grenadines</option>
          <option value="Samoa" <?php if($client['country']=="Samoa"){echo "selected";} ?>>Samoa</option>
          <option value="San Marino" <?php if($client['country']=="San Marino"){echo "selected";} ?>>San Marino</option>
          <option value="Sao Tome and Principe" <?php if($client['country']=="Sao Tome and Principe"){echo "selected";} ?>>Sao Tome and Principe</option>
          <option value="Saudi Arabia" <?php if($client['country']=="Saudi Arabia"){echo "selected";} ?>>Saudi Arabia</option>
          <option value="Senegal" <?php if($client['country']=="Senegal"){echo "selected";} ?>>Senegal</option>
          <option value="Serbia" <?php if($client['country']=="Serbia"){echo "selected";} ?>>Serbia</option>
          <option value="Seychelles" <?php if($client['country']=="Seychelles"){echo "selected";} ?>>Seychelles</option>
          <option value="Sierra Leone" <?php if($client['country']=="Sierra Leone"){echo "selected";} ?>> Sierra Leone</option>
          <option value="Singapore" <?php if($client['country']=="Singapore"){echo "selected";} ?>>Singapore</option>
          <option value="Slovakia" <?php if($client['country']=="Slovakia"){echo "selected";} ?>>Slovakia</option>
          <option value="Slovenia" <?php if($client['country']=="Slovenia"){echo "selected";} ?>>Slovenia</option>
          <option value="Solomon Islands" <?php if($client['country']=="Solomon Islands"){echo "selected";} ?>>Solomon Islands</option>
          <option value="Somalia" <?php if($client['country']=="Somalia"){echo "selected";} ?>>Somalia</option>
          <option value="South Africa" <?php if($client['country']=="South Africa"){echo "selected";} ?>>South Africa</option>
          <option value="South Georgia and The South Sandwich Islands" <?php if($client['country']=="South Georgia and The South Sandwich Islands"){echo "selected";} ?>>South Georgia and The South Sandwich Islands</option>
          <option value="Spain" <?php if($client['country']=="Spain"){echo "selected";} ?>>Spain</option>
          <option value="Sri Lanka" <?php if($client['country']=="Sri Lanka"){echo "selected";} ?> >Sri Lanka</option>
          <option value="Sudan" <?php if($client['country']=="Sudan"){echo "selected";} ?>>Sudan</option>
          <option value="Suriname" <?php if($client['country']=="Suriname"){echo "selected";} ?>>Suriname</option>
          <option value="Svalbard and Jan Mayen" <?php if($client['country']=="Svalbard and Jan Mayen"){echo "selected";} ?>>Svalbard and Jan Mayen</option>
          <option value="Swaziland" <?php if($client['country']=="Swaziland"){echo "selected";} ?>>Swaziland</option>
          <option value="Sweden" <?php if($client['country']=="Sweden"){echo "selected";} ?>>Sweden</option>
          <option value="Switzerland" <?php if($client['country']=="Switzerland"){echo "selected";} ?>>Switzerland</option>
          <option value="Syrian Arab Republic" <?php if($client['country']=="Syrian Arab Republic"){echo "selected";} ?>>Syrian Arab Republic</option>
          <option value="Taiwan, Province of China" <?php if($client['country']=="Taiwan, Province of China"){echo "selected";} ?>>Taiwan, Province of China</option>
          <option value="Tajikistan" <?php if($client['country']=="Tajikistan"){echo "selected";} ?>>Tajikistan</option>
          <option value="Tanzania, United Republic of" <?php if($client['country']=="Tanzania, United Republic of"){echo "selected";} ?>>Tanzania, United Republic of</option>
          <option value="Thailand" <?php if($client['country']=="Thailand"){echo "selected";} ?>>Thailand</option>
          <option value="Timor-leste" <?php if($client['country']=="Timor-leste"){echo "selected";} ?>>Timor-leste</option>
          <option value="Togo" <?php if($client['country']=="Togo"){echo "selected";} ?>>Togo</option>
          <option value="Tokelau" <?php if($client['country']=="Tokelau"){echo "selected";} ?>>Tokelau</option>
          <option value="Tonga" <?php if($client['country']=="Tonga"){echo "selected";} ?>>Tonga</option>
          <option value="Trinidad and Tobago" <?php if($client['country']=="Trinidad and Tobago"){echo "selected";} ?>>Trinidad and Tobago</option>
          <option value="Tunisia" <?php if($client['country']=="Tunisia"){echo "selected";} ?>>Tunisia</option>
          <option value="Turkey" <?php if($client['country']=="Turkey"){echo "selected";} ?>>Turkey</option>
          <option value="Turkmenistan" <?php if($client['country']=="Turkmenistan"){echo "selected";} ?>>Turkmenistan</option>
          <option value="Turks and Caicos Islands" <?php if($client['country']=="Turks and Caicos Islands"){echo "selected";} ?>>Turks and Caicos Islands</option>
          <option value="Tuvalu" <?php if($client['country']=="Tuvalu"){echo "selected";} ?>>Tuvalu</option>
          <option value="Uganda" <?php if($client['country']=="Uganda"){echo "selected";} ?>>Uganda</option>
          <option value="Ukraine" <?php if($client['country']=="Ukraine"){echo "selected";} ?>>Ukraine</option>
          <option value="United Arab Emirates" <?php if($client['country']=="United Arab Emirates"){echo "selected";} ?>>United Arab Emirates</option>
             <option value="United Kingdom" <?php if($client['country']=="United Kingdom"){echo "selected";} ?>>United Kingdom</option>
             <option value="United States" <?php if($client['country']=="United States"){echo "selected";} ?>>United States</option>
             <option value="United States Minor Outlying Islands" <?php if($client['country']=="United States Minor Outlying Islands"){echo "selected";} ?>>United States Minor Outlying Islands</option>
             <option value="Uruguay" <?php if($client['country']=="Uruguay"){echo "selected";} ?>>Uruguay</option>
             <option value="Uzbekistan" <?php if($client['country']=="Uzbekistan"){echo "selected";} ?>>Uzbekistan</option>
             <option value="Vanuatu" <?php if($client['country']=="Vanuatu"){echo "selected";} ?>>Vanuatu</option>
             <option value="Venezuela" <?php if($client['country']=="Venezuela"){echo "selected";} ?>>Venezuela</option>
             <option value="Viet Nam" <?php if($client['country']=="Viet Nam"){echo "selected";} ?>>Viet Nam</option>
             <option value="Virgin Islands, British" <?php if($client['country']=="Virgin Islands, British"){echo "selected";} ?>>Virgin Islands, British</option>
             <option value="Virgin Islands, U.S." <?php if($client['country']=="Virgin Islands, U.S."){echo "selected";} ?>>Virgin Islands, U.S.</option>
             <option value="Wallis and Futuna" <?php if($client['country']=="Wallis and Futuna"){echo "selected";} ?>>Wallis and Futuna</option>
             <option value="Western Sahara" <?php if($client['country']=="Western Sahara"){echo "selected";} ?>>Western Sahara</option>
             <option value="Yemen" <?php if($client['country']=="Yemen"){echo "selected";} ?>>Yemen</option>
             <option value="Zambia" <?php if($client['country']=="Zambia"){echo "selected";} ?>>Zambia</option>
             <option value="Zimbabwe" <?php if($client['country']=="Zimbabwe"){echo "selected";} ?>>Zimbabwe</option>
    </select>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label>City</label>
    <input type="text" name="city" id="city" placeholder="New York.." class="form-control" value="<?php echo $client['city'];?>">
  </div>
</div>
<div class="col-md-12">
<div class="form-group">
  <label>Other Details</label>
  <textarea name="description" id="description" class="form-control"><?php echo $client['description'];?></textarea>
</div>

</div>

<div class="col-md-12">
  <div class="form-group">
      <button type="submit" name="submit" id="submit"   class="blue_btn">Update Profile</button>
  </div>
</div></form>


<div class="clearfix">

</div>



</div>
</div>
</div>

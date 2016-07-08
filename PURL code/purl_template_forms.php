<?php 

// Add this to: purl_index.php about line 396 (after time code)
// 
#	include ('purl_template_forms.php');  //HTML form code

#	$html = str_replace("</head>", $pa_form_style."</head>", $html); // Insert Form style into page header 

#	$html = str_replace("[PA_DOWNLOAD_FORM]", $pa_download_form, $html);// Insert Download Form into page body
#	$html = str_replace("[PA_REFERRAL_FORM]", $pa_referral_form, $html);// Insert Referral Form into page body

#	$html = str_replace("</body>", $pa_scripts."</body>", $html); // Insert Form scripts into page header
// ----------------------------------------



$pa_form_style = <<<EOT
<link rel="stylesheet" href="[DOMAIN]/css/pa_form_style.css">
<link rel="stylesheet" href="[DOMAIN]/css/pa_form_themes.css">
<script src="[DOMAIN]/js/jquery-ui.js"></script>
EOT;


$pa_trial_form = <<<EOT
<!-- PA TRIAL FORM [PA_TRAIL_FORM] -->							
<!-- ---------------- -->
<div class="pa_form outerwrap formtheme_1 register" style="overflow: hidden;">
	<h2>Request your <span class="[LEVEL]">FREE 14-day trial</span> here!</h2>
	<div class="innerwrap">
		<p>You'll get access to <span class="[LEVEL]">the Grocer [LEVEL] Membership</span> to allow you to review the content as part of your daily routine and see how well it fits in.  Make sure you're in the loop - sign up today!</p>
	
		<form method="POST" action="[FORMSELF]" name="ref1" id="ref1" class="ref1" accept-charset="UTF-8">
			
			<div class="clear: both; float: none;"></div>
			
			<input type="hidden" name="pa_ref" value="Trial">
			
			<input type="hidden" name="accountcode" value="[ACCOUNTCODE]" />
			<input type="hidden" name="stockRef" value="[STOCKREF]" />
			<input type="hidden" name="bundleRef" value="[BUNDLEREF]" />
			<input type="hidden" name="level" value="[LEVEL]" />
			<input type="hidden" name="method" value="1" />
			<input type="hidden" name="confirmationurl" value="[CONFIRMATIONURL]" />			
			
			<label for="deliveryTitle">Title *</label>
			<input name="deliveryTitle" type="text" class="field" value="[TITLE]" size="34" required placeholder="e.g. Mr">
			<label for="deliveryForename">Forename *</label>
			<input name="deliveryForename" type="text" class="field" value="[FIRSTNAME]" size="34" required placeholder="Forename">
			<label for="deliverySurname">Surname *</label>
			<input name="deliverySurname" type="text" class="field" value="[LASTNAME]" size="34" required placeholder="Surname">
			<label for="deliveryJob">Job Title</label>
			<input name="deliveryJob" type="text" class="field" value="[JOB]" size="34" placeholder="Job Title">
			<label for="deliveryCompany">Company</label>
			<input name="deliveryCompany" type="text" class="field" value="[COMPANY]" size="34" placeholder="Company">
			<label for="deliveryAddressline1">Address 1 *</label>
			<input name="deliveryAddressline1" type="text" class="field" value="[ADDRESS1]" size="34" required placeholder="Address 1">
			<label for="deliveryAddressline2">Address 2</label>
			<input name="deliveryAddressline2" type="text" class="field" value="[ADDRESS2]" size="34" placeholder="Address 2">		
			<label for="deliveryTown">Town *</label>
			<input name="deliveryTown" type="text" class="field" value="[TOWN]" size="34" required placeholder="Town">		
			<label for="deliveryCounty">County</label>
			<input name="deliveryCounty" type="text" class="field" value="[COUNTY]" size="34" placeholder="County">		
			<label for="deliveryPostcode">Postcode</label>
			<input name="deliveryPostcode" type="text" class="field" value="[POSTCODE]" size="34" required placeholder="Postcode">			
			<label for="deliveryCountryISO">Country</label>
			<select name="deliveryCountryISO" style="height: 1.8rem; padding:0.0rem;max-width: 258px; width: 68%;margin-left: 2px;" required>
				<option value="GB">United Kingdom</option>
				<option value='AF'>Afghanistan</option>
				<option value="AX">Åland Islands</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AQ">Antarctica</option>
				<option value="AG">Antigua and Barbuda</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgium</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia, Plurinational State of</option>
				<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
				<option value="BA">Bosnia and Herzegovina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="IO">British Indian Ocean Territory</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cabo Verde</option>
				<option value="KY">Cayman Islands</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos (Keeling) Islands</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CD">Congo, the Democratic Republic of the</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="CI">Côte d"Ivoire</option>
				<option value="HR">Croatia</option>
				<option value="CU">Cuba</option>
				<option value="CW">Curaçao</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DM">Dominica</option>
				<option value="DO">Dominican Republic</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FK">Falkland Islands (Malvinas)</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="TF">French Southern Territories</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GD">Grenada</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GG">Guernsey</option>
				<option value="GN">Guinea</option>
				<option value="GW">Guinea-Bissau</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HM">Heard Island and McDonald Islands</option>
				<option value="VA">Holy See (Vatican City State)</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran, Islamic Republic of</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IM">Isle of Man</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="JM">Jamaica</option>
				<option value="JP">Japan</option>
				<option value="JE">Jersey</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KI">Kiribati</option>
				<option value="KP">Korea, Democratic People"s Republic of</option>
				<option value="KR">Korea, Republic of</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LA">Lao People"s Democratic Republic</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libya</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macao</option>
				<option value="MK">Macedonia, the former Yugoslav Republic of</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MQ">Martinique</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia, Federated States of</option>
				<option value="MD">Moldova, Republic of</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="ME">Montenegro</option>
				<option value="MS">Montserrat</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk Island</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PS">Palestine, State of</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="RE">Réunion</option>
				<option value="RO">Romania</option>
				<option value="RU">Russian Federation</option>
				<option value="RW">Rwanda</option>
				<option value="BL">Saint Barthélemy</option>
				<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
				<option value="KN">Saint Kitts and Nevis</option>
				<option value="LC">Saint Lucia</option>
				<option value="MF">Saint Martin (French part)</option>
				<option value="PM">Saint Pierre and Miquelon</option>
				<option value="VC">Saint Vincent and the Grenadines</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="ST">Sao Tome and Principe</option>
				<option value="SA">Saudi Arabia</option>
				<option value="SN">Senegal</option>
				<option value="RS">Serbia</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SX">Sint Maarten (Dutch part)</option>
				<option value="SK">Slovakia</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="GS">South Georgia and the South Sandwich Islands</option>
				<option value="SS">South Sudan</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SJ">Svalbard and Jan Mayen</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syrian Arab Republic</option>
				<option value="TW">Taiwan, Province of China</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania, United Republic of</option>
				<option value="TH">Thailand</option>
				<option value="TL">Timor-Leste</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad and Tobago</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TC">Turks and Caicos Islands</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="US">United States</option>
				<option value="UM">United States Minor Outlying Islands</option>
				<option value="UY">Uruguay</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela, Bolivarian Republic of</option>
				<option value="VN">Viet Nam</option>
				<option value="VG">Virgin Islands, British</option>
				<option value="VI">Virgin Islands, U.S.</option>
				<option value="WF">Wallis and Futuna</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>
			</select>
			<label for="deliveryEmail">Email:</label>
			<input name="deliveryEmail" class="field" type="text" value="[EMAIL]" size="34" required placeholder="Email">
			
			<!--<div class="row">
				<div class="columns large-12 medium-12"><label for="paymentType" style="">Payment:</label></div>
				<div class="columns large-5 medium-12" style="text-align: right;"><input type="radio" name="paymentType" value="DD" style="margin-right:5px;" />Direct Debit</div>
				<div class="columns large-7 medium-12" style="text-align: right;"><input type="radio" name="paymentType" value="CC" style="margin-right:5px;" />Credit/Debit Card</div>
			</div>-->
			
			<input type="hidden" name="paymentType" value="CC" />

			<div class="sub_row">
				<input class="[LEVEL]" name="submit" id="submitx" type="submit" value="Join Now">
			</div>
		</form>
	</div>
	<div id="form_ajax"> [FORMRESULT1] </div>
</div>
<!-- ---------------------- -->						
<!-- PA DOWNLOAD FORM : END -->
EOT;

$pa_trial_form_short = <<<EOT
<!-- PA TRIAL FORM [PA_TRAIL_FORM] -->							
<!-- ---------------- -->
<div class="pa_form outerwrap formtheme_1 register">
	<h2>Request your <span class="[LEVEL]">FREE 14-day trial</span> here!</h2>
	<div class="innerwrap">
		<p style="font-size: 16pt; line-height: 1.4em;">You'll get access to <span class="[LEVEL]">The Grocer [LEVEL] Membership</span> to allow you to review the content as part of your daily routine and see how well it fits in.  Make sure you're in the loop - sign up today!</p>
	
		<form method="POST" action="[FORMSELF]" name="ref1" id="ref1" class="ref1" accept-charset="UTF-8">
			
			<div class="clear: both; float: none;"></div>
			
			<input type="hidden" name="pa_ref" value="Trial">
			
			<input type="hidden" name="accountcode" value="[ACCOUNTCODE]" />
			<input type="hidden" name="stockRef" value="[STOCKREF]" />
			<input type="hidden" name="bundleRef" value="[BUNDLEREF]" />
			<input type="hidden" name="level" value="[LEVEL]" />
			<input type="hidden" name="method" value="1" />
			<input type="hidden" name="confirmationurl" value="[CONFIRMATIONURL]" />			
			
			<label for="deliveryTitle">Title *</label>
			<input name="deliveryTitle" type="text" class="field" value="[TITLE]" size="34" required placeholder="e.g. Mr">
			<label for="deliveryForename">Forename *</label>
			<input name="deliveryForename" type="text" class="field" value="[FIRSTNAME]" size="34" required placeholder="Forename">
			<label for="deliverySurname">Surname *</label>
			<input name="deliverySurname" type="text" class="field" value="[LASTNAME]" size="34" required placeholder="Surname">
			<label for="deliveryJob">Job Title</label>
			<input name="deliveryJob" type="text" class="field" value="[JOB]" size="34" placeholder="Job Title">
			<label for="deliveryCompany">Company</label>
			<input name="deliveryCompany" type="text" class="field" value="[COMPANY]" size="34" placeholder="Company">
			
			<input name="deliveryAddressline1" type="hidden" class="field" value="[ADDRESS1]" size="34" required placeholder="Address 1">
			<input name="deliveryAddressline2" type="hidden" class="field" value="[ADDRESS2]" size="34" placeholder="Address 2">		
			<input name="deliveryTown" type="hidden" class="field" value="[TOWN]" size="34" required placeholder="Town">		
			<input name="deliveryCounty" type="hidden" class="field" value="[COUNTY]" size="34" placeholder="County">		
			<input name="deliveryPostcode" type="hidden" class="field" value="[POSTCODE]" size="34" required placeholder="Postcode">			
			
			<input name="deliveryCountryISO" type="hidden" value="GB">

			<label for="deliveryEmail">Email:</label>
			<input name="deliveryEmail" class="field" type="text" value="[EMAIL]" size="34" required placeholder="Email">
			
			<input type="hidden" name="paymentType" value="CC" />

			<div class="sub_row">
				<input class="[LEVEL]" name="submit" id="submitx" type="submit" value="Join Now">
			</div>
		</form>
	</div>
	<div id="form_ajax"> [FORMRESULT1] </div>
</div>
<!-- ---------------------- -->						
<!-- PA DOWNLOAD FORM : END -->
EOT;


$pa_register_form = <<<EOT
<!-- PA DOWNLOAD FORM -->							
<!-- ---------------- -->
<div class="pa_form outerwrap formtheme_1 register">
	<h4 style="font-family: 'FFUnitWebProUltra';"><span class="[LEVEL]">Start your Membership</span> TODAY!</h4>
	<div class="innerwrap" style="margin-top: 20px;">
		<form method="POST" action="[FORMSELF]" name="ref1" id="ref1" accept-charset="UTF-8">
			
			<div class="clear: both; float: none;"></div>
			
			<input type="hidden" name="accountcode" value="[ACCOUNTCODE]" />
			<input type="hidden" name="stockRef" value="[STOCKREF]" />
			<input type="hidden" name="bundleRef" value="[BUNDLEREF]" />
			<input type="hidden" name="level" value="[LEVEL]" />
			<input type="hidden" name="method" value="1" />
			<input type="hidden" name="confirmationurl" value="[CONFIRMATIONURL]" />			
			
			<label for="deliveryTitle">Title</label>
			<input name="deliveryTitle" type="text" class="field" value="[TITLE]" size="34" required placeholder="e.g. Mr">
			<label for="deliveryForename">Forename</label>
			<input name="deliveryForename" type="text" class="field" value="[FIRSTNAME]" size="34" required placeholder="Forename">
			<label for="deliverySurname">Surname</label>
			<input name="deliverySurname" type="text" class="field" value="[LASTNAME]" size="34" required placeholder="Surname">
			<label for="deliveryJob">Job Title:</label>
			<input name="deliveryJob" type="text" class="field" value="[JOB]" size="34" placeholder="Job Title">
			<label for="deliveryCompany">Company:</label>
			<input name="deliveryCompany" type="text" class="field" value="[COMPANY]" size="34" placeholder="Company">
			<label for="deliveryAddressline1">Address 1:</label>
			<input name="deliveryAddressline1" type="text" class="field" value="[ADDRESS1]" size="34" required placeholder="Address 1">
			<label for="deliveryAddressline2">Address 2:</label>
			<input name="deliveryAddressline2" type="text" class="field" value="[ADDRESS2]" size="34" placeholder="Address 2">		
			<label for="deliveryTown">Town:</label>
			<input name="deliveryTown" type="text" class="field" value="[TOWN]" size="34" placeholder="Town">		
			<label for="deliveryPostcode">Postcode:</label>
			<input name="deliveryPostcode" type="text" class="field" value="[POSTCODE]" size="34" required placeholder="Postcode">			
			<label for="deliveryCountryISO">Country:</label>
			<select name="deliveryCountryISO" style="height: 1.8rem; padding:0.0rem;max-width: 258px; width: 68%;margin-left: 2px;" required>
				<option value="GB">United Kingdom</option>
				<option value='AF'>Afghanistan</option>
				<option value="AX">Åland Islands</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AQ">Antarctica</option>
				<option value="AG">Antigua and Barbuda</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgium</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia, Plurinational State of</option>
				<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
				<option value="BA">Bosnia and Herzegovina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="IO">British Indian Ocean Territory</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cabo Verde</option>
				<option value="KY">Cayman Islands</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos (Keeling) Islands</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CD">Congo, the Democratic Republic of the</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="CI">Côte d"Ivoire</option>
				<option value="HR">Croatia</option>
				<option value="CU">Cuba</option>
				<option value="CW">Curaçao</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DM">Dominica</option>
				<option value="DO">Dominican Republic</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FK">Falkland Islands (Malvinas)</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="TF">French Southern Territories</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GD">Grenada</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GG">Guernsey</option>
				<option value="GN">Guinea</option>
				<option value="GW">Guinea-Bissau</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HM">Heard Island and McDonald Islands</option>
				<option value="VA">Holy See (Vatican City State)</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran, Islamic Republic of</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IM">Isle of Man</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="JM">Jamaica</option>
				<option value="JP">Japan</option>
				<option value="JE">Jersey</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KI">Kiribati</option>
				<option value="KP">Korea, Democratic People"s Republic of</option>
				<option value="KR">Korea, Republic of</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LA">Lao People"s Democratic Republic</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libya</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macao</option>
				<option value="MK">Macedonia, the former Yugoslav Republic of</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MQ">Martinique</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia, Federated States of</option>
				<option value="MD">Moldova, Republic of</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="ME">Montenegro</option>
				<option value="MS">Montserrat</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk Island</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PS">Palestine, State of</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="RE">Réunion</option>
				<option value="RO">Romania</option>
				<option value="RU">Russian Federation</option>
				<option value="RW">Rwanda</option>
				<option value="BL">Saint Barthélemy</option>
				<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
				<option value="KN">Saint Kitts and Nevis</option>
				<option value="LC">Saint Lucia</option>
				<option value="MF">Saint Martin (French part)</option>
				<option value="PM">Saint Pierre and Miquelon</option>
				<option value="VC">Saint Vincent and the Grenadines</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="ST">Sao Tome and Principe</option>
				<option value="SA">Saudi Arabia</option>
				<option value="SN">Senegal</option>
				<option value="RS">Serbia</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SX">Sint Maarten (Dutch part)</option>
				<option value="SK">Slovakia</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="GS">South Georgia and the South Sandwich Islands</option>
				<option value="SS">South Sudan</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SJ">Svalbard and Jan Mayen</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syrian Arab Republic</option>
				<option value="TW">Taiwan, Province of China</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania, United Republic of</option>
				<option value="TH">Thailand</option>
				<option value="TL">Timor-Leste</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad and Tobago</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TC">Turks and Caicos Islands</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="US">United States</option>
				<option value="UM">United States Minor Outlying Islands</option>
				<option value="UY">Uruguay</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela, Bolivarian Republic of</option>
				<option value="VN">Viet Nam</option>
				<option value="VG">Virgin Islands, British</option>
				<option value="VI">Virgin Islands, U.S.</option>
				<option value="WF">Wallis and Futuna</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>

			</select>
			<label for="deliveryEmail">Email:</label>
			<input name="deliveryEmail" class="field" type="text" value="[EMAIL]" size="34" required placeholder="Email">
		
			[LEVEL_PAYMENT]
						
			<div class="sub_row">
				<input class="[LEVEL]" name="submit" id="submitx" type="submit" value="Join Now">
			</div>
			
			<h3 style="line-height: 1.1em;"><span class="[LEVEL]">7</span> industry downloads<br/><span class="[LEVEL]">FREE!</span> when you order today</h3>
			<p style="text-align: center;"><img src="[DOMAIN]/images/mag_fan.png" style="max-width: 80%"/></p>
			
			<input type="hidden" name="pa_ref" value="Register">
			
			
		</form>
	</div>
	<div id="form_ajax"> [FORMRESULT1] </div>
</div>
<!-- ---------------------- -->						
<!-- PA DOWNLOAD FORM : END -->
EOT;

$pa_register_form_short = <<<EOT
<!-- PA DOWNLOAD FORM -->							
<!-- ---------------- -->
<div class="pa_form outerwrap formtheme_1 register" style="overflow: auto;">
	<h4 style="font-family: 'FFUnitWebProUltra'!important; font-weight: normal;"><span class="[LEVEL]" style="font-family: 'FFUnitWebProUltra'!important; font-weight: normal;">Start your Membership</span> TODAY!</h4>
	<div class="innerwrap">
		<form method="POST" action="[FORMSELF]" name="ref1" id="ref1" accept-charset="UTF-8">
			
			<div class="clear: both; float: none;"></div>
			
			<input type="hidden" name="accountcode" value="[ACCOUNTCODE]" />
			<input type="hidden" name="stockRef" value="[STOCKREF]" />
			<input type="hidden" name="bundleRef" value="[BUNDLEREF]" />
			<input type="hidden" name="level" value="[LEVEL]" />
			<input type="hidden" name="method" value="1" />
			<input type="hidden" name="confirmationurl" value="[CONFIRMATIONURL]" />			
			
			<label for="deliveryTitle">Title</label>
			<input name="deliveryTitle" type="text" class="field" value="[TITLE]" size="34" required placeholder="e.g. Mr">
			<label for="deliveryForename">Forename</label>
			<input name="deliveryForename" type="text" class="field" value="[FIRSTNAME]" size="34" required placeholder="Forename">
			<label for="deliverySurname">Surname</label>
			<input name="deliverySurname" type="text" class="field" value="[LASTNAME]" size="34" required placeholder="Surname">
			<label for="deliveryJob">Job Title:</label>
			<input name="deliveryJob" type="text" class="field" value="[JOB]" size="34" placeholder="Job Title">
			<label for="deliveryCompany">Company:</label>
			<input name="deliveryCompany" type="text" class="field" value="[COMPANY]" size="34" placeholder="Company">
			
			<input name="deliveryAddressline1" type="hidden" class="field" value="[ADDRESS1]" size="34" required placeholder="Address 1">
			<input name="deliveryAddressline2" type="hidden" class="field" value="[ADDRESS2]" size="34" placeholder="Address 2">		
			<input name="deliveryTown" type="hidden" class="field" value="[TOWN]" size="34" placeholder="Town">		
			<input name="deliveryPostcode" type="hidden" class="field" value="[POSTCODE]" size="34" required placeholder="Postcode">			
			<input name="deliveryCountryISO" value="GB" type="hidden">
				
			<label for="deliveryEmail">Email:</label>
			<input name="deliveryEmail" class="field" type="text" value="[EMAIL]" size="34" required placeholder="Email">
			
			[LEVEL_PAYMENT]
			
			<div class="sub_row">
				<input class="[LEVEL]" name="submit" id="submitx" type="submit" value="Join Now">
			</div>
			
			<h4><span class="[LEVEL]">7</span> industry downloads<br/><span class="[LEVEL]">FREE!</span> when you order today</h4>
			<p style="text-align: center; margin-bottom: 0;"><img src="[DOMAIN]/images/mag_fan.png" style="max-width: 80%"/></p>
			
			<input type="hidden" name="pa_ref" value="Register">
			
			
		</form>
	</div>
	<div id="form_ajax"> [FORMRESULT1] </div>
</div>
<!-- ---------------------- -->						
<!-- PA DOWNLOAD FORM : END -->
EOT;

// use [PA_DOWNLOAD_FORM] in the template where this form should appear
$pa_download_form = <<<EOT

<!-- PA DOWNLOAD FORM -->							
<!-- ---------------- -->
<div class="pa_form outerwrap formtheme_2 featureBox eventsubnavbox">
	<div class="title">BROCHURE DOWNLOAD</div>

	<!--<div style="text-align: center; background: none repeat scroll 0% 0% rgb(240, 240, 240); border-left: 1px solid rgb(206, 206, 206); border-right: 1px solid rgb(206, 206, 206);">
		<img id="pdf1img" src=".jpg" class="" style="margin: 10px 0 0 0px; border: 1px solid #999999; box-shadow: 2px 2px 2px #999999;" width="75"> 
	</div>-->

	<div class="innerwrap">
		&nbsp;

		<form method="POST" action="[FORMSELF]" name="ref3" id="ref3" accept-charset="UTF-8">
			<input type="hidden" name="pa_ref" value="Download">
			<label for="Name"><span class="required">*</span>Name:</label>
			<input name="Name" type="text" class="field" value="[NAME]" size="34" required placeholder="Name">
			<label for="Company">Company:</label>
			<input name="Company" type="text" class="field" value="[COMPANY]" size="34" placeholder="Company">
			<label for="JobTitle">Job Title:</label>
			<input name="JobTitle" type="text" class="field" value="[JOB]" size="34" placeholder="Job Title">
			<label for="Email"><span class="required">*</span>Email:</label>
			<input name="Email" class="field" type="text" value="[EMAIL]" size="34" required placeholder="Email">
			<label for="Phone">Telephone:</label>
			<input name="Phone" class="field" type="tel"  value="[PHONE]" size="34" placeholder="Telephone">
			
			<div class="sub_row">
				<input name="submit" id="submitx" type="submit" value="DOWNLOAD">
			</div>
		</form>
	</div>
	<div id="form_ajax"> [FORMRESULT1] </div>
</div>
<!-- ---------------------- -->						
<!-- PA DOWNLOAD FORM : END -->

EOT;


// use [PA_REFERRAL_FORM] in the template where this form should appear
$pa_referral_form = <<<EOT

<!-- PA REFRRAL FORM  -->							
<!-- ---------------- -->
<div id="referral" class="pa_form outerwrap formtheme_1">
	<div class="title">
		<h3 class="[LEVEL] bold" style="margin:0;">Recommend a friend...</h3>
	</div>
	<div class="innerwrap">
		<p>Do you know someone that you think would benefit from becoming a member of <span class="[LEVEL] bold">The Grocer</span>?</p>
		
		<form method="POST" action="[FORMSELF]" name="ref2" id="ref2" style="margin-top: -5px;" accept-charset="UTF-8">
			<input type="hidden" name="pa_ref" value="Referral">
			
			<input type="hidden" placeholder="Your Name" required="" size="33" id="YourName" class="field" name="YourName" value="[NAME]" style="">

			<label for="Name" style="">*Name:</label>
			<input type="text" placeholder="eg John Smith" required="" size="33" value="" id="Name" class="field" name="Name">
			<label for="Email" style="clear: both;">*Email:</label>
			<input type="text" placeholder="eg john@myemail.com" required="" size="33" value="" class="field" id="Email" name="Email">
			<div class="sub_row">
				<input type="submit" value="Submit" id="submit" name="submit">
			</div>
		</form>
		
	</div>
	<div id="form_ajax2">[FORMRESULT2]</div>
</div>
<!-- ---------------------- -->						
<!-- PA REFERRAL FORM : END -->

EOT;


$pa_scripts = <<<EOT

<script type="text/javascript">
    (function($){
        $(document).ready(function() {
		
		/* ------ PA FORM SCRIPT ------- */		
			// form 1 progress
			$('#ref1 :input').change(function(){
				// serialize input by name rather than $this, enabling submission of arrays
				dataString = $("#ref1 :input[name='" + $(this).attr('name') + "']").serializeArray();
				if (dataString.length === 0) {
					// force submission of blank fields
					dataString = $(this).attr('name') + "=";
				}
				// append pa form ref
				dataString.push({"name":"pa_ref", "value":"Form 1"});
				
				$.ajax({
					type: "POST",
					url: "../purl_form_progress.php",
					data: dataString,
					success: function(output){
					}
				});
			});
			// form 1 submit
			/*
			$('.ref1').submit(function(event){
				//event.preventDefault();
				dataString = $(this).serialize();
				$('#form_ajax').empty();
				$('#form_ajax').addClass("spin");
				$.ajax({
					type: "POST",
					url: "../purl_form.php",
					data: dataString,
					success: function(output){
						$('#form_ajax').removeClass("spin");
						$('#form_ajax').html(output);
					}
				});

			});
			*/

			// form 2 progress
			$('#ref2 :input').change(function(){
				// serialize input by name rather than $this, enabling submission of arrays
				dataString = $("#ref2 :input[name='" + $(this).attr('name') + "']").serializeArray();
				if (dataString.length === 0) {
					// force submission of blank fields
					dataString = $(this).attr('name') + "=";
				}
				// append pa form ref
				dataString.push({"name":"pa_ref", "value":"Form 2"});
				
				$.ajax({
					type: "POST",
					url: "../purl_form_progress.php",
					data: dataString,
					success: function(output){
					}
				});
			});
			// form 2 submit
			$('#ref2').submit(function(event){
				event.preventDefault();
				dataString = $("#ref2").serialize();
				
				//alert(dataString.toSource());
				$('#form_ajax2').empty();
				$('#form_ajax2').addClass("spin");
				$.ajax({
					type: "POST",
					url: "../purl_form.php",
					data: dataString,
					contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
					success: function(output){
						$('#form_ajax2').removeClass("spin");
						$('#form_ajax2').html(output);
					}
				});

			});
			
		/* ------ PA FORM SCRIPT : END ------- */
	});
})(jQuery);
</script>

EOT;
?>
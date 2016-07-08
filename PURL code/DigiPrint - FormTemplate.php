<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js front"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="keywords" content="PURL, PURLs, Pro-Active, Personalisation, Personal, Website, web design, personalised website">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>10 Year Competition | Digital Printer</title>

<!-- custom CSS -->
<link rel="stylesheet" href="[DOMAIN]/css/foundation.css" />
<link rel="stylesheet" href="[DOMAIN]/css/app.css" />
<link href="[DOMAIN]/css/custom.css" media="screen" rel="stylesheet">

<!-- main JS libs  -->
<script src="[DOMAIN]/js/libs/modernizr.min.js"></script>
<script src="[DOMAIN]/js/libs/respond.min.js"></script>					 
<script src="[DOMAIN]/js/libs/jquery.min.js"></script>


</head>

<body class="something" id="something-else" style="margin: 0;">
<div class="body_wrap">

<style>
.css-shapes-preview{ 
    background: red;
}
.css-shapes-preview::before{ 
    position: relative; 
    height: 0px; 
    width: 0px; 
    border-top: 200px solid #428bca; 
    border-left: 100px solid transparent; 
    border-right: 100px solid transparent; 
}

.col_2_3 {width: 66%; float: left;}
.col_1_3 {width: 33%; float: left;}

</style>

  

		


<!-- middle -->
<div id="middle" class="xfull_width row">
    
	<div class="xmiddle_row">
		<div class="container clearfix">  
			
            <div class="small-12 large-12 columns">
				
				<div class="columns large-6 medium-6 small-6"><img src="[DOMAIN]/images/Digital_Printer_logo_comp.png" alt="Digital Printer" style="/*max-width: 400px;*/"></div>
				<div class="columns large-6 medium-6 small-6 text-right"><img src="[DOMAIN]/images/DP_10_anniaversary_logo.jpg" alt="10 Year Anniversary" style="max-width: 25%; margin-bottom: 5px;"></div>
				
				<!--<h1>10th Anniversary edition Competition</h1>-->
				
				<div id="form" class="pa_form outerwrap formtheme_3" style="margin-top: 5px; /*overflow: hidden; height: 350px; background: url('[DOMAIN]/images/open_box.jpg') no-repeat top center / contain;*/">
					<div id="formtop" class="">
						&nbsp;
						
						<div class="box-wrap" style="position: relative;">
							
							<form id="pa_form" name="pa_form" action="[FORMSELF]" method="POST">
							<input type="hidden" name="pa_ref" value="Survey" />
							
							
							<!--STEP 1 Welcome-->
							<div id="step1">
								<div class="row">
									<div class="columns large-8 large-push-2 text-center">
										<!--<div style="height: 205px;">&nbsp;</div>-->
										<p><img src="[DOMAIN]/images/open_box_top_web.jpg" alt="open box top"></p>
										<h2>[WELCOME]</h2>
										<p>One lucky Digital Printer reader will be the winner of an iPad Air 2 by simply taking part in a brief survey. </p>
										<p>Just follow these simple steps. It should take no more than 2 minutes!</p>
										<p><img src="[DOMAIN]/images/open_box_bottom_web.jpg" alt="open box bottom"></p>
										<!--<div style="height: 250px;">&nbsp;</div>-->
										
										
									</div>
									<div class="columns large-12">
										<p style="text-align: right;"><button class="movestep2">BEGIN &raquo;</button></p>
									</div>
								</div>
							</div>
							<br/><br/>
							
							
							<!--STEP 2 Who you are-->
							<div id="step2" style="background: #fff;" class="row">
								<div class="columns large-12">
									<h3>Confirm who you are</h3>
									<p>Please confirm the information that we currently hold about you. If the person shown has left the business and you are the current receiver of Digital Printer then please re-type your details.</p>
									<div class="columns large-8 end">	
										<label for="Title">
											<span class="required">*</span>Title:

											<select name="title" id="title" style="margin-right: 2px;">
												<option value="Mr" [SELECTED_Mr]>Mr</option>
												<option value="Mrs" [SELECTED_Mrs]>Mrs</option>
												<option value="Miss" [SELECTED_Miss]>Miss</option>
												<option value="Ms" [SELECTED_Ms]>Ms</option>
											</select>
											
										</label>
										
										<label for="Forename"><span class="required">*</span>Forename:<input name="Forename" type="text" class="field" value="[FIRSTNAME]" required placeholder="Forename"></label>
										<label for="Surname"><span class="required">*</span>Surname:<input name="Surname" type="text" class="field" value="[LASTNAME]" required placeholder="Surname"></label>
										<label for="Company">Company:<input name="Company" type="text" class="field" value="[COMPANY]" placeholder="Company"></label>
										<label for="JobTitle">Job Title:<input name="JobTitle" type="text" class="field" value="[JOB]" placeholder="Job Title"></label>
										<label for="Email">Email:<input name="Email" type="text" class="field" value="[EMAIL]" required placeholder="Email Address"></label>
										
										<br><br>
									</div>
									<div class="clear"><p style="text-align: right;"><button class="movestep3">Continue &raquo;</button></p></div>
								</div>	
							</div>
							

							<!--STEP 3 Survery-->
							<div id="step3" style="background: #fff;">
							
								<h3 class="clear">Answer our brief industry survey</h3>
								<span class="small" style="font-size: 12pt; color: #CC3333">All questions are required.</span><br>
							
								<div id="q1" class="title">1.	Are you a:</div>
							
								<div class="row">								
									<div class="columns large-8">
										<div class="switch-toggle switch-candy">
											<input id="q1_y" name="q1" type="radio" value="Printer" >
											<label for="q1_y" onclick="">PRINTER</label>

											<input id="q1_n" name="q1" type="radio" value="Supplier">
											<label for="q1_n" onclick="">SUPPLIER</label>

											<input id="q1_other" name="q1" type="radio" value="Other">
											<label for="q1_other" onclick="">OTHER</label>
											
											<a></a>
										</div>
									</div>
								
									<div id="q1_reveal" class="optional columns large-8 large-pull-4" style="/*width: 50%;*/ display: none;">
										<p><span class="small">please state your companies primary function <input id="q1_othertext" name="q1_othertext" type="text" value="" style=""></p>
									</div>
									
								</div>
<br>

								<div class="row">	
									<div id="q2" class="columns large-12 clear">
										<label for="q2" class="title">2. Do you outsource or buy any print</label>
										<div class="checkbox-btn">
											<input type="radio" value="Yes" id="rc2_1" name="q2" required=""/>
											<label for="rc2_1" onclick>Yes</label>
										</div>
										<div class="checkbox-btn">
											<input type="radio" value="No" id="rc2_2" name="q2" />
											<label for="rc2_2" onclick>No</label>
										</div>
									</div><br/>
								</div>


								<div class="row">	
									<div id="q2a_reveal" style="display: none;" class="columns large-12">
										<label for="q2a" class="title">2a. What types of print do you outsource? <span class="small">(tick all that apply)</span></label>
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="Flyers" id="rc2a_1" name="q2a[]"/>
												<label for="rc2a_1" onclick>Flyers</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Business Stationery" id="rc2a_2" name="q2a[]" />
												<label for="rc2a_2" onclick>Business Stationery</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Roller Banners" id="rc2a_3" name="q2a[]" />
												<label for="rc2a_3" onclick>Roller Banners</label>
											</div>
										</div>
										
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="Folded Leaflets" id="rc2a_4" name="q2a[]" />
												<label for="rc2a_4" onclick>Folded Leaflets</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Booklets" id="rc2a_5" name="q2a[]" />
												<label for="rc2a_5" onclick>Booklets</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Exhibition Pop-ups" id="rc2a_6" name="q2a[]" />
												<label for="rc2a_6" onclick>Exhibition Pop-ups</label>
											</div>
										</div>
										
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="Business Cards" id="rc2a_7" name="q2a[]" />
												<label for="rc2a_7" onclick>Business Cards</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Large Format Posters" id="rc2a_8" name="q2a[]" />
												<label for="rc2a_8" onclick>Large Format Posters</label>
											</div>
											<div class="checkbox-btn">
												<input type="checkbox" value="Other" id="rc2a_9" name="q2a[]" />
												<label for="rc2a_9" onclick>Other</label>
											</div>
											<div id="q2a_other_reveal" class="optional" style="/*width: 50%;*/ display: none;">
												<p>Please state: <input id="q2a_othertext" name="q2a_othertext" type="text" value="" style=""></p>
											</div>
										</div>
									</div>
								</div>
								<div class="clear">&nbsp;</div>

								<div class="row">
									<div id="q3" class="columns large-12">
										<label for="q3" class="title">3. Are you attending any exhibitions in 2016? <span class="small">(tick all that apply)</span></label>
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="drupa" id="rc3_1" name="q3[]" />
												<label for="rc3_1" onclick>drupa</label>
											</div>
										</div>
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="The Print Show" id="rc3_2" name="q3[]" />
												<label for="rc3_2" onclick>The Print Show</label>
											</div>
										</div>
										<div class="tick_col columns large-4">
											<div class="checkbox-btn">
												<input type="checkbox" value="Other" id="rc3_3" name="q3[]" />
												<label for="rc3_3" onclick>Other</label>
											</div>
											<div id="q3_reveal" class="optional" style="/*width: 50%;*/ display: none;">
												<p>Please state: <input id="q3_othertext" name="q3_othertext" type="text" value="" style=""></p>
											</div>
										</div>
										
									</div>
									
								</div>
								<div class="clear">&nbsp;</div>
								
								<div class="row">	
									<div class="columns large-8">
										<div id="q4" class="title">4. Are you investing in your press or post press department in the next 12 months?</div>
										<div class="switch-toggle switch-candy">
											<input id="q4_y" name="q4" type="radio" value="Yes" checked="">
											<label for="q4_y" onclick="">YES</label>

											<input id="q4_n" name="q4" type="radio" value="No">
											<label for="q4_n" onclick="">NO</label>

											<input id="q4_other" name="q4" type="radio" value="Dont Know">
											<label for="q4_other" onclick="">DON'T KNOW</label>
											<a></a>
										</div>
										<br>
									</div>
									
									<div id="q5" class="title columns large-8 large-pull-4" style="display: none;">What type of kit are you investing in?
										<input id="q5" name="q5" type="text" value="" >
									<br></div>
								</div>	
								

								<div class="row">
									<div class="sub_row columns large-12">
										<!-- <a href=""><button type="button"><< BACK</button></a> -->
										<input name="submit" id="submit" type="submit" value="SUBMIT"/><br/><br/>
									</div>
								</div>
							</div>
							
							<br/><br/>
							<br/><br/>
							<br/><br/>
							
							</form>
							
							<!--<div id="form_ajax2">
								[FORMRESULT2]
							</div>-->
							
							
						</div>
					</div>
				</div>
				
				<div id="formnav" class="" style="display: none;">
					<span class="buttons">
					<button id="movestep1" class="movestep1 active xbutton">Step 1</button>
					<button id="movestep2" class="movestep2 xbutton">Step 2</button>
					<button id="movestep3" class="movestep3 xbutton">Step 3</button>
					</span>
				</div>
				
            </div>
            

            
		</div>
	</div>


</div>


</div><br><br><br><br><br>

	<script src="[DOMAIN]/js/vendor/jquery.min.js"></script>
    <script src="[DOMAIN]/js/vendor/what-input.min.js"></script>
    <script src="[DOMAIN]/js/foundation.min.js"></script>
    <!--<script src="[DOMAIN]/js/app.js"></script>-->
	<script>
		jQuery.fn.scrollTo = function(elem, speed) { 
			$(this).animate({
				scrollTop:  $(this).scrollTop() - $(this).offset().top + $(elem).offset().top 
			}, speed == undefined ? 1000 : speed); 
			return this; 
		};
		
		$( document ).ready(function() {
		
			var height = $("#step1").height()
			var styles = {
			  'overflow' : "hidden",
			  'height': $("#step1").height()+50
			};


			$("#form").css( styles );
			$("#formnav, #q5").show();


			$(".movestep1").on("click", function(){
				$("#form").scrollTo("#step1", 500);
				$("html, body").animate({ scrollTop: 0 }, "slow");
				$("#formnav").addClass("step1"); $("#movestep1").addClass("active"); $("#movestep2, #movestep3").removeClass("active");
				$("#formnav").removeClass("step2");
				$("#formnav").removeClass("step3");
				$("#form").css('height', $("#step1").height()+0);
			});

			$(".movestep2").on("click", function(){
				$("#form").scrollTo("#step2", 500);
				$("#formnav").addClass("step2"); $("#movestep2").addClass("active"); $("#movestep1, #movestep3").removeClass("active");
				$("#formnav").removeClass("step1");
				$("#formnav").removeClass("step3");
				$("#form").css('height', $("#step2").height());
			});

			$(".movestep3").on("click", function(){
				$("#form").scrollTo("#step3", 500);
				$("#formnav").addClass("step3"); $("#movestep3").addClass("active"); $("#movestep1, #movestep2").removeClass("active");
				$("#formnav").removeClass("step1");
				$("#formnav").removeClass("step2");
				$("#form").css('height', $("#step3").height()+10);
			});
			
			
			//DEBUG
			//$('#pa_form input').on('change', function() {
				//alert($(this).val()+" - "+$(this).attr("name"));
			//});
			
			$('#pa_form input[name=q1]').on('change', function() {
			   //alert($('input[name="q1"]:checked', '#pa_form').val()); 
			   if ($('input[name=q1]:checked', '#pa_form').val() == "Other"){
				   $("#q1_reveal").show("slow", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   } else {
				   $("#q1_reveal").hide("fast", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   }
			});	
			
			$('#pa_form input[name=q2]').on('change', function() {
			   if ($('input[name=q2]:checked', '#pa_form').val() == "Yes"){
				   $("#q2a_reveal").show("slow", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   } else {
				   $("#q2a_reveal").hide("fast", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   }
			});
			
			$('#pa_form input[name="q2a[]"]').on('change', function() {
			   if ($(this).val() == 'Other') {
				   $("#q2a_other_reveal").show("slow", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   //} else {
				   //$("#q2a_other_reveal").hide("fast", function() {
					 //  $("#form").css('height', $("#step3").height()+10);
				   //});
			   }
			});
			
			$('#pa_form input[name="q3[]"]').on('change', function() {
				if ($(this).val() == 'Other') {
					$("#q3_reveal").show("slow", function() {
						$("#form").css('height', $("#step3").height()+10);
					});
				}
			});

			$('#pa_form input[name=q4]').on('change', function() {
			   if ($('input[name=q4]:checked', '#pa_form').val() != "Yes"){
				   $("#q5").hide("fast", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   } else {
				   $("#q5").show("slow", function() {
					   $("#form").css('height', $("#step3").height()+10);
				   });
			   }
			});

		});

		$( window ).resize(function() {
			//get current section
		});
		
		/*var parentDiv = "#form";
		$(parentDiv).scrollTop($parentDiv.scrollTop() + $innerListItem.position().top);
		$parentDiv.scrollTop($parentDiv.scrollTop() + $innerListItem.position().top - $parentDiv.height()/2 + $innerListItem.height()/2);*/
		
	</script>
</body>
</html>

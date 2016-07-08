<!doctype html>
<html class="no-js mainpage" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Grocer</title>
    <link rel="stylesheet" href="[DOMAIN]/css/foundation.css" />
    <link rel="stylesheet" href="[DOMAIN]/css/style.css" />
    <script src="[DOMAIN]/js/vendor/modernizr.js"></script>
	
  </head>
  <body class="[LEVEL]_level [SUB] main">
	<noscript>
		<div style="text-align: center; background: lightyellow; border-bottom: 1px solid #e0e0e0;">- This site requires javascript to work fully -</div>
	</noscript>
	<br/>
	<div class="row">
      <div class="large-12 columns">
	  
		   <div class="row">
			   <div class="large-8 columns">
					<div class="intro">
						<h1 class="serif" >[WELCOME]</h1>
					</div>
					
					<div class="row">
						<div class="large-6 medium-6 columns">
							<div class="benefits">
							  <h2 class="serif">Explore these exciting new service benefits...</h2>
							  <br class="hidden-mobile"/>
							  [BENEFITS]
							</div>
						</div>
						<div class="large-6 medium-6 columns">
							<div class="central">
								<div class="show-for-large-up prodimage"><p style="text-align: center; margin-top: -20px;">[PRODIMAGE]</p></div>
								
								<div id="miniflip_wrap" class="show-for-large-up">
									[MINIFLIP]
									
									<div id="flip-overlay" class="large-4 medium-4 columns" style="color: #ffffff;">
										<span style="font-family: 'FFUnitWebProUltra'; font-size: 1.6em; color: #333333;">GET RIGHT UP TO THE MINUTE...</span>
										<br/><br/>
										read the latest digital edition of <span class="bold">The Grocer</span> online now.
									</div>
									<div id="arrow" style="width: 18px; margin-left: 35%; font-size: 14px; position: absolute; top: 0px; height: 220px; z-index: 999;">
									</div>
								</div>
							 
							  <div id="news" class="show-for-large-up [LEVEL] [NEWS]" style="clear: both; margin-top: 20px;">
							  
								<div class="rss_feed">
									<div id="newsinner">
										
									</div>
								</div>
							  </div>
							  
							  <div id="" class="hide-for-large-up" style="clear: both;">
								[PA_REGISTER_FORM]
							  </div>
							  
							</div>
						</div>
					</div>
				</div>
				<div class="large-4 columns">
					
					<div class="forms">
					  <div class="show-for-large-up">[PA_REGISTER_FORM]</div>

					  
					  <div>[PA_REFERRAL_FORM]</div>
					</div>
					
					<div id="news" class="hide-for-large-up [LEVEL]" style="clear: both; margin-top: 20px;">
							  
								<div class="rss_feed">
									<div id="newsinner">
										
									</div>
								</div>
					</div>
							  
							  
				</div>
			</div>
      </div>
    </div>
	
	<div class="row" style="margin-top: 20px;">
		<div class="large-12 columns">
			<div class="large-4 columns">
				[DATA_PROTECTION]
			</div>
			
			<div class="large-4 columns text-center">
				<br/>
				<h4>Customer Services: <span class="no-wrap [LEVEL]">0800 652 6512</span><h4>
			</div>
			
			<div class="large-4 columns">
				<br/>
				<!--[DEADLINE]-->
			</div>
		</div>
	</div>
	
	<div id="footer" class="" style="overflow: auto;">
		<div class="row">
			<div class="large-2 medium-2 small-3 columns" style="/*position: absolute; top: 0; left: 0;*/">
				<img id="footer_logo" src="[DOMAIN]/img/WRBM_Transparent Background.png" alt="Willaim Reed BM logo" >
			</div>
			<div class="large-10 medium-10 small-9 columns">
				<p><br/>William Reed Business Media Ltd. Registered in England No. 2883992 at Broadfield Park, Crawley, West Sussex RH11 9RT. VAT Registration Number: GB 644 3073 52</p>
			</div>
		</div>
	</div>
    <script src="[DOMAIN]/js/vendor/jquery.js"></script>
    <script src="[DOMAIN]/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
	  	  
	  $(document).ready(function(){
			$.ajax({
				type: "POST",
				url: "../rss/rss.php",
				data: "feed=[LEVEL]",
				success: function(output){
					$('.rss_feed').html(output);
				}
			});
	  });
    </script>
  </body>
</html>

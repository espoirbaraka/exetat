<?php
include("admin/includes/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>EPST</title>

<link rel="icon" href="img/bg-img/armoirie.png">

<link rel="stylesheet" href="A.style.css.pagespeed.cf.6Lgc-5N5Oh.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="stylesheet" href="component/boostrap/css/bootstrap.min.css">
</head>
<?php 


include('includes/head.php'); 
?>
<div style="margin: 20px auto; width: 500px;">
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="forget-form" method="GET" action="etat_de_sortie/e_question.php?sec=section&&dom=domaine">
							<div class="form-group">
								<label class="control-label">Votre section</label>
								<select name="section" id="section" class="form-control">
									<?php
									$conn=$pdo->open();
									$stmt = $conn->prepare('SELECT * FROM t_section');
									$stmt->execute();
									foreach($stmt as $section)
									{
										?>
										<option value="<?php echo $section['IdSection']; ?>"><?php echo $section['Section'].' '.$section['Option']; ?></option>
									
										<?php
									}
									$pdo->close();
									?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Domaine</label>
								<select name="domaine" id="domaine" class="form-control">
									<?php
									$conn=$pdo->open();
									$stmt = $conn->prepare('SELECT * FROM t_domaine');
									$stmt->execute();
									foreach($stmt as $dom)
									{
										?>
										<option value="<?php echo $dom['IdDomaine']; ?>"><?php echo $dom['Domaine']; ?></option>
									
										<?php
									}
									$pdo->close();
									?>
								</select>
							</div>
							<div class="form-group btn-container">
								<button class="btn btn-primary btn-block"><i class="fa fa-edit fa-lg fa-fw"></i>VOIR</button>
							</div>
				</form>
			</div>
		</div>
	</div>
</div>
    
	
		<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
		<script src="js/jquery/jquery-2.2.4.min.js"></script>
		<script src="js/bootstrap/popper.min.js%2bbootstrap.min.js.pagespeed.jc.lSxBnyOzlA.js"></script>
		<script>
			eval(mod_pagespeed_cUGyfcxL_L);
		</script>
		<script>
			eval(mod_pagespeed_Lfx$YUfqZL);
		</script>
		<script src="js/plugins/plugins.js"></script>
		<script src="js/active.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){
				dataLayer.push(arguments);
			}
			  gtag('js', new Date());
			  gtag('config', 'UA-23581568-13');
		</script>
		<script defer src="../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"66ca2735aa14051d","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.6.0","si":10}'></script>
	</body>

<!-- Mirrored from preview.colorlib.com/theme/clever/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Jul 2021 13:32:11 GMT -->
</html>
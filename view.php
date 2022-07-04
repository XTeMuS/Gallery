<?php
$id=(isset($_GET['id'])) ? $_GET['id'] : '1';

$ch=curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, 'https://gallery.xtemus.com/api.php?m=view&id='.$id);
$result=curl_exec($ch);
curl_close($ch);
$obj=json_decode($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery - xtemus.com</title>
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/theme.css">
	<link rel="icon" sizes="48x48" type="image/png" href="assets/img/Cosmo-Girl-icon.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand font-weight-bolder mr-3" href="index.php"><img src="assets/img/Cosmo-Girl-icon.png"></a>
    <button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsDefault" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarsDefault">
    	<ul class="navbar-nav ml-auto align-items-center">
    		<li class="nav-item">
    		<a class="nav-link active" href="index.php">Home</a>
    		</li>
    		<li class="nav-item">
    		<a class="nav-link" href="index.php"><img class="rounded-circle mr-2" src="assets/img/av.png" width="30"><span class="align-middle">Guest</span></a>
    		</li>
    		<li class="nav-item dropdown">
    		<a class="nav-link" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    		<svg style="margin-top:10px;" class="_3DJPT" version="1.1" viewbox="0 0 32 32" width="21" height="21" aria-hidden="false" data-reactid="71"><path d="M7 15.5c0 1.9-1.6 3.5-3.5 3.5s-3.5-1.6-3.5-3.5 1.6-3.5 3.5-3.5 3.5 1.6 3.5 3.5zm21.5-3.5c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5zm-12.5 0c-1.9 0-3.5 1.6-3.5 3.5s1.6 3.5 3.5 3.5 3.5-1.6 3.5-3.5-1.6-3.5-3.5-3.5z" data-reactid="22"></path></svg>
    		</a>
    		</li>
    	</ul>
    </div>
    </nav>    
    <main role="main">
    <section class="bg-gray200 pt-5 pb-5">

    <div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-7">
    			<article class="card">
    			<img class="card-img-top mb-2" src="<?php echo $obj[0]->picture_image; ?>" alt="ID : <?php echo $obj[0]->picture_id; ?>">
    			<div class="card-body">
    				<h1 class="card-title display-4">
    				Detail</h1>
    				<ul>
    					<li>id  :  <?php echo $obj[0]->picture_id; ?></li>
    					<li>date  :  <?php echo $obj[0]->picture_date; ?></li>
    					<li>view  :  <?php echo $obj[0]->picture_view; ?></li>
    				</ul>
    				<small class="d-block"><a class="btn btn-sm btn-gray200" href="<?php echo $obj[0]->picture_image; ?>" target="_blank"><i class="fa fa-external-link"></i>  Image new tab</a>&nbsp;&nbsp;&nbsp;<a class="btn btn-sm btn-gray200" href="https://gallery.xtemus.com/download.php?id=<?php echo $obj[0]->picture_id; ?>"><i class="fa fa-external-link"></i>  Download Image</a></small>
    			</div>
    			</article>
    		</div>
    	</div>
    </div>

    <div class="container-fluid mt-5">
    	<div class="row">
    		<h5 class="font-weight-bold">More like this <?php echo count($obj); ?></h5>
    		<div class="card-columns">
<?php
$x=1;
while($x<count($obj)) {
?>
    			<div class="card card-pin">
    				<img class="card-img" src="<?php echo $obj[$x]->picture_link; ?>" alt="ID : <?php echo $obj[$x]->picture_id; ?>">
    				<div class="overlay">
    					<h2 class="card-title title">ID : <?php echo $obj[$x]->picture_id; ?></h2>
    					<div class="more">
    						<a href="view.php?id=<?php echo $obj[$x]->picture_id; ?>">
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
    					</div>
    				</div>
    			</div>
<?php
	$x++;
	}			
?>
    		</div>
    	</div>
    </div>
    </section>
    </main>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/theme.js"></script>
    <footer class="footer pt-5 pb-5 text-center">
    <div class="container">
          <div class="socials-media">
            <ul class="list-unstyled">
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-facebook"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-twitter"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-instagram"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-google-plus"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-behance"></i></a></li>
              <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i class="fa fa-dribbble"></i></a></li>
            </ul>
          </div>
            <!--
              All the links in the footer should remain intact.
              You may remove the links only if you donate:
              https://www.wowthemes.net/freebies-license/
            -->
          <p>©  <span class="credits font-weight-bold">        
            <a target="_blank" class="text-dark" href="https://www.wowthemes.net/pintereso-free-html-bootstrap-template/"><u>Pintereso Bootstrap HTML Template</u> by WowThemes.net.</a>
          </span>
          </p>
        </div>
    </footer>    
</body>
</html>
<?php
CloseDB();
?>
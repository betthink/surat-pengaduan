<?php

require '../../../api/config/connect.php';
if (isset($_SESSION['auth'])) {
	$url = base_url('pages/admin/fakultas.php');
	header("Location: $url");
	exit;
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Login 04</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../css/coloring.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" href="<?= base_url('pages/assets/simonita.png') ?>" type="image" />
	<link rel="stylesheet" href="../../css/bootsrap.css">
	<style>
		img {
			vertical-align: middle;
			border-style: none;
			object-fit: cover;
			display: flex;
			justify-content: center;
			width: 100%;
		}
	</style>
</head>

<body>

	<?php require "../../public/template/navbar.php" ?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">

				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="d-flex justify-content-md-center align-items-md-center">
							<img class="img" src="../../assets/simonita.png" alt="">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Log in</h3>
								</div>
							</div>
							<?php if (isset($_SESSION['flash'])) { ?>
								<div class="alert alert-danger" role="alert">
									<?= $_SESSION['flash']['message'] ?>
								</div>
							<?php }    ?>
							<form method="post" action="<?= base_url('api/login.php') ?>" class=" signin-form">
								<div class="form-group mb-3">
									<label class="label" for="name">Username</label>
									<input name="username" type="text" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group mb-3">
									<label class="label" for="password">Password</label>
									<input name="password" type="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
								</div>

							</form>
							<!-- <p class="text-center">Belum punya akun? <a data-toggle="tab" href="#signup">Register</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="js/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="./script.js"></script>

</body>

</html>
<?php unset($_SESSION['flash']) ?>
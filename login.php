<?php  include "includes/db_connect.php"; ?>
<?php  include "includes/header.php"; ?>
<!-- Navigation -->
<?php  include "includes/nav.php"; ?>
<!-- Page Content -->
<script>
	 window.setTimeout(function() {
	 $(".alert").fadeTo(300, 0).slideUp(300, function(){
			 $(this).remove();
	 });
}, 4000);
</script>
<?php
if(isset($_SESSION['role'])){
	redirect('/cms/admin');
}
?>

<div class="container">
	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">
							<h3><i class="fa fa-user fa-4x"></i></h3>
							<h2 class="text-center">Login</h2>

							<div class="panel-body">

								<form id="login-form"  action="/cms/includes/login.php" role="form" autocomplete="off" class="form" method="post">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
											<input name="username" type="text" class="form-control" placeholder="Enter Username">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>
									<div class="form-group">
										<a href="/cms/forgot?pswrd=<?php echo uniqid(true);?>t">Forgot Password ?</a>
									</div>
									<div class="form-group">
										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>
								</form>
							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->

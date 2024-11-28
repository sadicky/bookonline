<?php
$title =  'Verification du Compte';
include('Public/includes/header.php');
?>
<div class="card">
	<div class="card-inner">

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
		<div class="box box-body">
			<div class="content-top-agile">
				<h2 class="text-primary">Vérification</h2>
				<p class="mb-0"><i>Entrez le code envoyé dans votre boite email</i></p>
			</div>
			<div class="py-10">
				<form method="post" id="formverify">
					<input type="hidden" id="email" name="email" value="<?php echo $_GET['email']; ?>">
					<div class="form-group">
						<div class="input-group mb-15">
							<span class="input-group-text bg-transparent"><em class="icon ni ni-lock-fill"></em></span>
							<input type="text" class="form-control ps-15 bg-transparent" id="code" name="code" placeholder="Code de Vérification" required>
						</div>
					</div>
					<div class="row">
						<!-- /.col -->
						<div class="col-12 text-center">
							<button type="submit" id="submit" class="btn btn-info w-p100 mt-15">VERIFIER</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				
						
				<div class='col-sm-12 my-6' id="message"></div>
			</div>
		</div>

			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>
<?php
    include('Public/includes/footer.php');
    ?>
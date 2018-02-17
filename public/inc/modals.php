<!--========== MODAL LOGIN ==========-->
<div class="modal fade" id="loginPanel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<span id="connectLabel"><i class="fa fa-user-o"></i> Connectez-vous</span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<div class="modal-body modal-spa">
				<div class="col-sm-12">
					<form class="form-horizontal" role="form" name="form" action="verifLogin.php" method="post">
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="text" name="username" class="form-control infos-input" placeholder="Nom d'utilisateur">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="password" name="password" class="form-control infos-input "  placeholder="Mot de passe">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2 col-sm-offset-5">
								<button type="submit" class="btn btn-primary">Se connecter</button>
							</div>
						</div>
					</form>
					<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#subscribePanel">S'inscrire</a>
				</div>        
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--========== MODAL LOGIN ==========-->

<!--========== MODAL SUBSCRIBE ==========-->
<div class="modal fade" id="subscribePanel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<span id="connectLabel"><i class="fa fa-user-o"></i> Inscrivez-vous</span>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<div class="modal-body modal-spa">
				<div class="col-sm-12">
					<form class="form-horizontal" role="form" name="form" action="verifSignup.php" method="post">
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="text" name="username" class="form-control infos-input" id="utilisateur" placeholder="Nom d'utilisateur">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="email" name="email" class="form-control infos-input " id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="password" name="password" class=" form-control infos-input" id="pass1" placeholder="Mot de passe">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-1 margin-b-30">
								 <input type="password" name="password2" class="form-control infos-input" id="pass2" placeholder="Confirmer mot de passe">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-2 col-sm-offset-5">
								<button type="submit" id="valider" class="btn btn-primary">S'inscrire</button>
							</div>
						</div>
					</form>
					<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#loginPanel">Se connecter</a>
				</div>      
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--========== MODAL SUBSCRIBE ==========-->
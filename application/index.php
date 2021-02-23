<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
			<title>Application test Mac2</title>
		</head>
		<body>
			<div class="container"></div>
			
			<div class="modal" id="connexion" style='display:none'> 
					<div class="modal-dialog modal-sm">   
						<div class="modal-content">     
							<div class="modal-header">       
								<button type="button" class="close btn btn-danger" data-dismiss="modal" id='retireformdemandeuser'>x</button>
								<h4 class="modal-title"><center>Connexion</center></h4>  
							</div>     
							<div class="modal-body">  
								 <div class="panel panel-primary">
									<div class="panel-heading">
										<h4><center></center></h4>
									</div>
									<div class="panel-body">
										<form action ="" method="post" data-url="controleur/connection.php" id="form_connection">
											<span id='messageconnection' style='color:red'></span>
											<div class="form-group">
												<label for="loginformconnection">Login:</label>
												<input type="text" class="form-control" required id="loginformconnection"  name="login" placeholder="entrer votre Login">
											</div>
											<div class="form-group">
												<label for='mdp'>Mot de passe:</label>
												<div class="input-group"> 
													<input type="password" class="form-control invisibless" required name="mdp" id='mdp'> 
													<span class="input-group-addon" id='affichermdp' style='cursor:pointer'><span class='glyphicon glyphicon-eye-close'></span></span> 
												</div>
											</div>
											<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span> Entrer</button>
										</form>
								</div>
							</div> 
						</div> 
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="formajoutusers" style='display:none'> 
					<div class="modal-dialog modal-md">   
						<div class="modal-content">     
							<div class="modal-header">       
								<button type="button" class="close btn btn-danger" id='retireformentreprise' data-dismiss="modal">x</button>
								<h4 class="modal-title nbreentrepriseajouter" ><center>utilisateurs(s) ajouté(s) </center></h4>     
							</div>     
							<div class="modal-body">  
								 <div class="panel panel-primary">
									<div class="panel-heading nbreformrestant">
										
									</div>
									<div class="panel-body">
										<form action ="" method="post" data-url="controleur/ajoutusers.php" id="form_ajoutusers">
											<div class="form-group" id='divpageentreprise'>
												<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
													<div class="form-group">
														<label>Nom:</label>
														<input type="text" class="form-control ajoute"  name="nom" required> 
													</div>
													<div class="form-group">
														<label>Prenom:</label>
														<input type="text" class="form-control ajoute"  name="prenom" required> 
													</div>
													<div class="form-group">
														<label>Email:</label>
														<input type="email" class="form-control ajoute"  name="email" required> 
													</div>
													<div class="form-group">
														<label>Téléphone:</label>
														<input type="number" class="form-control ajoute"  name="telephone" minlength='10' maxlength='10'  required> 
													</div>
												</div>
												<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
													<div class="form-group">
														<label>Adresse:</label>
														<input type="text" class="form-control ajoute"  name="adresse" required> 
													</div>
													<div class="form-group">
														<label>Code postal:</label>
														<input type="number" class="form-control ajoute"  name="code_postal" placeholder='Ex:94500' required> 
													</div>
													<div class="form-group">
														<label>Ville:</label>
														<input type="text" class="form-control ajoute"  name="ville" required> 
													</div>
													<div class="form-group">
														<label>Commentaire:</label>
														<textarea class="form-control z-depth-1 ajoute textareafr" name="commentaire" style="color:#008080" rows="3" placeholder="Ecrivez ici..."></textarea>
													</div>
												</div>
												<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>   Ajouter</button>
												<input type="reset" class='resetformentreprise' style='display:none'>
											</div>
										</form>
								</div>
							</div> 
						</div> 
					</div>
				</div>
			</div>
			
			<script src="js/jquery.js"></script>
			<script src="bootstrap/js/bootstrap.js"></script>
			<script src="js/tagant_plugin_manager.js"></script>
			<script src="js/index.js"></script>
		</body>
	</html>

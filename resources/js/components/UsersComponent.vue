<template>
    <div class="container">
        <div class="row justify-content-center">
             <center><h3>Utilisateurs</h3></center><br>
    <form action ="" id="form_ajoutusers">
											<div class='row' id='divpageentreprise'>
												<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
													<div class="form-group">
														<label>Nom:</label>
														<input type="text" class="form-control ajoute"  v-model="name" required> 
													</div>
													<div class="form-group">
														<label>Prenom:</label>
														<input type="text" class="form-control ajoute"  v-model="prenom" required> 
													</div>
													<div class="form-group">
														<label>Email:</label>
														<input type="email" class="form-control ajoute"  v-model="email" required> 
													</div>
													<div class="form-group">
														<label>Téléphone:</label>
														<input type="number" class="form-control ajoute"  v-model="telephone" minlength='10' maxlength='10'  required> 
													</div>
												</div>
												<div class='col-xs-6 col-sm-6 col-md-6 col-lg-6'>
													<div class="form-group">
														<label>Adresse:</label>
														<input type="text" class="form-control ajoute"  v-model="adresse" required> 
													</div>
													<div class="form-group">
														<label>Code postal:</label>
														<input type="number" class="form-control ajoute"  v-model="code_postal" placeholder='Ex:94500' required> 
													</div>
													<div class="form-group">
														<label>Ville:</label>
														<input type="text" class="form-control ajoute"  v-model="ville" required> 
													</div>
													<div class="form-group">
														<label>Commentaire:</label>
														<textarea class="form-control z-depth-1 ajoute textareafr" v-model="commentaire" style="color:#008080" rows="3" placeholder="Ecrivez ici..."></textarea>
													</div>
												</div>
												<input type="reset" class='resetformentreprise' style='display:none'>
                                            </div><br>
                                            <button @click="persist" class="btn btn-success" type="submit"><span class="glyphicon glyphicon-ok-sign"></span>   Envoyer</button>
										</form>
        </div>
    </div>
</template>

<script>
    export default {
		data(){
			return{
				name: '',
				prenom: '',
				email: '',
				telephone: '',
				adresse: '',
				code_postal: '',
				ville: '',
				commentaire: ''
			}
		},
        mounted() {
            console.log('Component mounted.');
		},
		methods: {
			persist() {
				alert('je vois bien');
				/*if(localStorage.getItem('users_unsave')){
					alert('j existe');
					var mon_user = this.email;
					var tab0= [
						{
							name: this.name,
							prenom: this.prenom,
							email: this.email,
							telephone: this.telephone,
							adresse: this.adresse,
							code_postal: this.code_postal,
							ville: this.ville,
							commentaire: this.commentaire
						}
     					
					];
					var tab1 = localStorage.getItem('users_unsave');
					tab1 = tab1.push({mon_user:tab0});
					localStorage.setItem('users_unsave',tab1);

				}else{
					alert('je n\'existe');
					var mon_user = this.email;
					var tab0= [
						{
							name: this.name,
							prenom: this.prenom,
							email: this.email,
							telephone: this.telephone,
							adresse: this.adresse,
							code_postal: this.code_postal,
							ville: this.ville,
							commentaire: this.commentaire
						}
     					
					];
					var tab1= [
						{
							mon_user: tab0
						}
					];
					localStorage.setItem('users_unsave',tab1);
				}*/
				alert('sauvegarde effectuée');
				/*var t = localStorage.getItem('users_unsave');
				for(var i in t){
					for(var j in t[i]){
						alert(t[i][j]);
					}
				}*/
				localStorage.setItem('name',this.name);
				localStorage.setItem('prenom',this.prenom);
				localStorage.setItem('email',this.email);
				localStorage.setItem('telephone',this.telephone);
				localStorage.setItem('adresse',this.adresse);
				localStorage.setItem('code_postal',this.code_postal);
				localStorage.setItem('ville',this.ville);
				localStorage.setItem('commentaire',this.commentaire);
				
				//console.log('maintenant prétendre que j\'ai fait plus de choses...');
				
			}
		}
    }
</script>

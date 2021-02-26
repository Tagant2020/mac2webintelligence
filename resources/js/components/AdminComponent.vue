<template>
        <div class="row justify-content-center">
            <center><h3>Administrateurs</h3></center><br><br>

            <div class="panel panel-primary">
				<div class="panel-heading" style='margin-top:2em'>
					<h1 style="font-size:20px"><center style='display:inline-block;margin-left:40%'><span class='glyphicon glyphicon-user' style='display:inline-block'>    Liste des utilisateurs</span></center></h1>
				</div>
				<div class="panel-body table-responsive table-wrapper-scroll-y" style='margin-top:3em'>
					<table class="table table-striped table-condensed">
						<thead>
							<th>Noms</th>
							<th>Prenoms</th>
							<th>Email</th>
							<th>Téléphone</th>
							<th>Adresse</th>
							<th>Code postal</th>
							<th>Ville</th>
							<th>Commentaires</th>
							<th>options</th>
						</thead>	
						<tbody id='corpsCompte'>
							<tr>
								<td >{{name}}</td>
								<td >{{prenom}}</td>
								<td >{{email}}</td>
								<td >{{telephone}}</td>
								<td >{{adresse}}</td>
								<td >{{code_postal}}</td>
								<td >{{ville}}</td>
								<td >{{commentaire}}</td>
								<td ><button @click='saveUser' class='btn btn-success'>save</button> | <button @click='deleteUser' class='btn btn-danger'>del</button></td>
							</tr>
						</tbody>
					</table>
				</div>
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
		created(){
			axios.get('http://mac2.test/users')
				.then(response => this.user = response.data)
				.catch(error => console.log(error));
		},
        mounted() {
			if(localStorage.getItem('name')){
				this.name = localStorage.getItem('name');
				this.prenom = localStorage.getItem('prenom');
				this.email = localStorage.getItem('email');
				this.telephone = localStorage.getItem('telephone');
				this.adresse = localStorage.getItem('adresse');
				this.code_postal = localStorage.getItem('code_postal');
				this.ville = localStorage.getItem('ville');
				this.commentaire = localStorage.getItem('commentaire');
			}
            console.log('Component mounted.')
		},
		methods:{
			saveUser(){
				axios.post('http://mac2.test/users',{
					name: this.name,
					prenom: this.prenom,
					email: this.email,
					telephone: this.name,
					adresse: this.adresse,
					code_postal: this.code_postal,
					ville: this.ville,
					commentaire: this.commentaire,
				})
				.then(function(){
					localStorage.clear();
				})
				.catch(error => console.log(error));
			},
			deleteUser(){
				alert('mon test')
			}
		}
    }
</script>

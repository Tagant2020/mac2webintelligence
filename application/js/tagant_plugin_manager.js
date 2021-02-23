 $(function(){
	//**********code servant a stopper,avancer,faire reculer un caroussel
	jQuery.fn.tagant_recup = function(){
		var liste ='';
		var numero_users ='';
							$.ajax({
								url:'controleur/recupusers.php',
								type:'post',
								dataType:'json',
								data:'',
								success:function(data){
									for(var i in data){
										liste += '<tr>';
										for(var j in data[i]){
											if(j != 'num_users' && j != 'login' && j != 'mdp'){
												liste += '<td>'+data[i][j]+'</td>';
											}
											if(j == 'num_users'){
												numero_users = data[i][j];
											}
										}
										liste += '<td><button name='+numero_users+' class="update glyphicon glyphicon-pencil btn btn-primary"></button><br><br><button name='+numero_users+' class="delete glyphicon glyphicon-trash btn btn-danger"></button></td>';
										liste += '</tr>';
									}
									liste += '<tr>';
									$('body #corpsCompte').html(liste);
								}
							})
					}
					
	jQuery.fn.tagant_insert_page = function(url){
							$.ajax({
								url:'vue/'+url+'.html',
								type:'post',
								data:'',
								success:function(data){
									if(url == 'accueil'){
										$('body .container').html(data);
										$('body .container').attr('style','position:relative;top:12em');
									}else if(url == 'compte'){
										$('body .container').html(data);
										$('body .container').attr('style','position:relative;top:12em');
									}else if(url == 'interface_users'){
										$('body .container').html(data);
										$('body .container').attr('style','position:relative;top:12em');
									}
									
								}
							})
					}
					jQuery.fn.tagant_submit_form_connexion = function(form_soumis){
						this.on('submit',form_soumis,function(e){
							e.preventDefault();
							var th= $(this);
							var url = th.data('url');
							$.ajax({
								url:url,
								type:'post',
								dataType:'json',
								data:th.serialize(),
								success:function(data){
									$('body #retireformdemandeuser').trigger('click');
									if(data == 'exist'){
										$('body').tagant_insert_page('compte');
										$('body').tagant_recup();
									}else if(data == 'no_exist'){
										alert('Données erronées veuillez réessayer ');
									}
								}
							})
						})
					}
					jQuery.fn.tagant_submit_form_users = function(form_soumis){
						this.on('submit',form_soumis,function(e){
							e.preventDefault();
							var th= $(this);
							var url = th.data('url');
							var dimoi = '';
							if(localStorage.getItem('userexiste') !=  null && sessionStorage.getItem('jeveuxmodifier') ==  null){
								 	$.ajax({
										url:'model/modifusers.php',
										type:'post',
										dataType:'json',
										data:th.serialize()+'&id='+localStorage.getItem('num_users'),
										success:function(data){
											$('body #retireformentreprise').trigger('click');
											if(data == ''){
												
											}else{
												for(var i in data){
													for(var j in data[i]){
														localStorage.setItem(j,data[i][j]);
													}
												}
												localStorage.setItem('userexiste','oui');
											}
										}
									})
							}else if(sessionStorage.getItem('jeveuxmodifier') ==  'oui'){
								 	$.ajax({
										url:'model/modifusers.php',
										type:'post',
										dataType:'json',
										data:th.serialize()+'&id='+sessionStorage.getItem('id_encour'),
										success:function(data){
											$('body #retireformentreprise').trigger('click');
											$('body').tagant_recup();
											if(data == ''){
												
											}else{
												for(var i in data){
													for(var j in data[i]){
														localStorage.setItem(j,data[i][j]);
													}
												}
												localStorage.setItem('userexiste','oui');
											}
										}
									})
									sessionStorage.clear();
							}else{
									$.ajax({
										url:url,
										type:'post',
										dataType:'json',
										data:th.serialize(),
										success:function(data){
											$('body #retireformentreprise').trigger('click');
											if(data == ''){
												
											}else{
												for(var i in data){
													for(var j in data[i]){
														localStorage.setItem(j,data[i][j]);
													}
												}
												localStorage.setItem('userexiste','oui');
											}
										}
									})
							}
						})
					}
	
 })
	
	
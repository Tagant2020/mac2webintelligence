$(function(){ //doliprane,ixprim,ventoline,pivalone
		
		//***********************
			$('body').tagant_insert_page('accueil');
			$('body').tagant_submit_form_users('#form_ajoutusers');
			$('body').tagant_submit_form_connexion('#form_connection');
		//***********************
		$('body').on('change','#valcatform',function(e){
			e.preventDefault();
			var th = $(this);
			var val = th.val();
			if(val == 'Incubes'){
				$('body #boursierincubes').removeAttr('style');
				$('body #boursierformationtechniqueid').attr('style','display:none');
				$('body #boursierincubesid').attr('style','display:none');
				$('body #boursierformationtechnique').attr('style','display:none');
			}else if(val == 'Formation technique'){
				$('body #boursierformationtechnique').removeAttr('style');
				$('body #boursierincubesid').attr('style','display:none');
				$('body #boursierincubes').attr('style','display:none');
				$('body #boursierformationtechniqueid').attr('style','display:none');
			}
		})
		
		$('body').on('click','.accueil',function(e){
			e.preventDefault();
			var th = $(this);
			var nom = th.attr('name');
			if(nom == 'admin'){
				$('body #connexion').removeAttr('style'); 
				$('body #connexion').modal('show'); 
			}else if(nom == 'users'){
				$('body').tagant_insert_page('interface_users');
			}
		})
		$('body').on('click','#ajouteruser',function(e) { 
			e.preventDefault();
			if(localStorage.getItem('nom') != null){
				$('body #formajoutusers').removeAttr('style'); 
				$('body #formajoutusers').modal('show'); 
				$('body .ajoute').each(function(){
					var th = $(this);
					var nom = th.attr('name');
					
					if(nom != 'commentaire'){
						th.val(localStorage.getItem(nom));
					}else{
						th.text(localStorage.getItem(nom));
					}
				})
			}else{
				$('body #formajoutusers').removeAttr('style'); 
				$('body #formajoutusers').modal('show'); 
			}
			
		});
		
		$('body').on('click','.retourversaccueil',function(e) { 
			e.preventDefault();
			$('body').tagant_insert_page('accueil');
		});
		
		$('body').on('click','#affichermdp',function(e){
			e.preventDefault();
			if($('body #mdp').hasClass('invisibless')){
				var valeur = $('body #mdp').val();
				$('body #mdp').attr('type','text');
				$('body #mdp').attr('value',valeur);
				$('body #mdp').removeClass('invisibless');
				$('body #mdp').addClass('visibless');
				$('body #affichermdp span').removeClass('glyphicon-eye-close');
				$('body #affichermdp span').addClass('glyphicon-eye-open');
			}else{
				$('body #mdp').attr('type','password');
				$('body #mdp').addClass('visibless');
				$('body #mdp').addClass('invisibless');
				$('body #affichermdp span').removeClass('glyphicon-eye-open');
				$('body #affichermdp span').addClass('glyphicon-eye-close');
			}
			
		})
		$('body').on('click','.delete',function(e) { 
			e.preventDefault();
			var th = $(this);
			var id = th.attr('name');
				$.ajax({
					url:'model/suppressionuser.php',
					type:'post',
					dataType:'json',
					data:'id='+id,
					success:function(data){
						th.parent().parent().remove();
					}
				})
		});
		$('body').on('click','.update',function(e){ 
			e.preventDefault();
			var th = $(this);
			var id = th.attr('name');
			var tab = [];
			var parentss = th.parent().parent();
				parentss.children('td').each(function(d){
					var th2 = $(this);
					tab.push(th2.text());				
				})
				
				$('body #formajoutusers').removeAttr('style'); 
				$('body #formajoutusers').modal('show'); 
				$('body .ajoute').each(function(p){
					var th2 = $(this);
					var nom = th2.attr('name');
					
					if(nom != 'commentaire'){
						th2.val(tab[p]);
					}else{
						th2.text(tab[p]);
					}
				})
				sessionStorage.setItem('id_encour',id);
				sessionStorage.setItem('jeveuxmodifier','oui');
		});
})
 
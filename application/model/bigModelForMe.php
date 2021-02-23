<?php
			try
			{
				$db = new PDO('mysql:host=localhost;dbname=mac2','root','');
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$manager = new Manager($db);
	 class Manager{
		private $db;
		public function __construct($db){
			$this->db = $db;
		}
		public function insertion($table,array $data){
			$q = "INSERT INTO $table(";
			foreach($data as $key => $val){
				$q .= $key.",";
			}
			$q = substr($q,0,-1);
			$q .=") VALUES(";
			foreach($data as $key => $val){
					if(is_int($val)or gettype($val)== 'object'){
						$q .= $val.",";
					}else{
						$q .= "'".$val."',";
					}
			}
			$q =substr($q,0,-1);
			$q .=")";

			$this->db->query($q);
			return $q;
		}
		public function insertion_photos($table,array $data){
			$v = 0;
			foreach($data as $val){
				$v +=1 ;
				if($v == 2){
					foreach($val as $val2){
						$q = "INSERT INTO $table(";
						foreach($data as $key => $val3){
							$q .= $key.",";
						}
						$q = substr($q,0,-1);
						$q .=") VALUES(";
						$n = 0;
						foreach($data as $val4){
							$n += 1;
							if($n == 1){
									$q .= $val4.",";
							}else{
								$q .= "'".$val2."',";
							}
						}
						$q =substr($q,0,-1);
						$q .=")";

						$this->db->query($q);
					}
				}
			}
			return $q;
		}
		public function selection($table,array $champs){
			$q = "SELECT " ;
			foreach($champs as $key=>$val){
				$q .= "$val".",";
			}
			$q = substr($q,0,-1);
			$q .= " FROM $table";
			$v = $this->db->query($q);
			$r = array();
			while($donneee = $v->fetch(PDO::FETCH_OBJ)){
				$r[] = $donneee ;
			}
			return $r ;
		}
		public function selection_par_ordre($table,array $champs,$contrainte,$ordre){
			$q = "SELECT " ;
			foreach($champs as $key=>$val){
				$q .= "$val".",";
			}
			$q = substr($q,0,-1);
			$q .= " FROM $table where $contrainte  $ordre";
			$v = $this->db->query($q);
			$r = array();
			while($donneee = $v->fetch(PDO::FETCH_OBJ)){
				$r[] = $donneee ;
			}
			return $r ;
		}
		public function selectionUnique($table,array $champs,$id,$id_name){
			$q = "SELECT " ;
			foreach($champs as $val){
				$q .= "$val".",";
			}
			$q = substr($q,0,-1);
			$q .= " FROM $table";
			$q .= " WHERE $id_name = $id";
			$v = $this->db->query($q);
			$r = array();
			while($donneee = $v->fetch(PDO::FETCH_OBJ)){
				$r[] = $donneee ;
			}
			return $r ;
		}
		public function selectionUnique2($table,array $champs,$contrainte){
			$q = "SELECT " ;
			foreach($champs as $val){
				$q .= "$val".",";
			}
			$q = substr($q,0,-1);
			$q .= " FROM $table";
			$q .= " WHERE $contrainte";
			$v = $this->db->query($q);
			$r = array();
			while($donneee = $v->fetch(PDO::FETCH_OBJ)){
				$r[] = $donneee ;
			}
			return $r ;
		}
		public function modifier($table,array $champs,$contrainte){
			$q = "UPDATE $table SET ";
			$r = array();
			foreach($champs as $key=>$val){
				if($key == 'Filiere_id' or $key == 'Cohorte_Id' or $key == 'Service_Id' or $key == 'TypeApprenant_Id'){
					$q .= " $key = $val," ;
				}else{
					$q .= " $key = '$val'," ;
				}
				
			}
			$q = substr($q,0,-1);
			$q .= " WHERE $contrainte";
			$v = $this->db->query($q);
			return $q;
		}
		public function dernierIdInserer(){
			$id = $this->db->lastInsertId();
			return $id;
		}
		public function supprimer($table,$contrainte){
			$q = "DELETE FROM $table WHERE $contrainte";
			$this->db->query($q);
			return $q;
		}
		public function compter($champs,$table,$sexe){
			$recup = $this->db->query("SELECT COUNT(*) FROM $table WHERE sexe = $sexe");
			return $recup ;
		}
		public function exists($table,$champs){
			$q = "SELECT * FROM $table WHERE ";
			foreach($champs as $key=>$val){
				$q .= " $key = '$val' AND" ;
			}
			$q = substr($q,0,-3);
			$v = $this->db->query($q);
			$recup = $v->fetch(PDO::FETCH_OBJ);
			return $recup;
		}
	}
?>
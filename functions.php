<?php

	include("../config.php");
	include(DBAPI);

	$customers = null;
	$customer = null;

	/**
	 *  Listagem de Clientes
	 */
	function index() {
		global $customers;
		$customers = find_all("customers");
	}
	
	/**
	*  Visualização de um Cliente
	*/
	function view($id = null) {
		global $customer;
		$customer = find("customers", $id);
	}
			/**
		 *  Cadastro de Clientes
		 */
		function add() {

		  if (!empty($_POST['customer'])) {
			
			$today = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));

			$customer = $_POST['customer'];
			$customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
			
			save("customers", $customer);
			header('location: index.php');
		  }
		}
		
		/**
		*	Atualizacao/Edicao de Cliente
		*/
		function edit() {

			$now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

			if (isset($_GET['id'])) {

				$id = $_GET['id'];

				if (isset($_POST['customer'])) {

					$customer = $_POST['customer'];
					$customer['modified'] = $now->format("Y-m-d H:i:s");

					update('customers', $id, $customer);
					header('location: index.php');
				} else {

					global $customer;
					$customer = find('customers', $id);
				} 
			} else {
				header('location: index.php');
			}
		}
	
	
	/**
	 *  Formata as datas
	 */
	function formatadata($data, $formato) {
		$dt = new DateTime($data, new DateTimeZone("America/Sao_Paulo"));
		return $dt->format($formato);
	}
	
	/**
	 *  Formata o CEP
	 */
	function formatacep($cep) {
		return substr($cep, 0, 5) . "-" . substr($cep, 5, 3);
		return $cf;
	}
	
	function formatacel($cel) {
		return substr($cel, 0, 2) . " " . substr($cel, 2, 7) . "-" .  substr($cel, 7, 11) ;
		return $cf;
	}
	
	/**
	*  Atualiza um registro em uma tabela, por ID
		*/
			function update($table = null, $id = 0, $data = null) {

				$database = open_database();

				$items = null;

				foreach ($data as $key => $value) {
					$items .= trim($key, "'") . "='$value',";
				}

				// remove a ultima virgula
				$items = rtrim($items, ',');

				$sql  = "UPDATE " . $table;
				$sql .= " SET $items";
				$sql .= " WHERE id=" . $id . ";";

				try {
					$database->query($sql);

					$_SESSION['message'] = "Registro atualizado com sucesso.";
					$_SESSION['type'] = "success";

				} catch (Exception $e) { 

					$_SESSION['message'] = "Não foi possivel realizar a operação.";
					$_SESSION['type'] = "danger";
				} 

				close_database($database);
			}
	
?>
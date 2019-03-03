<?php 
session_start();
require_once('../../includes/bootstrap.php');
if(isset($_POST['register_parent'])){
	if(isset($_POST['is_single_parent'])){
		
		//here we have to change dadar to db_name coming from employee session
		$parents = new Parents($_SESSION['branch']);
		if(!$_POST['is_single_parent']){
			
			$document_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['parent_document_1']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
			$temp = explode("/", $_FILES['parent_document_1']['type']);
            $document_ext = $temp[1];
			$_POST['parent_document_1'] = $document_blob;
			$_POST['document_extension_1'] = $document_ext;
			
			$parents->insertParent($_POST);
			$baseurl = BASEPAGES;
			header('Loation: {$baseurl}parents.php');
		}else{
			$document_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['parent_document_1']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
			$temp = explode("/", $_FILES['parent_document_1']['type']);
            $document_ext = $temp[1];
			$_POST['parent_document_1'] = $document_blob;
			$_POST['document_extension_1'] = $document_ext;
			
			$document_blob = new MongoDB\BSON\Binary(file_get_contents($_FILES['parent_document_2']['tmp_name']), MongoDB\BSON\Binary::TYPE_GENERIC);
			$temp = explode("/", $_FILES['parent_document_2']['type']);
            $document_ext = $temp[1];
			$_POST['parent_document_2'] = $document_blob;
			$_POST['document_extension_2'] = $document_ext;
			
			$parents->insertParents($_POST);
			header('Loation: {$baseurl}parents.php');
		}
	}
}

?>
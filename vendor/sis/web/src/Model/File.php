<?php 

	namespace Sisweb\Model;
	use \Sisweb\Model;
	use \Sisweb\Model\Media;
	use \Sisweb\DB\Database;

	/**
	 * 
	 */
	class File extends Model{

		const ERROR = "FileError";
		const SUCCESS = "FileSuccess";
		
		public static function upload($idcustomer, $idrequest, $file, $i, $dirUploadsCustomer){
			
			File::verifySizeMedia($file, $i);

			if (!$file["error"][$i] === 0) {
				throw new \Exception("Error: ".$file["error"][$i]);		
			}

			if (move_uploaded_file($file['tmp_name'][$i], $dirUploadsCustomer.DIRECTORY_SEPARATOR.$file['name'][$i])) {
				return true;
			} else {
				throw new \Exception("Não foi possível realizar o upload.");
			}
		}

		public static function dirname($idcustomer){

			$dirUploads = "res".DIRECTORY_SEPARATOR."uploads";
			$dirUploadsCustomer = $dirUploads.DIRECTORY_SEPARATOR."UPCR-00".$idcustomer;

			if (!is_dir($dirUploads)) {
				mkdir($dirUploads);
			}

			if(!is_dir($dirUploadsCustomer)){
				mkdir($dirUploadsCustomer);
			}

			return $dirUploadsCustomer;	
		}

		public static function newName($file, $i, $idcustomer, $idmedia, $idrequest){


			if($file["type"][$i] === "image/jpeg"){
				$extension = ".jpeg";
				$type = "IMGJPEG";
				$midia = "Imagem";
			}

			if($file["type"][$i] === "image/png"){
				$extension = ".png";
				$type = "IMGPNG";
				$midia = "Imagem";
			}

			if ($file["type"][$i] === "audio/mp3") {
				$extension = ".mp3";
				$type = "ADOMP3";
				$midia = "Audio";
			}			

			if ($file["type"][$i] === "video/mp4") {
				$extension = ".mp4";
				$type = "VDOMP4";
				$midia = "Video";
			}

			$newName = "MACR".$idcustomer.$type."-".$idrequest."000".$idmedia.$extension;

			$data = array(
				"newname"=>$newName,
				"midia"=>$midia
			);

			return $data;
		}

		public static function verifySizeMedia($file, $i){

			$sizeSuportt = (int)8388608;

			if(!$file["size"][$i] > $sizeSuportt){
				throw new \Exception("Tamanho total de arquivos não suportado!");
			}
		}

		public static function renanmeUpload($file, $i, $dirUploadsCustomer, $newName)
		{
			rename($dirUploadsCustomer.DIRECTORY_SEPARATOR.$file["name"][$i], 
						$dirUploadsCustomer.DIRECTORY_SEPARATOR.$newName);
		}

		public function download($link, $nameuser){
			$content = file_get_contents($link);
			$caminho = "C:\Users".DIRECTORY_SEPARATOR.$nameuser.DIRECTORY_SEPARATOR."Downloads";
			$parse = parse_url($link);
			$basename = basename($parse['path']);
			$file = fopen($caminho.DIRECTORY_SEPARATOR.$basename, "w+");
			fwrite($file, $content);
			fclose($file);
			$this->setSuccess("Download realizado com sucesso!");
		}

		public static function setError($msg){
			$_SESSION[File::ERROR] = $msg;
		}

		public static function getError(){
			$msg = (isset($_SESSION[File::ERROR]) && $_SESSION[File::ERROR]) ? $_SESSION[File::ERROR] : '';
			File::clearError();
			return $msg;
		}

		public static function clearError(){
			$_SESSION[File::ERROR] = NULL;
		}

		public static function setSuccess($msg){
			$_SESSION[File::SUCCESS] = $msg;
		}

		public static function getSuccess(){
			$msg = (isset($_SESSION[File::SUCCESS]) && $_SESSION[File::SUCCESS]) ? $_SESSION[File::SUCCESS] : '';
			File::clearSuccess();
			return $msg;
		}

		public static function clearSuccess(){
			$_SESSION[File::SUCCESS] = NULL;
		}

	}

 ?>
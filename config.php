<?php 
	spl_autoload_register(function($nomeClasse){
		$NomeArquivo = 'classes' . DIRECTORY_SEPARATOR . $nomeClasse . '.php';
		if(file_exists($NomeArquivo)){
			require_once($NomeArquivo);
		}
	});

 ?>
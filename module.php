<?php
$new_module="example";
$new_module_root_file=$new_module.".php";
$dir=scandir(".");
print("<pre>".print_r($dir)."</pre>");
$result="";
if(in_array($new_module_root_file,$dir)){
	echo "<br>".$new_module_root_file." exists<br>cannot proceed!<br>";
}else{
	echo "<br>".$new_module_root_file." does not exist<br>ok to proceed..<br>";
	okToProceed($result);
}
function okToProceed(){
	$folders_required=array("classes","javascript","templates/".$GLOBALS['new_module'],"css","api");
	for($i=0;$i<count($folders_required);$i++){
		if(!in_array($folders_required[$i],$GLOBALS['dir'])){
			mkdir($folders_required[$i]);
			echo $folders_required[$i]." folder created<br>";
		}else{
			echo $folders_required[$i]." folder already exists<br>";
		}
	}
	echo "--------------------------------------------------------------<br>";
	echo "folders set, start generating files<br>";
	generateFiles();
}
function generateFiles(){	
	$new_module_root_file=$GLOBALS['new_module_root_file'];
	$new_module=$GLOBALS['new_module'];
	$files_required=array($new_module=>".php",
		"classes/"=>$new_module_root_file,
		"javascript/"=>$new_module.".js",
		"templates/".$new_module."/"=>"index.php",
		"css/"=>$new_module.".css",
		"api/"=>$new_module_root_file);
		foreach($files_required as $key => $value){
			$temp_file=fopen($key.$value, "w");
			switch($key.$value){
				case $new_module_root_file :
					addModuleRootFileText($key.$value);
				case "classes/".$new_module_root_file :
					addClassText($key.$value, $new_module);
					break;
				case "javascript/".$new_module.".js" :
					addJavascriptText($key.$value);
					break;
				case "templates/".$new_module."/index.php" :
					addIndexTemplateText($key.$value);
					break;
				case "css/".$new_module.".css" :
					addCssText($key.$value);
					break;
				case "api/".$new_module_root_file :
					addApiText($key.$value);
					break;
			}
			echo $key.$value." file created<br>";
			fclose($temp_file);
		}
		echo "All Files Created Successfully<br>";
}
function addModuleRootFileText($file){
	$content="<?php\n//this is the root file";
	file_put_contents($file,$content);
	echo "finished adding root file code";
}
function addClassText($file, $class_name){
	$content="<?php\nclass ".$class_name." {\n\t//code here\n}";
	file_put_contents($file,$content);
	echo "finished adding class code<br>";
}
function addJavascriptText($file){
	$content="//javascript code here";
	file_put_contents($file,$content);
	echo "finished adding javascript code<br>";
}
function addIndexTemplateText($file){
	$content="<!-- this is a template file, use HTML -->";
	file_put_contents($file,$content);
	echo "finished adding index template code<br>";
}
function addCssText($file){
	$content="/* css content for ".$file." */";
	file_put_contents($file,$content);
	echo "finished adding css code";
}
function addApiText($file){
	$content="<?php\n//this file is the mediator between your interface and your database";
	file_put_contents($file,$content);
	echo "finished adding api code";
}



























	
	
	
	
	
	
	
	
	
	




















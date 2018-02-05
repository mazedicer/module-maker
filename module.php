<?php
error_reporting(E_ERROR | E_PARSE);
$new_module="example";
$new_module_root_file=$new_module.".php";
$dir=scandir(".");
print("<pre>".print_r($dir)."</pre>");
$result="";
if(in_array($new_module_root_file,$dir)){
	echo "<p>".$new_module_root_file." exists<br>cannot proceed!</p>";
}else{
	echo "<p>".$new_module_root_file." does not exist<br>ok to proceed..</p>";
	okToProceed();
}
function okToProceed(){
	$folders_required=array("classes","javascript","templates/".$GLOBALS['new_module'],"css","api");
	for($i=0;$i<count($folders_required);$i++){
		if(!in_array($folders_required[$i],$GLOBALS['dir'])){
			mkdir($folders_required[$i]);
			echo "----> ".$folders_required[$i]."<br>";
		}else{
			echo $folders_required[$i]." [already exists]<br>";
		}
	}
	echo "All folders created successfully!<br>";
	echo "--------------------------------------------------------------<br>";
	echo "Generate files:<br>";
	generateFiles();
}
function generateFiles(){	
	$new_module_root_file=$GLOBALS['new_module_root_file'];
	$new_module=$GLOBALS['new_module'];
	$files_required=array($new_module=>".php",
		"classes/"=>$new_module_root_file,
		"javascript/"=>"header_".$new_module.".js",
		"javascript/"=>"footer_".$new_module.".js",
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
				case "javascript/header_".$new_module.".js" :
					addJavascriptHeaderText($key.$value);
					break;
				case "javascript/footer_".$new_module.".js" :
					addJavascriptFooterText($key.$value);
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
			fclose($temp_file);
		}
		echo "All Files Created Successfully<br>";
}
function addModuleRootFileText($file){
	$template=file_get_contents("module-maker/index.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	file_put_contents($file,$content);
	echo ".....adding root file code<br>";
}
function addClassText($file){
	$template=file_get_contents("module-maker/classes_module.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	file_put_contents($file,$content);
	echo ".....adding class code<br>";
}
function addJavascriptHeaderText($file){
	$template=file_get_contents("module-maker/javascript_header_module.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	echo ".....adding javascript code<br>";
}
function addJavascriptFooterText($file){
	$template=file_get_contents("module-maker/javascript_footer_module.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	echo ".....adding javascript code<br>";
}
function addIndexTemplateText($file){
	$template=file_get_contents("module-maker/templates_module_index.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	echo ".....adding index template code<br>";
}
function addCssText($file){
	$template=file_get_contents("module-maker/css_module.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	echo ".....adding css code<br>";
}
function addApiText($file){
	$template=file_get_contents("module-maker/api_module.php");
	$content=str_replace("{module}", $GLOBALS['new_module'], $template);
	echo ".....adding api code<br>";
}



























	
	
	
	
	
	
	
	
	
	




















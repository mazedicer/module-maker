<?php
error_reporting(E_ERROR | E_PARSE);
echo "Enter Module Name(3 characters+, lowercase [spaces will be converted to lowdashes]): ";
$handle = fopen ("php://stdin","r");
$line = fgets($handle);
if(strlen(trim($line)) < 3){
    echo "Name too short!\nABORTING!\n";
    exit;
}else{
    $no_spaces=str_replace(" ","_",trim($line));
    startModule($no_spaces);
}
function startModule($new_module){
    /*use underscores instead of spaces and all lowercase*/
    $new_module_root_file=$new_module.".php";
    $dir=scandir(".");
    print_r($dir);
    if(in_array($new_module_root_file,$dir)){
            echo $new_module_root_file." exists\ncannot proceed!\n";
    }else{
            echo $new_module_root_file." does not exist\nok to proceed..\n";
            okToProceed($new_module);
    }
}
function okToProceed($new_module){
	$folders_required=array("classes","javascript","templates/".$new_module,"css","api");
	for($i=0;$i<count($folders_required);$i++){
		if(!in_array($folders_required[$i],$GLOBALS['dir'])){
			mkdir($folders_required[$i]);
			echo "----> ".$folders_required[$i]."\n";
		}else{
			echo $folders_required[$i]." [already exists]\n";
		}
	}
	echo "All folders created successfully!\n";
	echo "--------------------------------------------------------------\n";
	echo "Generate files:\n";
	generateFiles($new_module);
}
function generateFiles($new_module){	
	$new_module_root_file=$new_module.".php";
	$files_required=array($new_module=>".php",
		"classes/"=>$new_module_root_file,
		"javascript/"=>"header_".$new_module.".js",
		"javascript/"=>"footer_".$new_module.".js",
		"templates/".$new_module."/"=>"index.php",
		"css/"=>$new_module.".css",
		"api/"=>$new_module_root_file);
		foreach($files_required as $key => $value){
			$temp_file=fopen($key.$value, "w");
                        fclose($temp_file);
			switch($key.$value){
				case $new_module_root_file :
                                    addModuleRootFileText($key.$value);
                                    break;
				case "classes/".$new_module_root_file :
                                    addClassText($key.$value, $new_module);
                                    break;
				case "javascript/header_".$new_module.".js" :
                                    addJavascriptHeaderText($key.$value,$new_module);
                                    break;
				case "javascript/footer_".$new_module.".js" :
                                    addJavascriptFooterText($key.$value,$new_module);
                                    break;
				case "templates/".$new_module."/index.php" :
                                    addIndexTemplateText($key.$value,$new_module);
                                    break;
				case "css/".$new_module.".css" :
                                    addCssText($key.$value,$new_module);
                                    break;
				case "api/".$new_module_root_file :
                                    addApiText($key.$value,$new_module);
                                    break;
			}
		}
		echo "All Files Created Successfully\n";
}
function addModuleRootFileText($file){
	$template=(string)file_get_contents("module-maker/index.php");
	file_put_contents($file,$template);
	echo $file." .....adding code from module-maker/index.php\n";
}
function addClassText($file,$new_module){
	$template=file_get_contents("module-maker/classes_module.php");
	$content=str_replace("{module}", $new_module, $template);
	file_put_contents($file,$content);
	echo $file." .....adding code from module-maker/classes_module.php\n";
}
function addJavascriptHeaderText($file,$new_module){
	$template=file_get_contents("module-maker/javascript_header_module.php");
	$content=str_replace("{module}", $new_module, $template);
        file_put_contents($file, $content);
	echo $file." .....adding code from module-maker/javascript_header_module.php\n";
}
function addJavascriptFooterText($file,$new_module){
	$template=file_get_contents("module-maker/javascript_footer_module.php");
	$content=str_replace("{module}", $new_module, $template);
        file_put_contents($file, $content);
	echo $file." .....adding code from module-maker/javascript_footer_module.php\n";
}
function addIndexTemplateText($file,$new_module){
	$template=file_get_contents("module-maker/templates_module_index.php");
	$content=str_replace("{module}", $new_module, $template);
        file_put_contents($file, $content);
	echo $file." .....adding code from module-maker/templates_module_index.php\n";
}
function addCssText($file,$new_module){
	$template=file_get_contents("module-maker/css_module.php");
	$content=str_replace("{module}", $new_module, $template);
        file_put_contents($file, $content);
	echo $file." .....adding code from module-maker/css_module.php\n";
}
function addApiText($file,$new_module){
	$template=file_get_contents("module-maker/api_module.php");
	$content=str_replace("{module}", $new_module, $template);
        file_put_contents($file, $content);
	echo $file." .....adding code from module-maker/api_module.php\n";
}



























	
	
	
	
	
	
	
	
	
	




















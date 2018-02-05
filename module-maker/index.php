<?php
/* session, database, variables */
include('./main.php');
$filename = basename(__FILE__, ".php");
include("./classes/$filename" . ".php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Conekt2</title>
        <?php
        /* HEADER */
        $header_template = file_get_contents("templates/header.php");
        $more_resources = "";
        if (file_exists("templates/$filename/more_resources.php")) {
            $more_resources = file_get_contents("templates/$filename/more_resources.php");
        }
        $replace_with = array($filename, $more_resources);
        $header = str_replace($replace, $replace_with, $header_template);
        echo $header;
        ?>
    </head>
    <body>
<?php include("menu_header.php"); ?>
        <div class="wrapper">
            <div class="left-nav">
                <div id="side-nav">
<?php include("menuleft.php"); ?>
                </div>
            </div>
            <div class="page-content">
                <div class="content container">
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h2 class="page-title">Section Name</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="widget">
                                <div class="widget-header align-middle"> 
                                    <i class="icon-table"></i>
                                    <h3 class="f">Module Name</h3>
                                    <div class="button-wrapper">
                                        <button title="PRINT PROJECT" class="btn pyd-button mx-3 my-1" aria-controls="example">
                                            <i class="fas fa-print fa-2x"></i>
                                        </button>
                                        <button title="EXPORT TO EXCEL" type="button" class="btn pyd-button mx-3 my-1">
                                            <i class="far fa-file-excel fa-2x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <?php
                                    /* INDEX */
                                    include( "templates/$filename/index.php" );
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                /* FOOTER */
                $footer_template = file_get_contents("templates/footer.php");
                $more_scripts = "";
                if (file_exists("templates/$filename/more_scripts.php")) {
                    $more_scripts = file_get_contents("templates/$filename/more_scripts.php");
                }
                $footer_replace = array("{filename}", "{more_scripts}");
                $footer_replace_with = array($filename, $more_scripts);
                $footer = str_replace($footer_replace, $footer_replace_with, $footer_template);
                echo $footer;
                ?>  
        </div>
    </body>
</html>


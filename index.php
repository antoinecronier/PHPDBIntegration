<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */

// configuration
require_once("Config/config.script.php");

// connexion db
require_once("Classes/pdo.connexion.class.php");
$PDO = new Pdo_Connexion ($CONFIG['DB_INI_FILE']);

// model class
require_once("Classes/model.class.php");
$MODEL = new Model ($PDO->CNX);

// view class
require_once("Classes/view.class.php");

// html output increment
$TABLES = NULL;

// set the menu based on tables
$TABLES .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table());

$T = $_GET['T'];
$TABLE_DESCRIPTION = NULL;
$TABLE_DESCRIPTION .= View::TableDescription($T, $MODEL->List_Table_Attributes($T));

// output echo screen rendering 
if ($TABLE_DESCRIPTION != NULL) {
	$TABLES .= "<br/>" . $TABLE_DESCRIPTION;
}
View::HTML($CONFIG['MODULE_NAME'], $TABLES);// + $TABLE_DESCRIPTION

?>
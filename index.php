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

// Process action forms.
if (isset($_POST['submit-insert']) && ! empty($_POST['submit-insert'])) {
    $MODEL->Insert_Table_Data($_POST);
}

// html output increment
$TABLES = NULL;

// set the menu based on tables
$TABLES .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table());

$T = $_GET['T'];
$TABLE_DESCRIPTION = NULL;

$TABLE_DATA = NULL;

if ($T) {
	$TABLE_DESCRIPTION .= View::TableDescription($T, $MODEL->List_Table_Attributes($T),$MODEL->List_Table_Attributes($T));
	$TABLE_DATA .= View::TableDatas($T, $MODEL->List_Table_Attributes($T),$MODEL->List_Table_Datas($T));
}

// output echo screen rendering
if ($TABLE_DESCRIPTION != NULL) {
	$TABLES .= "<br/>" . $TABLE_DESCRIPTION;
	$TABLES .= "<br/>" . $TABLE_DATA;
}

View::HTML($CONFIG['MODULE_NAME'], $TABLES);// + $TABLE_DESCRIPTION

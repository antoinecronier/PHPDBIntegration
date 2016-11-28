<?php

  /* DBZ VIEW */

  class View {

    public function __construct () { }

    // menu list of table link
    public static function MenuTable ($db_name, $array_table) {
      $menu = "<table>DB : ".$db_name;

      foreach ($array_table as $K => $TABLE) {
        $menu .= "<tr> <td> <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a> </td> </tr>";
      }

      $menu .= "</table>";

      return $menu;
    }

    public static function TableDescription ($table_name, $array_table, $array_datas) {
      $menu = "<table>Table : ".$table_name;

      foreach ($array_table as $K => $TABLE) {
        $menu .= "<tr> <td> " . strtoupper($TABLE[0]) . "</td> </tr>";
      }

      $menu .= "</table>";

      $menu .= "<br/>";

      $form = "<form action='action.php' method='post'>";
      $form .= "<table>";
      foreach ($array_datas as $K => $TABLE) {
        $form .= "<tr> <td><p>Votre nom : <input type='text' name="+$TABLE[0]+" /></p></td> </tr>";
      }
      $form .= "<p><input type='submit' value='OK'></p>";
      $form .= "</form>";

      return $menu . $form;
    }

    public static function TableDatas ($table_name, $table_columns, $array_datas) {
        $menu = "";
        $menu .= "<table>";

        $menu .= "<tr>";
        foreach ($table_columns as $K => $DATA) {
        	$menu .= "<th>" .strtolower($DATA[0])."</th>";
        }
        $menu .= "</tr>";

        foreach ($array_datas as $K => $DATA) {
        	$menu .= "<tr>";
        	for ($i=0;$i<count($DATA)/2;$i ++){
        		$menu .= "<td>" .strtolower($DATA[$i])."</td>";
        	}
            $menu .= "</tr>";
        }

        $menu .= "</table>";

        return $menu;
    }

    // html final rendering
    public static function HTML ($title, $contener) {
      echo "<html>
      <head>
        <title>".$title."</title>
        <link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
      </head>
      <body>
        <img src='Fichiers/images/logo.jpg' /><br /><hr />
        </hr>".$contener."
      </body>
      </html>";
    }

  }

?>


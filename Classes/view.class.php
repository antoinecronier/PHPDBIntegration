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

    public static function TableDescription ($table_name, $array_table) {
      $menu = "<table>Table : ".$table_name;
      
      foreach ($array_table as $K => $TABLE) {
        $menu .= "<tr> <td> <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a> </td> </tr>";
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


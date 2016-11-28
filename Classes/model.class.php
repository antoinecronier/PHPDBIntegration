<?php

/* DBZ MODELE KAMEHAMEHA */
class Model
{

    private $PDO = NULL;

    const TABLE_PARAM_NAME = 'action-table-name';

    public function __construct($pdo)
    {
        $this->PDO = $pdo;
    }

    // db name
    public function Name_DB()
    {
        return $this->PDO->Query('select database()')->fetchColumn();
    }

    // list table
    public function List_Table()
    {
        $SQL = "show tables";
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // list table
    public function List_Table_Attributes($table)
    {
        $SQL = "describe ";
        $SQL .= $table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // list datas
    public function List_Table_Datas($table)
    {
        $SQL = "SELECT * FROM ";
        $SQL .= $table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // delete all table datas
    public function Delete_Table_Datas($table)
    {
        $SQL = "DELETE FROM ";
        $SQL .= $table;
        $RES = $this->PDO->prepare($SQL);
        $RES->execute();
        return $RES->fetchAll();
    }

    // insert data
    public function Insert_Table_Data(array $data)
    {
        $table = $data[static::TABLE_PARAM_NAME];

        $queryColumns = [];
        $queryData = [];
        $inlineData = '';

        foreach ($this->List_Table_Attributes($table) as $column) {
            $fieldName = $column['Field'];

            if (isset($data[$fieldName]) && ! empty($data[$fieldName])) {
                $queryColumns[] = $fieldName;
                $queryData[] = $data[$fieldName];

                if ($inlineData != '') {
                    $inlineData .= ', ';
                }

                $inlineData .= sprintf("'%s'", $data[$fieldName]);
            }
        }

        if (count($queryColumns) === 0 || count($queryData) === 0) {
            throw new \Exception('Noooo !!!!!!!! You just broke your computer ... Too bad.');
        }

        $SQL = "INSERT INTO ";
        $SQL .= $table;

        $SQL .= sprintf(' (%s) ', implode(', ', $queryColumns));

        $SQL .= sprintf(' VALUES(%s) ', $inlineData);

        $RES = $this->PDO->prepare($SQL);
        $success = $RES->execute();

        if ($success == false) {
            // TODO Add error code.
        }

        return $RES->fetchAll();
    }
}

?>
<?php

// Used to fetch product data
class product
{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData method
    public function getData($table = 'product')
    {
        // fetch each row
        $tableData = $this->db->con->query("SELECT * FROM {$table}");
        $resultArray = array();

        // fetch data one by one from array
        while ($item = mysqli_fetch_array($tableData, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product from item id
    public function getProduct($item_id = null, $table = 'product')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id={$item_id}");
            $resultArray = array();

            // fetch data one by one from array
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }
}

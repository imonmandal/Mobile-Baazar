<?php

// php cart class
class cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertIntoCart($params = null, $table = 'cart')
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                // SQL Query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s);", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user id and item id and insert it into cart table
    public function addToCart($user_id, $item_id)
    {
        if (isset($user_id) && isset($item_id)) {
            $params = array(
                'user_id' => $user_id,
                'item_id' => $item_id
            );

            // insert into cart
            $result = $this->insertIntoCart($params);

            // // reload page
            // if ($result) {
            //     header('Location' . $_SERVER['PHP_SELF']);
            // }
            header("Refresh:1");


            return $result;
        }
    }

    // to delete cart item
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if (isset($item_id) && $this->db->con != null) {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id = {$item_id};");

            // // reload page
            // if ($result) {
            //     header('Location' . $_SERVER['PHP_SELF']);
            // }
            header("Refresh:1");

            return $result;
        }
    }

    // to get total price
    public function getSum($arr = null)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    // Get item id of shoping cart list
    public function getCartId($cartTable = null, $key = 'item_id')
    {
        if (isset($cartTable)) {
            $item_present = array_map(function ($item) use ($key) {
                return $item[$key];
            }, $cartTable);
            return $item_present;
        }
    }

    // Transfer data
    public function transferData($item_id = null, $fromTable = 'cart', $toTable = 'wishlist')
    {
        if (isset($item_id) && $this->db->con != null) {
            $query = "INSERT INTO {$toTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query2 = "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            $result = $this->db->con->multi_query($query);
            $result2 = $this->db->con->query($query2);

            // // reload page
            // if ($result & $result2) {
            //     header('Location' . $_SERVER['PHP_SELF']);
            // }
            header("Refresh:1");

            return $result & $result2;
        }
    }
}

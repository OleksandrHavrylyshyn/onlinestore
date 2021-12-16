<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db){
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert cart table
    public function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
               $columns = implode(',', array_keys($params));
               $values = implode(',', array_values($params));

               // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES (%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user-id and item-id to insert to cart
    public function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id"=>$userid,
                "item_id"=>$itemid,
            );

            $result = $this->insertIntoCart($params);
            if ($result){
                header("Location:" .$_SERVER['PHP_SELF']);
            }
        }
    }

    //calculate total
    public function getSum($arr){
        if (isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f',$sum);
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // checkout cart


    public function checkoutCart(){

            $result = $this->db->con->query("INSERT INTO purchase (item_id) SELECT item_id FROM  cart;  ");

            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }

    public function emptyCart(){

        $result = $this->db->con->query("TRUNCATE cart;");

        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
    }


}
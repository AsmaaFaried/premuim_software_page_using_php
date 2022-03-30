<?php

class Orders {

    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database();
        $this->table = $this->database->Table("orders");
    }

    public function order_insert($order_date, $download_count, $download_key, $user_id, $product_id) {
        $error = "";
        $check = $this->table->insert(
            [
                'order_date' => $order_date,
                'download_count' => $download_count,
                'download_key' => $download_key,
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]
        );
        if ($check) {
            $error = "User data is inserted";
        } else {
            $error = "User data is not inserted";
        }
        return $error;
    }

    public function is_valid_key($user_id, $key) {
        $current_key = $this->table->where('user_id', '=', $user_id)->pluck('download_key')->last();
        if ($current_key == $key) {
            return true;
        } else {
            return false;
        }
    }

    public function get_count($user_id) {
        $count = $this->table->where('user_id', '=', $user_id)->pluck('download_count')->last();
        return $count;
    }

    public function get_key($user_id) {
        $key = $this->table->where('user_id', '=', $user_id)->pluck('download_key')->last();
        return $key;
    }
}

<?php

class Tokens {

    public Database $database;
    public $table;

    public function __construct() {
        $this->database = new Database;
        $this->table = $this->database->Table('tokens');
    }


    // Insert token in tokens table
    public function AddUserToken($user_id, $hashed_token) {
        $check = $this->table->insert(
            [
                'user_id' => $user_id,
                'hashed_token' => $hashed_token
            ]
        );
        if ($check) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user_id_using_hashed_token($hashed_token){
        $user = $this->table->where("hashed_token", $hashed_token)->get();
        return $user[0]->user_id;
    }

    public function update_token ($user_id, $new_hashed_token) {
        $this->table->where('user_id', "=", $user_id)->update(['hashed_token' => $new_hashed_token]);
    }

    public function delete_token ($hashed_token){
        $this->table->where('hashed_token', '=', $hashed_token)->delete();
    }
}

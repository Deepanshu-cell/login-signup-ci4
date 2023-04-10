<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'login-signup';

    protected $allowedFields = ['username', 'email', 'password'];

    public function getUser($email = null)
    {
        
            if($email){
                return $this->where(['email' => $email])->first();
            }else{
                return $email;
            }
    }
}



?>
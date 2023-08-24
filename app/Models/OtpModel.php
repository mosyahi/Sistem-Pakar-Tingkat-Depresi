<?php

namespace App\Models;

use CodeIgniter\Model;

class OtpModel extends Model
{
    protected $table = 'tbl_otp';
    protected $primaryKey = 'id';
    protected $allowedFields = ['otp', 'email', 'created_at'];
}

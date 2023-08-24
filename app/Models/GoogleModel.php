<?php namespace App\Models;

use CodeIgniter\Model;

class GoogleModel extends Model
{
    protected $table = 'tbl_google';
    protected $primaryKey = 'id';
    protected $allowedFields = ['google_id', 'email', 'name', 'created_at', 'updated_at'];

    protected $useTimestamps = true;
}

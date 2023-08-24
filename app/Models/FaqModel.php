<?php

namespace App\Models;

use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table = 'tbl_faq';
    protected $primaryKey = 'id_faq';
    protected $allowedFields = ['pertanyaan', 'jawaban'];
}
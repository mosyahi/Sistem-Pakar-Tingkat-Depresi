<?php

namespace App\Controllers;

use App\Models\FaqModel;
use App\Models\DiagnosaModel;

class Home extends BaseController
{
    public function index()
    {
        $faqModel = new FaqModel();
        $data['faq'] = $faqModel->asObject()->findAll();

        $diagnosaModel = new DiagnosaModel();
        $data['laporan'] = $diagnosaModel->findAll();
        $data['title'] = 'Homepage';

        $session = session();
        
        if ($session->get('logged_in') || $session->get('login_diagnosa')) {
            return redirect()->back()->with('error', 'Anda harus logout terlebih dahulu');
        }

        return view('landing', $data);
    }
}
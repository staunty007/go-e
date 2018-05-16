<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $prefix = "users.admin.";

    //private $view = view($this.pre)
    
    public function home() {
        return $this->v('home');
    }

    public function v($file) {
        return view($this->prefix.$file);
    }
}

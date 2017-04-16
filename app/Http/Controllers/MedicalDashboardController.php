<?php
/**
 * Created by PhpStorm.
 * User: badma
 * Date: 01/04/2017
 * Time: 15:38
 */

namespace App\Http\Controllers;


class MedicalDashboardController extends Controller
{
    public function getIndex(){
        return view('contact');
    }
}
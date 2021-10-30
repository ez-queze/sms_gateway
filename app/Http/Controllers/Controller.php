<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function dashboard() 
    {
        $datas = Siswa::all();
        $id = Siswa::get('nis')->pluck('nis');
        // return dd($id);
        $siswas = Siswa::paginate(5);

        return view('dashboard', compact(['siswas', $siswas], ['datas', $datas], ['id', $id]));
    }
}

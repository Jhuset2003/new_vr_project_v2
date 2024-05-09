<?php

namespace App\Http\Controllers;

use App\Models\Webarts;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Suppoort\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\WebartRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

class WebartsController extends Controller
{
    public function index(): Response
    {
        $Webarts = Webarts::with('webart:id,name')->paginate(5);
        return inertia('Webarts/Index', [
            'Webarts' => $Webarts
        ]);
    }
    public function create(): Response
    {
        return inertia('Webarts/Create');
    }

    public function store(WebartRequest $request)
    {
       
        if($request['img_back']){
            $file = $request->file('img_back');
            
            $extension = $file->extension();
            //SE FORMATEA EL NOMBRE PARA EVITAR CARACTERES ESPECIALES
            $name_back = $file->getClientOriginalName();
            $name_back = str_replace($extension , '', $name_back);
            $name_back = preg_replace('([^A-Za-z0-9])', '', $name_back);
            $name_back = $name_back.".".$extension;
            $file->storeAs('',$name_back,'backs');
        }

        if($request['img_webart']){
            $file = $request->file('img_webart');
            
            $extension = $file->extension();
            //SE FORMATEA EL NOMBRE PARA EVITAR CARACTERES ESPECIALES
            $name_webart = $file->getClientOriginalName();
            $file->storeAs('',$name_webart,'webart');
        }

        if($request['target']){
            $file = $request->file('target');
            
            $extension = $file->extension();
            //SE FORMATEA EL NOMBRE PARA EVITAR CARACTERES ESPECIALES
            $name_target = $file->getClientOriginalName();
            $file->storeAs('',$name_target,'targets');
        }
        Webarts::create([
            'name' => $request['name'],
            'img_back' => $name_back,
            'img_webart' => $name_webart,
            'target' => $name_target,
            'musica' => $request['musica']
            ]);
        return redirect()->route('webart.index');
    }

    public function destroy($id)
    {
        $deleted = DB::table('webarts')->where('id',$id)->delete();
        return redirect()->route('webart.index');
    }

    public function getDataWebarts(Webarts $webarts){

        $data = $webarts->get();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'Webarts' => $data
        ]);
    }
    public function getDataWebart(Webarts $webarts,$id){

        $data = $webarts->where('id',$id)->get();

        return Inertia::render('Camera/webart', [
            'Webarts' => $data
        ]);
    }

   
}

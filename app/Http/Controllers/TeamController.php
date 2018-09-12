<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{


    public function createTeam(Request $request){
        $request->validate([
            'name'=>required,
            'category' =>required,
        ]);

        $Team = new App\Team;
        $Team->name = $request->name;
        $Team->category = $request->category;
        $Team->description = $request->description;
        $Team->path = $request->path;
        ($Team->save()) ? return back():back()
        ->flash('message','No se pudo guardar');
    }

    public function updateTeam(Request $request){
        $request->validate([
            'id'=>required,
            'name'=>required,
            'category' =>required,
        ]);

        $Team = App\Team::findOrFail($request->id);
        $Team->name = $request->name;
        $Team->category = $request->category;
        $Team->description = $request->description;
        $Team->path = $request->path;
        ($Team->save()) ? return back():back()
        ->flash('message','No se pudo actualizar');
    }

    public function disableTeam(Request $request){
        $Team = App\Team::findOrFail($request->id)->state=0
        $Team->save();
        return back();
    }

    public function getTeam($id){
        return App\Team::findOrFail($id);
    }
}

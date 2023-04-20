<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constant;

class ConstantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $constants = Constant::all();
         return response( view("pages.Configurations.Constants.index" , compact('constants'))->with('status',"liste des constants."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response( view("pages.Configurations.Constants.create" , compact('constants'))->with('status',"liste des constants."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $constant = new Constant();

         $constant->tcgn_plein = $request->tcgn_plein ;
         $constant->tcgn_reduit = $request->tcgn_reduit;
         $constant->cspe = $request->cspe;

         $constant->save(); 


        return response( view("pages.Configurations.Constants.show" , compact('constant'))->with('status',"constant a été ajoutée avec succès."));
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $constant = Constant::findORfail($id);
        return response( view("pages.Configurations.Constants.show" , compact('constant'))->with('status',"constant a été retoruvé avec succès."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $constant = Constant::findORfail($id);
        return response( view("pages.Configurations.Constants.edit" , compact('constant'))->with('status',"constant est prête à être modifié."));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $constant = Constant::findORfail($id);

        $constant->tcgn_plein = $request->tcgn_plein ;
         $constant->tcgn_reduit = $request->tcgn_reduit;
         $constant->cspe = $request->cspe;

         $constant->save(); 

        return response( view("pages.Configurations.Constants.show" , compact('constant'))->with('status',"constant a été modifié avec succès."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $constant = Constant::findORfail($id);

         $constant->delete();

         return response( view("pages.Configurations.Constants.index" , compact('constant'))->with('status',"constant a été supprimé avec succès."));
    }
}

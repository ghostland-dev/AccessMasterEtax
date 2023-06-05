<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $fournisseurs = Supplier::all();

        return response(view('pages.Fournisseurs.index', compact('fournisseurs'))->with(
            'status',
            'liste des fournisseurs disponible.'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return response(view('pages.Fournisseurs.create')->with('status', 'Vous pouvez ajouter un nouveau fournisseur .'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


        $fournisseur = new Supplier();

        // Update the model with the new file path
        $fournisseur->logo = url('storage/' . $request->logo->store('fournisseurLogos', 'public'));
        $fournisseur->nom_fournisseur = $request->nom_fournisseur;
        $fournisseur->contact = $request->contact;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        $fournisseur->address = $request->address;
        $fournisseur->fournisseur_electrcite = $request->fournisseur_electrcite == 'on' ? true : false;
        $fournisseur->fournisseur_gaz = $request->fournisseur_gaz == 'on' ? true : false;
        $fournisseur->country = $request->country;
        $fournisseur->city = $request->city;
        $fournisseur->zip_code = $request->zip_code;
        $fournisseur->siret = $request->siret;
        $fournisseur->energie = $request->energie;
        $fournisseur->updated_at = Date('Y-m-d h:i:s');

        $fournisseur->save();

        return  view('pages.Fournisseurs.show', compact('fournisseur'))->with('status', ' Fournisseur a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $fournisseur = Supplier::findOrFail($id);

        return  view('pages.Fournisseurs.show', compact('fournisseur'))->with('status', 'Ce fournisseur a été trouvé dans nos enregistrements');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $fournisseur = Supplier::findOrFail($id);

        return view('pages.Fournisseurs.edit', compact('fournisseur'))->with('status', 'Ce fournisseur est prêt à être modfifié.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $fournisseur = Supplier::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Delete the old file if it exists
            if ($fournisseur->logo && Storage::exists($fournisseur->logo)) {
                Storage::delete($fournisseur->logo);
            }

            // Update the model with the new file path
            $fournisseur->logo = url('storage/' . $request->logo->store('fournisseurLogos', 'public'));
        }

        $fournisseur->nom_fournisseur = $request->nom_fournisseur;
        $fournisseur->contact = $request->contact;
        $fournisseur->tel = $request->tel;
        $fournisseur->email = $request->email;
        $fournisseur->address = $request->address;
        $fournisseur->fournisseur_electrcite = $request->fournisseur_electrcite == 'on' ? true : false;
        $fournisseur->fournisseur_gaz = $request->fournisseur_gaz == 'on' ? true : false;
        $fournisseur->country = $request->country;
        $fournisseur->city = $request->city;
        $fournisseur->zip_code = $request->zip_code;
        $fournisseur->siret = $request->siret;
        $fournisseur->energie = $request->energie;
        $fournisseur->updated_at = Date('Y-m-d h:i:s');

        $fournisseur->save();


        return  view('pages.Fournisseurs.show', compact('fournisseur'))->with('status', 'Ce fournisseur a été trouvé dans nos enregistrements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */

    public function destroy(Supplier $supplier)
    {

        $fournisseur = Supplier::findOrFail($supplier);
        $fournisseur->delete();

        return redirect()->route("suppliers")->with('status', "le Fournisseur a été supprimé avec succès..");
    }
}

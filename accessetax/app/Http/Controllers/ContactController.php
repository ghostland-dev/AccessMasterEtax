<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return response(view('pages.Contacts.index', compact('Contacts'))->with('status', "liste des contacts."));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('pages.Contacts.create')->with('status', "vous pouvez ajouter un nouveau contact."));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Contact = Contact::create($request->all());
        return response(view('pages.Contacts.show', compact('Contact'))->with('status', "un nouveau contact a été ajouté avce succès"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Contact = Contact::findOrFail($id);
        return response(view('pages.Contacts.show', compact('Contact'))->with('status', "Voici les détails de ce contact."));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Contact = Contact::findOrFail($id);
        return response(view('pages.Contacts.edit', compact('Contact'))->with('status', "vous pouvez commencer à modifier ce contact."));
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
        $Contact = Contact::findOrFail($id);

        $Contact->nom = $request->nom;
        $Contact->prenom = $request->prenom;
        $Contact->email = $request->email;
        $Contact->mobile = $request->mobile;
        $Contact->fix = $request->fix;
        $Contact->type = $request->type;
        $Contact->ville = $request->ville;
        $Contact->adresse = $request->adresse;
        $Contact->pays = $request->pays;
        $Contact->code_postal = $request->code_postal;
        $Contact->fonction = $request->fonction;
        $Contact->company_id = $request->company_id;

        $Contact->save();
        return response(view('pages.Contacts.show', compact('Contact'))->with('status', "vous pouvez commencer à modifier ce contact."));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Contact = Contact::findOrFail($id);
        return response(view('pages.Contacts.index')->with('status', "contact a été supprimé avec succès."));
    }
}

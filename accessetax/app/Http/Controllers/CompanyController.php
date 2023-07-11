<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $entreprises = Company::orderBy('created_at', 'desc')->paginate(10);

        return response(view('pages.Entreprises.index', compact('entreprises')));
    }


    /**
     * Search for companies based on the provided criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        $perPage = $request->input('perPage', 10);

        $entreprises = Company::where('denomination', 'like', '%' . $query . '%')
            ->orWhere('siren', 'like', '%' . $query . '%')
            ->orWhere('siret', 'like', '%' . $query . '%')
            ->orWhere('code_naf', 'like', '%' . $query . '%')
            ->orWhere('ville', 'like', '%' . $query . '%')
            ->paginate($perPage);

        return  response(view('pages.Entreprises.index', compact('entreprises'))->with('status', 'voici la liste des resultats qui ressemble à votre demande.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        return response(view('pages.Entreprises.create')->with('status', 'vous pouvez commencer à ajouter vos raisons sociales.'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $id = Auth::user()->id;
        $entreprise = new Company();


        $entreprise->denomination = $request->denomination;
        $entreprise->siren = $request->siren;
        $entreprise->siret = $request->siret;
        $entreprise->tel = $request->tel;
        $entreprise->fix = $request->fix;
        $entreprise->ville = $request->ville;
        $entreprise->email = $request->email;
        $entreprise->code_naf = $request->code_naf;
        $entreprise->site_internet = $request->site_internet;
        $entreprise->code_nace = $request->code_nace;
        $entreprise->code_naf = $request->code_naf;
        $entreprise->forme_juridique = $request->forme_juridique;
        $entreprise->forme_juridique_code = $request->forme_juridique_code;
        $entreprise->capital = $request->capital;
        $entreprise->effectif = $request->effectif;
        $entreprise->nb_dirigents = $request->nb_dirigents;
        $entreprise->categorie_juridique = $request->categorie_juridique;
        $entreprise->adresse = $request->adresse;
        $entreprise->date_radiation = $request->date_radiation == true ? date('Y-m-d') : '';
        $entreprise->date_creation = $request->date_creation;
        $entreprise->user_id = $id;






        return response(view('pages.Entreprises.show', compact('entreprise'))->with('status', 'la societé a été entregistré avec succès.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $entreprise = Company::findOrFail($id);

        $siren = "15426543";
        $url = 'https://api.pappers.fr/v2/recherche';
        $apiToken = '97a405f1664a83329a7d89ebf51dc227b90633c4ba4a2575';

        $companyData = '{"resultats":[{"siren":"385406475","siren_formate":"385 406 475","diffusable":true,"nom_entreprise":"VIVIER DIDIER","personne_morale":false,"denomination":null,"nom":"VIVIER","prenom":"DIDIER","sexe":"M","siege":{"siret":"38540647500025","siret_formate":"385 406 475 00025","nic":"00025","numero_voie":null,"indice_repetition":null,"type_voie":"LD","libelle_voie":"ORVAL","complement_adresse":null,"adresse_ligne_1":"LD ORVAL","adresse_ligne_2":null,"code_postal":"61210","ville":"NEUVY-AU-HOULME","pays":"France","latitude":null,"longitude":null},"villes":["NEUVY-AU-HOULME"],"code_naf":"01.61Z","libelle_code_naf":"Activit\u00e9s de soutien aux cultures","domaine_activite":"Culture et production animale, chasse et services annexes","conventions_collectives":[],"date_creation":"1992-01-01","date_creation_formate":"01\/01\/1992","entreprise_employeuse":0,"entreprise_cessee":0,"date_cessation":null,"categorie_juridique":"1000","forme_juridique":"Entrepreneur individuel","tranche_effectif":"NN","effectif":"0 salari\u00e9","effectif_min":0,"effectif_max":0,"annee_effectif":null,"capital":null,"statut_rcs":"Inscrit","chiffre_affaires":null,"resultat":null,"effectifs_finances":null,"annee_finances":null,"dirigeants":[],"beneficiaires":[],"documents":[],"publications":[],"nb_dirigeants_total":0,"nb_beneficiaires_total":0,"nb_documents_avec_mentions":0,"nb_documents_total":0,"nb_publications_avec_mentions":0,"nb_publications_total":0},{"siren":"528522246","siren_formate":"528 522 246","diffusable":true,"nom_entreprise":"BRAILLON OLIVIER","personne_morale":false,"denomination":null,"nom":"BRAILLON","prenom":"OLIVIER","sexe":"M","siege":{"siret":"52852224600024","siret_formate":"528 522 246 00024","nic":"00024","numero_voie":6,"indice_repetition":null,"type_voie":"RUE","libelle_voie":"DU TAPAGE","complement_adresse":null,"adresse_ligne_1":"6 RUE DU TAPAGE","adresse_ligne_2":null,"code_postal":"59269","ville":"ARTRES","pays":"France","latitude":null,"longitude":null},"villes":["ARTRES","VALENCIENNES"],"code_naf":"74.30Z","libelle_code_naf":"Traduction et interpr\u00e9tation","domaine_activite":"Autres activit\u00e9s sp\u00e9cialis\u00e9es, scientifiques et techniques","conventions_collectives":[],"date_creation":"2010-10-01","date_creation_formate":"01\/10\/2010","entreprise_employeuse":0,"entreprise_cessee":0,"date_cessation":null,"categorie_juridique":"1000","forme_juridique":"Entrepreneur individuel","tranche_effectif":null,"effectif":"0 salari\u00e9","effectif_min":0,"effectif_max":0,"annee_effectif":2023,"capital":null,"statut_rcs":"Non inscrit","chiffre_affaires":null,"resultat":null,"effectifs_finances":null,"annee_finances":null,"dirigeants":[],"beneficiaires":[],"documents":[],"publications":[],"nb_dirigeants_total":0,"nb_beneficiaires_total":0,"nb_documents_avec_mentions":0,"nb_documents_total":0,"nb_publications_avec_mentions":0,"nb_publications_total":0}],"page":1,"total":24206393}';
        // $companyData = Http::withoutVerifying()
        //     ->get($url, [
        //         'precision' => 'standard',
        //         'bases' => 'entreprises,dirigeants,beneficiaires,publications,documents',
        //         'page' => 1,
        //         'par_page' => 2,
        //         'siren' => $siren,
        //         'api_token' => $apiToken
        //     ]);

        if ($companyData != null) {

            return response(view('pages.Entreprises.show', compact('entreprise', 'companyData'))->with('status', 'la societé a été trouvé dans nos enregisrements'));
        } else {
            return response(view('pages.Entreprises.show', compact('entreprise', 'companyData'))->with('status', 'le siren de l\'entreprise n\'as pas été trouvé.'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $entreprise = Company::findOrFail($id);
        return response(view('pages.Entreprises.edit', compact('entreprise'))->with('status', 'la societé est prête à être modifié'));
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

        $entreprise = Company::findOrFail($id);

        $id = Auth::user()->id;

        $entreprise->denomination = $request->denomination;
        $entreprise->siren = $request->siren;
        $entreprise->siret = $request->siret;
        $entreprise->tel = $request->tel;
        $entreprise->fix = $request->fix;
        $entreprise->ville = $request->ville;
        $entreprise->email = $request->email;
        $entreprise->code_naf = $request->code_naf;
        $entreprise->site_internet = $request->site_internet;
        $entreprise->code_nace = $request->code_nace;
        $entreprise->code_naf = $request->code_naf;
        $entreprise->forme_juridique = $request->forme_juridique;
        $entreprise->forme_juridique_code = $request->forme_juridique_code;
        $entreprise->capital = $request->capital;
        $entreprise->effectif = $request->effectif;
        $entreprise->nb_dirigents = $request->nb_dirigents;
        $entreprise->categorie_juridique = $request->categorie_juridique;
        $entreprise->adresse = $request->adresse;
        $entreprise->date_radiation = $request->date_radiation == true ? date('Y-m-d') : '';
        $entreprise->date_creation = $request->date_creation;
        $entreprise->user_id = $id;



        $entreprise->save();

        return response(view('pages.Entreprises.show', compact('entreprise'))->with('status', 'la societé a été modifié avec succès.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $entreprise = Company::findOrFail($id);
        $entreprise->delete();

        return redirect()->route('companies')->with('status', " la sociaté et les diffrents elements qui ont été associés ont été supprimés avec succès.");
    }
}

@extends('layouts.signed')

@section('main')
    <div class="container-fluid  ">
        <h4 class="text-center bg-success text-white rounded-2 p-3">Nouveau une nouveau dirigeant</h4>
        <form action="{{ route('responsible.store') }}" method="POST" class="form-group">
            @csrf
            @method('POST')
  @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-4 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-3 shadow p-3 rounded-md ">

                <div class=" space-y-2    ">
                    <label for="civilite">Civilité</label>
                    <select class="form-select" name="civilite" id="civilite" >
                        <option  >veuillez selectionnez un genre</option>
                        <option value="Monsieur">Monsieur</option>
                        <option value="Madame">Madame</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
                <div class=" space-y-2    ">
                    <label for="nom_famille">Nom de famille</label>
                    <input type="text" name="nom_famille" id="nom_famille" class="form-control"
                        placeholder="nom de famille ... " required>
                </div>
                <div class=" space-y-2    ">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control"
                        placeholder="nom de famille ... " required>
                </div>

                <div class=" space-y-2    ">
                    <label for="fonction">Fonction</label>
                    <input type="text" name="fonction" id="fonction" class="form-control" placeholder="fonction ... "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="exemple@domain.fr ... " required>
                </div>
                <div class=" space-y-2    ">
                    <label for="fax">Fix</label>
                    <input type="tel" name="fax" id="fax" class="form-control" placeholder="02 00 00 00 00 "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="mobile">Mobile</label>
                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="02 00 00 00 00 "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="adresse">adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" placeholder="13 rue des .... "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="code_postal">Code postal</label>
                    <input type="number" name="code_postal" id="code_postal" class="form-control" placeholder="12422 .... "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="ville">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control" placeholder="Rouen .... "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="pays">Pays</label>
                    <input type="text" name="pays" id="pays" class="form-control" placeholder="France .... "
                        required>
                </div>
                <div class=" space-y-2    ">
                    <label for="date_naissance">date naissance</label>
                    <input type="date" name="date_naissance" id="date_naissance" class="form-control"
                        placeholder=" .... " required>
                </div>


                <div class=" space-y-2 ">
                    <label for="company_id">Assigné à l'étude</label>
                    <select name="company_id" id="company_id" class="form-select" required>

                        @foreach ($entreprises as $entreprise)
                            <option class="p-3" value="{{ $entreprise->id }}"> {{ $entreprise->denomenation }} <span
                                    class="bg-emerald-400">{{ $entreprise->id }}</span>
                            </option>
                        @endforeach

                    </select>
                </div>


            </div>
            <div class="w-100">
                <button type="submit" class="my-3   mx-auto btn btn-dark p-2 px-4"> Soumettre
                </button>
            </div>
        </form>
    </div>
@endsection

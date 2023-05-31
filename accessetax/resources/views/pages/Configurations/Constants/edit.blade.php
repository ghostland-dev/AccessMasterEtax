 @extends('layouts.signed')

 @section('main')
     <form class="container" action="{{ route('constant.store', $constant->id) }}" method="POST">
         @csrf
         @method('POST')
         <h4 class="my-2  text-muted"> Ajouter une nouvelle constante </h3>
             <div class="row">
                 <!-- Text input -->
                 <div class="group-form col-md-4 mb-4">
                     <label class="form-label" for="tcgn_plein">TICGN pleine</label>
                     <input type="number" step="0.001" id="tcgn_plein" name="tcgn_plein"
                         value="{{ $constant->tcgn_plein }}" class="form-control" />

                 </div>
                 <!-- Text input -->
                 <div class="group-form col-md-4 mb-4">
                     <label class="form-label" for="tcgn_reduit">TICGN reduitee</label>
                     <input type="number" step="0.001" id="tcgn_reduit" name="tcgn_reduit"
                         value="{{ $constant->tcgn_reduit }}" class="form-control" />

                 </div>
                 <!-- Text input -->
                 <div class="group-form col-md-4 mb-4">
                     <label class="form-label" for="cspe">CSPE</label>
                     <input type="number" step="0.001" id="cspe" name="cspe" value="{{ $constant->cspe }}"
                         class="form-control" />

                 </div>

             </div>

             <!-- Submit button -->
             <button type="submit" class="btn btn-success btn-block mb-4">Mettre à jour</button>
     </form>
 @endsection

 @extends('layouts.signed')

 @section('main')
     <form class="container" action="{{ route('constant.store') }}" method="POST">
         @csrf
         @method('POST')
         <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Créer une nouvelle
             constante</h4>
         <div class="row">
             <!-- Text input -->
             <div class="group-form col-md-4 mb-4">
                 <label class="form-label" for="tcgn_plein">TICGN pleine</label>
                 <input type="number" step="0.001" id="tcgn_plein" name="tcgn_plein" class="form-control" placeholder="0.00" />

             </div>
             <!-- Text input -->
             <div class="group-form col-md-4 mb-4">
                 <label class="form-label" for="tcgn_reduit">TICGN reduitee</label>
                 <input type="number" step="0.001" id="tcgn_reduit" name="tcgn_reduit" class="form-control" placeholder="0.00" />

             </div>
             <!-- Text input -->
             <div class="group-form col-md-4 mb-4">
                 <label class="form-label" for="cspe">CSPE</label>
                 <input type="number" step="0.001" id="cspe" name="cspe" class="form-control" placeholder="0.00" />

             </div>

         </div>

         <!-- Submit button -->
         <button type="submit" class="btn btn-success btn-block mb-4">Créer</button>
     </form>
 @endsection

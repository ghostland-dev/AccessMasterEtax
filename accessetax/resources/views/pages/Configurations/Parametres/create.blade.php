 @extends('layouts.signed')

 @section('main')
     <form class="container" action="{{ route('parameter.store') }}" method="POST">
         @csrf
         @method('POST')
      <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Ajouter dees paramètres </h4>
         <div class="row">
             <!-- Text input -->
             <div class="group-form col-md-3 mb-4">
                 <label class="form-label" for="tcgn">TICGN</label>
                 <input type="text" id="tcgn" name="tcgn" class="form-control" />

             </div>

             <!-- Text input -->
             <div class="group-form col-md-9 mb-4">
                 <label class="form-label" for="cspe">CSPE</label>
                 <input type="text" id="cspe" name="cspe" class="form-control" />
             </div>

         </div>

         <!-- Submit button -->
         <button type="submit" class="btn btn-success btn-block mb-4">Créer</button>
     </form>
 @endsection

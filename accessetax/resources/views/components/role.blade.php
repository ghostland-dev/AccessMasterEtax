@if (Auth::user()->role == 'administrateur')
    <div class="bg-amber-50 text-amber-500 font-semibold rounded-md p-2"> <i class="mx-2 fa fa-star"></i> Administrateur
    </div>
@elseif(Auth::user()->role == 'commercial')
    <div class="bg-indigo-50 text-indigo-500 font-semibold rounded-md p-2"> <i class="mx-2 fa fa-users"></i> Commercial
    </div>
@elseif(Auth::user()->role == 'visiteur')
    <div class="bg-gray-50 text-gray-500 font-semibold rounded-md p-2"> <i class="mx-2 fa fa-user"></i> Visiteur</div>
@elseif(Auth::user()->role == 'client')
    <div class="bg-green-50 text-green-500 font-semibold rounded-md p-2"> <i class="mx-2 fa fa-star"></i> Client (<i class="mx-2 fa fa-check"></i> verifié)</div>
@else
    <div class="bg-red-50 text-red-500 font-semibold rounded-md p-2"> <i class="mx-2 fa fa-hacker-news"></i> Pénétrateur
        détécté</div>
@endif

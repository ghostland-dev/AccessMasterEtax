@extends('layouts.app')
@section('content')
  <div class="container my-5">
        <h1>Test de remboursement CSPE</h1>
        <form>
            <div id="clients">
                <div class="form-group">
                    <label for="client1_valeur">Valeur ajoutée du client 1 :</label>
                    <input type="number" class="form-control client-input" id="client1_valeur" placeholder="Valeur ajoutée" required>
                </div>
                <div class="form-group">
                    <label for="client1_car">Consommation annuelle de référence (CAR) du client 1 :</label>
                    <input type="number" class="form-control client-input" id="client1_car" placeholder="Consommation annuelle de référence (CAR)" required>
                </div>
            </div>
            <div class="m-2">
                <button type="button" class="btn btn-primary" id="ajouter_client">Ajouter un client</button>
                <button type="submit" class="btn btn-success">Tester</button>
            </div>
        </form>
        <div id="resultat" class="mt-5"></div>
    </div>

    <script>
    const form = document.querySelector('form');
    const resultat = document.querySelector('#resultat');

    form.addEventListener('submit', function(e)
    		{
    				e.preventDefault();
    				const clients =[];

    				// récupérer les données de chaque client
    				const inputs = document.querySelectorAll('.client-input');
    				for (let i = 0; i < inputs.length; i += 2) {
    						const valeurAjoutee = parseInt(inputs[i].value);
    						const car = parseInt(inputs[i + 1].value);
    						clients.push(
    								{valeurAjoutee, car
    								}
    						);
    				}

    				// tester chaque client et afficher le résultat
    				let messages = '';
    				for (let i = 0; i < clients.length; i++) {
    						const intensiteElectrique = clients[i].car * 0.0225 / clients[i].valeurAjoutee * 100;
    						if (intensiteElectrique > 0.55) {
    								messages += '<p> Client ' + (i + 1) + ': éligible au remboursement CSPE.\n </p><hr>';
    						} else if (intensiteElectrique < 0.45) {
    								messages += '<p> Client ' + (i + 1) + ': non éligible au remboursement CSPE.\n</p><hr>';
    						} else {
    								messages += '<p> Client ' + (i + 1) + ': pourrait être éligible au remboursement CSPE, mais une étude plus poussée est nécessaire.\n </p><hr>';
    						}
    				}

    				resultat.innerHTML = messages;
    		}
    );

    // ajouter un nouveau champ pour chaque client
    const ajouterClient = document.querySelector('#ajouter_client');
    const clients = document.querySelector('#clients');
    let nbClients = 1;

    ajouterClient.addEventListener('click', function()
    		{
    				const input1 = document.createElement('input');
    				input1.type = 'number';
    				input1.className = 'form-control client-input my-2';
    				input1.placeholder = 'Valeur ajoutée';
    				input1.required = true;
    				clients.appendChild(input1);

    				const input2 = document.createElement('input');
    				input2.type = 'number';
    				input2.className = 'form-control client-input';
    				input2.placeholder = 'Consommation annuelle de référence (CAR)';
    				input2.required = true;
    				clients.appendChild(input2);

    				nbClients++;
    		}
    );

    // enlever le dernier champ s'il est vide
    setInterval(function()
    		{
    				const inputs = document.querySelectorAll('.client-input');
    				if (inputs.length % 2 === 1 && inputs[inputs.length - 1].value === '') {
    						inputs[inputs.length - 1].remove();
    						inputs[inputs.length - 2].remove();
    						nbClients--;
    				}
    		}, 100
    );
    </script>

@endsection
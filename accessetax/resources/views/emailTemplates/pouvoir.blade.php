<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pouvoir</title>
</head>
<style>
    @page {
        @bottom-center {
            content: "Page "counter(page) " of "counter(pages);
        }
    }

    * {
        font-family: comfortaa;


    }

    body {
        width: 0;
        height: 0;
        margin: 0;
        padding: 0;

        width: 100%
    }

    .small {
        font-size: 11px;
        text-align: center;
        width: 100%
    }

    .right {
        float: right;
        margin-right: 2em;
    }

    .banner {
        background-color: #c4d811;
        padding: 1em;
        color: rgb(102, 93, 93);
        width: 100%;
        text-align: center;


    }

    .signature {
        display: flex;
    }

    p {
        padding: 0.3em 0;

        font-size: 15px;

    }


    .m {
        margin: 0.3em 1em;
    }

    .p {

        padding: 0.3em 1em;
    }

    .b {
        font-weight: 800;
    }

    .u {
        text-decoration: underline;
        font-weight: 800;

    }

    li {
        padding: 0.5em 0;
    }

    .center {
        text-align: center;
    }

    .page-break {
        page-break-after: always;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }



    .logo {
        height: 3em;
        float: left;
    }
</style>

<body>

    <img class="logo" src="https://accessenergies.fr/img/clients/Access_Energies.png" alt="" srcset="">

    <main>

        <br>
        <br>
        <h2 class="center"> POUVOIR </h2>
        <h4 class="center"> MANDATAIRE RECLAMATIONS DE TICFE/CSPE </h4>
        <p>Je soussigné, {{ Auth::user()->lastName . ' ' . Auth::user()->firstName }} agissant en qualité de :
            <b>{{ Auth::user()->job }}</b>
            au nom et pour le compte de l’entreprise :
            - Nom d'entreprise : {{ $company['nom_entreprise'] }} <br>
            - Adresse : {{ $company['siege']['adresse_ligne_1'] }}, <br>
            - {{ $company['siege']['code_postal'] }}, {{ $company['siege']['ville'] }}, France, <br>
            <b> Désigne </b> l’entreprise ACCESS ENERGIES
        </p>

        {{ $company['nom_entreprise'] }}
        <p>Adresse : 240 Chemin de l’ouraille 76940 la maileraye sur seine </p>
        <p>N° d’identification à la TVA : FR 63 851987198 <br>
            En qualité de mandataire pour (rayer les mentions inutiles) :</p>
        <ul>
            <li>Accomplir les formalités afférentes aux demandes de remboursement de TICFE/CSPE devant les bureaux et/ou
                Directions
                des Douanes et Droits Indirects compétents.</li>
            <li>Recevoir ou émettre toute correspondance pour le compte de notre société devant l’administration des
                douanes
                aux sujets
                des taxes et contributions précitées.</li>
        </ul>

        <p>Cette désignation est valable pour toute demande de remboursement de TICFE/CSPE présentée à compter de ce
            jour
            jusqu’à
            dénonciation.</p>



        <pre> Fait à la mailleraye sur seine                 le 22 décembre 2021     </pre>


        <p>Signature et cachet commercial précédée de la mention <b> « Bon pour pouvoir » </b></p>
     <p>Signature et cachet commercial précédée de la mention <b>« Pouvoir accepté »</b> </p>


        <p>au nom et pour le compte de l’entreprise (nom et raison sociale) : <b> ACCESS ENERGIES </b> </p>

        <p>accepte la désignation ci-dessus en qualité de représentant et m’engage à accomplir les formalités afférentes
            aux
            demandes de
            remboursement de la TICFE/CSPE pour le compte de l’entreprise demandeuse.</p>
        <table class="mar">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Client</th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>
                        <b>ACCESS ENERGIES SARL JDMP </b>
                        <p> Représentée par Mr.Hamidou DIAKITE </p>
                        <p>...................... Le____{{ $dateValue }}_, </p>
                    </td>
                    <td>
                        <b>Sté. {{ $company['nom_entreprise'] }} </b>
                        <p> Représentée par {{ $user->firstName . ' ' . $user->lastName }} </p>
                        <p>...................... Le____{{ $dateValue }}_, </p>


                    </td>

                </tr>


            </tbody>
        </table>




    </main>
</body>

</html>

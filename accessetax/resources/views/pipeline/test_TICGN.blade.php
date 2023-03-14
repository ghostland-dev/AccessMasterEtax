@extends('layouts.app')
@section('content')
 
<script>
let codeNaces =[
        "0510",
        "0610",
        "0620",
        "0710",
        "0729",
        "0891",
        "0893",
        "0899",
        "1020",
        "1041",
        "1062",
        "1081",
        "1086",
        "1101",
        "1102",
        "1104",
        "1310",
        "1320",
        "1391",
        "1392",
        "1393",
        "1394",
        "1395",
        "1396",
        "1399",
        "1411",
        "1412",
        "1413",
        "1414",
        "1419",
        "1420",
        "1431",
        "1439",
        "1511",
        "1512",
        "1520",
        "1622",
        "1629",
        "1711",
        "1712",
        "1724",
        "1910",
        "1920",
        "2012",
        "2013",
        "2014",
        "2015",
        "2016",
        "2017",
        "2020",
        "2042",
        "2053",
        "2059",
        "2060",
        "2110",
        "2120",
        "2211",
        "2219",
        "2311",
        "2313",
        "2314",
        "2319",
        "2320",
        "2331",
        "2341",
        "2342",
        "2343",
        "2344",
        "2349",
        "2351",
        "2352",
        "2370",
        "2391",
        "2410",
        "2420",
        "2431",
        "2441",
        "2442",
        "2443",
        "2444",
        "2445",
        "2446",
        "2540",
        "2571",
        "2572",
        "2573",
        "2594",
        "2599",
        "2611",
        "2612",
        "2620",
        "2630",
        "2640",
        "2651",
        "2652",
        "2660",
        "2670",
        "2680",
        "2711",
        "2712",
        "2720",
        "2731",
        "2732",
        "2733",
        "2740",
        "2751",
        "2752",
        "2790",
        "2811",
        "2812",
        "2813",
        "2814",
        "2815",
        "2821",
        "2822",
        "2823",
        "2824",
        "2825",
        "2829",
        "2830",
        "2841",
        "2849",
        "2891",
        "2892",
        "2893",
        "2894",
        "2895",
        "2896",
        "2899",
        "2910",
        "2931",
        "3011",
        "3012",
        "3030",
        "3091",
        "3092",
        "3099",
        "3109",
        "3211",
        "3212",
        "3213",
        "3220",
        "3230",
        "3240",
        "3250",
        "3291",
        "3299",
        "1106",
        "1330",
        "2332",
        "2362",
        "2451",
        "2453",
        "081221",
        "08122250",
        "10311130",
        "10311300",
        "10391725",
        "105121",
        "105122",
        "105153",
        "105154",
        "10515530",
        "108211",
        "108212",
        "108213",
        "10891334",
        "20111150",
        "20111160",
        "20111170",
        "203021",
        "239914",
        "23991910",
        "23991920",
        "25501134"
];

let data = {
TCGNtaxu2015: {
        TICGN_plain: 2.64,
        TICGN_reduit: 1.27,
        CSPE: 19.15
        },
TCGNtaxu2016: {
        TICGN_plain: 4.34,
        TICGN_reduit: 1.6,
        CSPE: 22.5
        },
TCGNtaxu2017: {
        TICGN_plain: 5.88,
        TICGN_reduit: 1.6,
        CSPE: 22.5
        }
};

let Gain = {
An2015: data.TCGNtaxu2015.TICGN_plain - data.TCGNtaxu2015.TICGN_reduit,
An2016: data.TCGNtaxu2016.TICGN_plain - data.TCGNtaxu2016.TICGN_reduit,
An2017: data.TCGNtaxu2017.TICGN_plain - data.TCGNtaxu2017.TICGN_reduit
};

let valeurAjouterEuro = prompt("Valeur Ajoutée  :");
let consumAnGazKwh = prompt("Consommation de gaz :");
let consumAnElecKwh = prompt("Consommation de Electrcité :");

let valeurProduction = prompt("Valeur de production :");
let achatGaz = prompt("Achat de gaz  :");
let achatPetroliers = prompt("Valeur Ajoutée  :");
let achatChaleur = prompt("Achat de chaleur  :");
let Autres = prompt("autres Achat  :");
let consumAnAutreKwh = prompt("Consumation Annuel autre  :");

let combustionProcessus = prompt("Proccessus combustion (true / false)  :");
let pourcentageConsuPorcessus = prompt(
        "Percentage consommation de processus (%) :"
);
let NaceCode = prompt("code Nace :");

let SommeTotalTaxElecPlein =
(data.TCGNtaxu2016.TICGN_plain * consumAnElecKwh) / 1000;
let SommeTotalTaxGazPlein = (data.TCGNtaxu2016.CSPE * consumAnGazKwh) / 1000;

let SommeTotalTaxTCGNPlein =
(consumAnGazKwh * data.TCGNtaxu2017.TICGN_plain) / 1000;
let SommeTotalTaxTCGNReduit =
((pourcentageConsuPorcessus / 100) *
        consumAnGazKwh *
        data.TCGNtaxu2017.TICGN_reduit) /
1000 +
(((100 - pourcentageConsuPorcessus) / 100) *
        consumAnGazKwh *
        data.TCGNtaxu2017.TICGN_plain) /
1000;

console.log(SommeTotalTaxTCGNPlein);
console.log(SommeTotalTaxTCGNReduit);

function etape01() {
        let sum1 = SommeTotalTaxElecPlein + SommeTotalTaxGazPlein;
        let cond01 = 0.005 * valeurAjouterEuro;
        let sum2 = achatGaz + achatChaleur + achatPetroliers;
        let cond02 = 0.03 * valeurProduction;

        if (sum1 > cond01 || sum2 > cond02) {
                return true;
        } else {
                return false;
        }
}

    let Validation01 = etape01();
    document.write(' ✅ etap 1 est validé ');
    let Validation02 = combustionProcessus;
    document.write(' ✅ etap 2 est validé ');
    let Validation03 = codeNaces.includes(NaceCode);
    document.write(' ✅ etap 3 est validé ');

    let fullvalidation =
    Validation01 && Validation02 && Validation03? true: false;
    let esitmationEconomie =
    Math.round(SommeTotalTaxTCGNPlein - SommeTotalTaxTCGNReduit) + "€ Hors TVA";
    document.write("💰 Etimation de remboursement : "+esitmationEconomie);

</script>

 

@endsection
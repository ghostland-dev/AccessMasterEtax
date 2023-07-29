<!DOCTYPE html>
<html>

<head>
    <title>Contrat de prestation de services</title>
    <style>
        .smaller {
            font-size: 9px;
        }

        body {
            font-family: Helvetica;
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #1f343f;
            padding: 1em;
            border-radius: 1em;
            background-color: #edeff2;
            font-family: Helvetica;
        }

        .logo {
            max-width: 200px;
            display: block;
            margin: 0 auto;
        }

        .center {
            text-align: center;
        }

        .b {
            font-weight: bold;
        }

        .m {
            margin: 0;
        }

        .p {
            padding: 0;
        }

        .u {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .mar {
            margin: 1em 0;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .page-break {
            page-break-before: always;
            page-break-after: always;
        }

        .signature {
            display: flex;
        }

        .signature .left,
        .signature .right {
            flex: 1;
        }
    </style>
</head>

<body>
    <img class="logo" src="https://example.com/img/clients/Voltaria.png" alt="Voltaria">
    <br>
    <br>
    <main>
        <p class="center">
            <b>
                SARL {{ $company['nom_entreprise'] }} <br>
                {{ $company['siege']['adresse_ligne_1'] }} <br>
                {{ $company['siege']['code_postal'] }} {{ $company['siege']['ville'] }} <br>
            </b>
        </p>
        <p class="center">Paris, le {{ $dateValue }}</p>
        <br>
        <p><b>Objet: Contrat de prestation de services</b></p>
        <b>Madame, Monsieur</b>
        <p>
            Nous vous remercions de choisir VOLTARIA pour la réalisation de la mission et des services ci-après
            décrits (les "Services") pour la société CLIENT (ci-après "CLIENT" ou "Vous" ou "le Client"). Nous sommes
            honorés
            d’avoir l’opportunité de vous assister et de collaborer avec vous.

            Le contrat ci-joint décrit le périmètre de la mission, nos honoraires et autres conditions de réalisation.

            Si les termes de ce contrat vous agréent, nous vous remercions de bien vouloir le remplir et le signer à
            l’endroit prévu à cet effet et nous le retourner à votre meilleure convenance par email en PDF et par
            courrier.
            Dans l’intervalle, nous restons à votre disposition pour toute question ou tout élément pouvant avoir un
            impact sur le démarrage de nos travaux.
        </p>
        <br>
        Respectueusement,
        <br>
        <p>
            VOLTARIA<br>
            Jean DUPONT<br>
            Président fondateur<br>
        </p>



        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
        <div class="page-break"></div>
        <h2 class="center">CONTRAT DE PRESTATION DE SERVICES</h2>
        <br>
        <br>
        <br>
        <b>ENTRE LES PERSONNES SOUSSIGNEES :</b>
        <p>
            CLIENT, ayant son siège social situé 2 rue du Client, 75002 PARIS, France, enregistrée auprès du Registre du
            Commerce et des Sociétés de PARIS, sous le numéro 00000000000000, représentée par M. Marie MARTIN, dûment
            autorisée aux fins du présent accord (désigné ci-après «Le Contrat»),
        </p>
        <p>
            désignée ci-après «LA SOCIETE»
        </p>
        <b>D’UNE PART</b>
        <b>ET :</b>
        <p>
            VOLTARIA, ayant son siège social situé au 240 chemin de l’ouraille 75001 Paris,
            France, enregistrée auprès du Registre du Commerce et des Sociétés de PARIS sous le numéro 000 000 000,
            représentée par M. DUPONT Jean, dûment autorisé aux fins du présent accord,
        </p>
        <p>
            désignée ci-après «VOLTARIA»
        </p>
        <p class="b">D’AUTRE PART</p>
        <p>
            (LA SOCIETE et VOLTARIA étant désignés ci-après individuellement une <b>«Partie»</b> et conjointement
            les <b>«Parties»</b>.)</p>
        <p class="b">LES PARTIES ONT CONVENU DE CE QUI SUIT :</p>
        <p class="center b">Identifiant de contrat: {{ $company['siren'] }}</p>
        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
        <h3 class="center">ARTICLE UN</h3>
        <p>
            Périmètre de la mission & Description des Services

            Nous sommes ravis de vous assister en matière de réclamation de droits d’accises sur l’électricité dénommée
            Contribution au Service Public de l’Electricité et désignée «CSPE».

            LA SOCIETE possède un site de production à SAMOREAU (77) dédié à la production Viennoiserie Pâtisserie. Pour
            les besoins de son processus de production, LA SOCIETE consomme de l’électricité sur laquelle elle acquitte
            de la CSPE. Le site de production de LA SOCIETE peut bénéficier d’une exonération partielle de la CSPE sous
            conditions. Nous réaliserons ainsi pour vous les travaux décrits ci-après:
        </p>
        <table>
            <thead>
                <tr>
                    <th>Numero de PDL</th>
                    <th>Site</th>
                    <th>Ville</th>
                    <th>SIRET</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sites as $site)
                    <tr>
                        <td>22164688832805</td>
                        <td>J D M P</td>
                        <td>{{ $site->code_postal }} {{ $site->ville }}</td>
                        <td>{{ $site->siret }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>
            <b>ETAPE 1 :</b> VOLTARIA étudie en premier lieu le respect de critères d’exonération. Nous
            collecterons
            les documents et informations nécessaires auprès de vous, puis les analyserons. Nous vous livrerons ensuite
            la confirmation (ou non) de l’applicabilité des exonérations dans un rapport et les valoriserons.
            <br><br>
            <b>ETAPE 2 :</b> VOLTARIA constitue pour votre compte la demande de remboursement. Elle répond au
            formalisme imposé par la règlementation douanière et prend la forme d’un dossier technique et règlementaire.
            Cette réclamation sera soumise à votre validation préalable quant à la correcte restitution de la
            présentation
            de votre société et des procédés industriels réalisés sur votre site. Sur votre accord, la demande de
            remboursement de CSPE ainsi préparée sera introduite auprès du bureau de douane territorialement compétent.
            <br><br>
            <b>VOLTARIA</b> assure le suivi et la correspondance avec les autorités douanières pour un
            traitement,
            le plus diligent possible, de la demande de remboursement <i>(voir pouvoir en annexe 1)</i>. LA SOCIETE
            s’engage
            à informer et transmettre à VOLTARIA toute correspondance que les autorités douanières pourraient lui
            adresser directement concernant ladite demande de remboursement. Tout remboursement sera perçu directement
            sur
            le compte bancaire de LA SOCIETE.
        </p>
        <h3 class="center">ARTICLE DEUX</h3>
        <p>
            <b>VOLTARIA</b> doit, par l'intermédiaire de son personnel ou de ses agents, fournir à LA SOCIETE les
            services énoncés au présent Contrat avec tous les soins et toutes les compétences raisonnables au mieux de
            sa capacité.
        </p>
        <p class="center b">Identifiant de contrat: {{ $company['siren'] }}</p>
        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
        <h3 class="center">ARTICLE TROIS</h3>
        <p>
            LA SOCIETE met à la disposition VOLTARIA, de son personnel ou de ses agents, toute information ou
            document requis par VOLTARIA pour lui permettre de s'acquitter des obligations qui lui incombent en
            vertu du présent Contrat.
            <br><br>
            → Si VOLTARIA réalise les Services dans les locaux de LA SOCIETE ou dans des locaux que LA SOCIETE
            invite à visiter (à condition qu’VOLTARIA accepte cette invitation), VOLTARIA s’engage à
            respecter les exigences de santé et de sécurité qui auront été communiquées à VOLTARIA avant le début
            des Services, à condition que le personnel d’VOLTARIA reçoive exactement la même protection que celle
            offerte aux collaborateurs et employés de LA SOCIETE. Les coûts additionnels dus à l'application de telles
            exigences en matière de santé et de sécurité sont alors supportés par LA SOCIETE.
        </p>
        <h3 class="center">ARTICLE QUATRE</h3>
        <p>
            <b>VOLTARIA</b> s'engage à ne pas utiliser et / ou divulguer les informations qui lui seraient
            transmises
            par la SOCIETE, à des fins autres que la fourniture des Services décrits à l’Article 1 du présent Contrat.
            Cette condition ne s’applique pas aux informations qui se trouvent ou qui relèvent du domaine public.
        </p>
        <h3 class="center">ARTICLE CINQ</h3>
        <p>
            Les frais et dépenses d’VOLTARIA sont payables en Euros, à réception de la facture, selon les
            dispositions
            suivantes.
        </p>
        <h4 class="u">PHASE 1 : AUDIT DES OPPORTUNITES DE REMBOURSEMENT</h4>
        <ul>
            <li>Collecte des documents et informations</li>
            <li>Analyse du respect des critères d’exonération eu égard aux procédés industriels des sites, ainsi qu’à
                différents aspects environnementaux et financiers</li>
            <li>Validation des fondements d’exonération de CSPE.</li>
        </ul>
        <h4 class="u">PHASE 2 : CONSTITUTION DES DEMANDES DE REMBOURSEMENT</h4>
        <ul>
            <li>Constitution des dossiers techniques de demandes de remboursement de CSPE ;</li>
            <li>Le formalisme des dossiers se doit de respecter scrupuleusement les critères imposés par la
                règlementation douanière.</li>
        </ul>
        <p class="center b">Identifiant de contrat: {{ $company['siren'] }}</p>
        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
        <h4 class="u">Honoraires pour les phases 1 et 2:</h4>
        <p>
            - Si la demande est refusée, et que le Client ne bénéficie d’aucun remboursement de la CSPE, alors aucun
            coût de prestation ne lui sera facturé.
            <br>
            - Facturation de 30% (trente pour cent) des montants reversés au Client par les Services de l’État, après la
            validation du remboursement par l’administration des douanes.
        </p>
        <h4 class="u">PHASE 3 : PERENNISATION DES EXONERATIONS</h4>
        <p>
            Préparation des modèles d’attestation d’exonération (une attestation est nécessaire par taxe et par site).
            Ces attestations seront transmises aux fournisseurs d’énergie et à l’administration des douanes dès lors que
            l’exonération aura été validée.
        </p>
        <h4 class="u">Honoraires pour la phase 3: Pro Bono.</h4>
        <p>
            Les dépenses et les débours vous seront facturés en supplément le cas échéant.
            Dans l’éventualité où vous auriez besoin d'un numéro de bon de commande devant être mentionné
            obligatoirement
            sur nos factures, il vous appartient de nous envoyer ce numéro dans un délai maximum de 15 jours à compter
            de
            la signature de l'accord.
        </p>
        <h3 class="center">ARTICLE SIX</h3>
        <p>
            Le Contrat entrera en vigueur à la date de sa signature. Il prendra fin à l’issue de la réalisation des
            Services
            décrits à l’Article 1.
        </p>
        <h3 class="center">ARTICLE SEPT</h3>
        <p>
            Aucune des Parties ne peut céder la totalité ou une partie de ses droits ou obligations en vertu du Contrat
            sans
            le consentement écrit préalable de l'autre Partie.
        </p>
        <h3 class="center">ARTICLE HUIT</h3>
        <p>
            Le présent Contrat sera régi et interprété conformément aux lois de la France. Le tribunal de commerce de
            Nanterre
            (92) est compétent.
        </p>
        <p class="center b">Identifiant de contrat: {{ $company['siren'] }}</p>
        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
        <h3 class="center">ARTICLE NEUF</h3>
        <p>
            Dans le cas où une disposition du présent Contrat est jugée contraire à une loi, un décret ou un règlement,
            ladite disposition doit, si possible, être réadaptée afin qu'elle soit conforme aux exigences légales ou
            réglementaires tout en procurant un équivalent résultat économique.
            Le non-respect de cette disposition ne doit ni affecter ni rendre nulles et non avenues les autres
            dispositions.
        </p>
        <p class="center"> <b>ARTICLE DIX</b> </p>
        <p>
            Le présent Contrat exprime l’intégralité des obligations contractuelles liant les parties à la date de la
            signature.
            Il ne peut être modifié que par un avenant écrit signé par l’ensemble des parties signataires.
        </p>
        <b>Signé en deux exemplaires originaux</b>


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
                        <b>VOLTARIA SARL CLIENT </b>
                        <p> Représentée par Mr.Jean DUPONT </p>
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

        <b>Liste des annexes jointes au présent contrat</b>
        <ul>
            <li> Annexe 1 du Contrat – POUVOIR</li>
            <li> Annexe 2 du Contrat – C.G.V</li>
        </ul>
        <p>Date de création de contrat: {{ $dateValue }}</p>
        <p class="center b">Date de soumission de contrat au client:</p>
        <p class="center b">Identifiant de contrat: {{ $company['siren'] }}</p>
        <p class="center smaller">
            VOLTARIA, EURL au capital de 100 000 € - RCS PARIS – SIRET 000 000 000 00000 – n° T.V.A: FR 63
            000 000 000<br>
            240 Chemin de l’ouraille 75001 Paris
        </p>
    </main>
</body>

</html>

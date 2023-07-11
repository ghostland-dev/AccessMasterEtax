$(document).ready(function () {
    // Masquer l'élément avec l'id 'eligible'
    $('#eligible').hide();

    // Gérer l'événement click du bouton avec l'id 'closeAlert'
    $("#closeAlert").on('click', function () {
        // Masquer l'élément avec l'id 'alerte' en modifiant les classes CSS
        $('#alerte').removeClass('flex').addClass('hidden');
    });

    // Gérer l'événement click du bouton avec l'id 'getnafGen'
    $("#getnafGen").on('click', function () {
        var sirenValue = $('#SIREN').val().trim();
        if (sirenValue.length >= 7 && sirenValue.length <= 10) {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            // Effectuer une requête AJAX en utilisant fetch
            fetch(`/app/v1/data/pappers?siren=${sirenValue}`, requestOptions)
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        // Afficher l'alerte en cas d'erreur de connexion internet
                        $('#alerte').removeClass('hidden').addClass('flex');
                        $('#messageAlerte').text("Il semble que vous n'avez pas de connexion internet");
                    }
                })
                .then(function (data) {
                    if (data.resultats_siren && data.resultats_siren.length > 0) {
                        var codeNafValue = data.resultats_siren[0].code_naf;
                        $("#codeNaf").val(codeNafValue);
                        let input = $("#codeNaf").val();
                        try {
                            const value = parseInt(input.trim().split(".")[0]);
                            const lengths = input.trim().length;

                            if (value > 4 && value < 40 && lengths === 6) {

                                showOtherFields();
                                $('#eligible').hide();
                            } else {
                                $('#eligible').show();
                                hideOtherFields();

                            }
                        } catch (error) {

                            $('#alerte').removeClass('hidden').addClass('flex');
                            $('#messageAlerte').text(error.message);
                        }


                        if (codeNafValue.length > 3) {
                            $(".codeNaf").show();
                        }
                    } else {
                        // Afficher l'alerte en cas de numéro SIREN invalide
                        $('#alerte').removeClass('hidden').addClass('flex');
                        $('#messageAlerte').text("Veuillez fournir un numéro SIREN valide");
                    }
                })
                .catch(function (error) {
                    // Afficher l'alerte en cas d'erreur lors de la requête
                    $('#alerte').removeClass('hidden').addClass('flex');
                    $('#messageAlerte').text(error.message);
                });
        } else {
            // Afficher l'alerte en cas de longueur invalide du numéro SIREN
            $('#alerte').removeClass('hidden').addClass('flex');
            $('#messageAlerte').text('Le numéro SIREN doit contenir entre 7 et 10 caractères.');
        }
    });

    // Fonction pour gérer les données de l'image
    function imageData(url) {
        const originalUrl = url || '';
        return {
            previewPhoto: originalUrl,
            fileName: null,
            emptyText: originalUrl ? 'Aucun fichier n\'a été sélectionné' : 'Aucun fichier',
            updatePreview($refs) {
                var reader,
                    files = $refs.input.files;
                reader = new FileReader();
                reader.onload = (e) => {
                    this.previewPhoto = e.target.result;
                    this.fileName = files[0].name;
                };
                reader.readAsDataURL(files[0]);
            },
            clearPreview($refs) {
                $refs.input.value = null;
                this.previewPhoto = originalUrl;
                this.fileName = false;
            }
        };
    }

    const input = $('#codeNaf');

    if (input) {
        console.log('start');
        input.on('input', function () {
            console.log('1');
            try {
                const value = parseInt(input.val().trim().split(".")[0]);
                const lengths = input.val().trim().length;

                if (value > 4 && value < 40 && lengths === 6) {
                    console.log('4');
                    showOtherFields();
                    $('#eligible').hide();
                } else {
                    $('#eligible').show();
                    hideOtherFields();

                }
            } catch (error) {

                $('#alerte').removeClass('hidden').addClass('flex');
                $('#messageAlerte').text(error.message);
            }

        });
    }

    function showOtherFields() {
        $('#otherFields').show();
        $('#nextButton').show();
    }

    function hideOtherFields() {
        $('#otherFields').hide();
        $('#nextButton').hide();
    }

    $(document).ready(function () {
        // Initialiser le formulaire en étapes
        const formSteps = $('.form-step');
        formSteps.hide();
        $('#step1').show();

        // Gérer les boutons "Suivant"
        $('.next-step').click(function (e) {
            const activeStep = $(this).closest('.form-step');
            activeStep.hide();
            activeStep.next().show();
        });

        // Gérer les boutons "Précédent"
        $('.prev-step').click(function (e) {
            const activeStep = $(this).closest('.form-step');
            activeStep.hide();
            activeStep.prev().show();
        });
    });

});

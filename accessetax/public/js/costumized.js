$(document).ready(function () {
    $("#closeAlert").on('click', function () {

        $('#alerte').removeClass('flex');
        $('#alerte').addClass('hidden');

    })

    $("#getnafGen").on('click', function () {
        var sirenValue = $('#SIREN').val().trim();
        if (sirenValue.length >= 7 && sirenValue.length <= 10) {
            var requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch(`/app/v1/data/pappers?siren=${sirenValue}`, requestOptions)
                .then(function (response) {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Network response was not OK.');
                    }
                })
                .then(function (data) {
                    console.log(data);

                    if (data.resultats && data.resultats.length > 0) {
                        var codeNafValue = data.resultats[0].code_naf;
                        $("#codeNaf").val(codeNafValue);
                        if (codeNafValue.length > 3) {
                            $(".codeNaf").show();
                        }
                    } else {
                        throw new Error('No data found for the provided SIREN.');
                    }
                })
                .catch(function (error) {
                    $('#alerte').removeClass('hidden').addClass('flex');
                    $('#messageAlerte').text(error.message);
                });
        } else {
            $('#alerte').removeClass('hidden').addClass('flex');
            $('#messageAlerte').text('SIREN should be between 7 and 10 characters.');
        }
    });

});


function imageData(url) {
    const originalUrl = url || '';
    return {
        previewPhoto: originalUrl,
        fileName: null,
        emptyText: originalUrl ? 'aucun fichier n\'a été selectionné' : 'aucun fuchier',
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






const input = document.querySelector('#codeNaf') ?? null;


if (input) {
    input.addEventListener('input', function () {



        try {
            const value = parseInt(input.value.trim().split(".")[0]);
            const lengths = input.value.trim().length;

            if ((value > 4) && (value < 40) && (lengths === 6)) {

                showOtherFields();

            } else {
                hideOtherFields();

            }

        } catch (error) {
            $('#alerte').removeClass('hidden').addClass('flex');
            $('#messageAlerte').text(error.message);
        }



    });



    function updateOptions(data) {
        const dropdown = input.nextElementSibling;
        dropdown.innerHTML = '';
        const filteredData = data.filter(function (option) {
            return option.code_naf.startsWith(input.value.trim());
        });
        if (filteredData.length === 0) {
            const item = document.createElement('li');
            item.textContent = 'Aucun résultat trouvé';
            item.classList.add('dropdown-item', 'disabled');
            dropdown.appendChild(item);
        } else {
            filteredData.forEach(function (option) {
                const link = document.createElement('a');
                link.href = '#';
                link.textContent = option.code_naf;
                link.classList.add('dropdown-item');
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    input.value = option.code_naf;
                    showOtherFields();
                    clearOptions();
                });
                const item = document.createElement('li');
                item.appendChild(link);
                item.classList.add('dropdown-item');
                dropdown.appendChild(item);
            });
        }
        dropdown.classList.add('dropdown-menu', 'show');
    }
    function clearOptions() {
        const dropdown = input.nextElementSibling;
        dropdown.innerHTML = '';
        dropdown.classList.remove('show');
    }
    function showOtherFields() {

        document.querySelector('#otherFields').style.display = 'block';
        document.querySelector('#nextButton').style.display = 'block';

    }
    function hideOtherFields() {
        document.querySelector('#otherFields').style.display = 'none';
        document.querySelector('#nextButton').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the form wizard
        const formSteps = document.querySelectorAll('.form-step');
        formSteps.forEach(step => step.style.display = 'none');
        document.getElementById('step1').style.display = 'block';

        const nextButtons = document.querySelectorAll('.next-step');
        nextButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                const activeStep = this.closest('.form-step');
                activeStep.style.display = 'none';
                activeStep.nextElementSibling.style.display = 'block';

            });
        });

        const prevButtons = document.querySelectorAll('.prev-step');
        prevButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                const activeStep = this.closest('.form-step');
                activeStep.style.display = 'none';
                activeStep.previousElementSibling.style.display = 'block';

            });
        });
    });

}




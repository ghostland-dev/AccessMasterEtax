
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

function showLoading() {
    document.querySelector('#loading').classList.add('loading');
    document.querySelector('#loading-content').classList.add('loading-content');
}



function hideLoading() {
    document.querySelector('#loading').classList.remove('loading');
    document.querySelector('#loading-content').classList.remove('loading-content');
}

showLoading()


$(document).ready(function () {

    $("#nafGen").on('click', function () {


        if ($('#SIREN').val().length >= 7 && $('#SIREN').val().length <= 10) {
            let requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };
            let entreprise_name = $.trim($("#SIREN").val());

            fetch(`http://127.0.0.1:8000/app/v1/data/pappers/${entreprise_name}`, requestOptions).then(function (response) {

                return response.json();
            }).then(function (data) {
                console.log(data)

                $("#codeNaf").val(data.resultats[0].code_naf);
                if ($("#codeNaf").val().length > 3) {
                    $(".codeNaf").show()
                }
                return true
            }).catch(function (error) {
                alert('Désolé, le numéro SIREN que vous avez fourni est inccorect ou invalide, veuillez réessayez avec un siren valide !')
            });
        } else {
            alert('SIREN est composé de 8 chiffres minmum')
        }

    });
});


// Get all file input elements and progress bar elements
var fileInputs = document.querySelectorAll(".file-input");
var progressBars = document.querySelectorAll(".progress");

// Loop through each file input element and add event listener for file selection
for (var i = 0; i < fileInputs.length; i++) {
    fileInputs[i].addEventListener("change", function (event) {
        // Get the selected file from the input
        var file = event.target.files[0];
        // Get the progress bar element associated with this file input
        var progressBar = this.parentElement.nextElementSibling;
        // Get the progress bar element inside the progress bar container
        var progress = progressBar.querySelector(".progress");

        // Check if a file was selected
        if (file) {
            // Create a new FileReader object to read the file
            var reader = new FileReader();

            // When loading of the file starts, set the progress bar to 0% and show it
            reader.onloadstart = function () {
                progress.style.width = "0%";
                progressBar.style.display = "block";
            }

            // While the file is being loaded, update the progress bar with the percentage of the file loaded
            reader.onprogress = function (event) {
                if (event.lengthComputable) {
                    var percent = Math.round((event.loaded / event.total) * 100);
                    progress.style.width = percent + "%";
                }
            }

            // When the file has finished loading, set the progress bar to 100% and hide it
            reader.onload = function () {
                progress.style.width = "100%";
                progressBar.style.display = "none";
            }

            // Read the file as a data URL
            reader.readAsDataURL(file);
        }
    });
}

// const input = document.querySelector('#codeNaf') ?? null;
// // const url = 'http://127.0.0.1:8000/api/v1/data/code_naf';
// // const url = '/api/v1/data/code_naf';

// if (input) {
//     input.addEventListener('input', function () {

//         const value = input.value.trim();
//         if (value.length > 4) {

//             const xhr = new XMLHttpRequest();
//             xhr.open('GET', `${url}?q=${value}`);
//             xhr.onload = function () {
//                 if (xhr.status === 200) {

//                     const data = JSON.parse(xhr.responseText);

//                     if (data[0].length > 0) {

//                         showOtherFields();

//                     } else {
//                         hideOtherFields();

//                     }
//                     updateOptions(data);

//                 } else {
//                     console.error(`Request failed. Returned status of ${xhr.status}`);
//                 }
//             };
//             xhr.send();
//         } else {
//             hideOtherFields();
//             clearOptions();
//         }
//     });


const input = document.querySelector('#codeNaf') ?? null;


// const url = 'http://127.0.0.1:8000/api/v1/data/code_naf';
// const url = '/api/v1/data/code_naf';

if (input) {
    input.addEventListener('change', function () {

        const value = parseInt(input.value.trim().split(".")[0]);
        const lengths = input.value.trim().length;

        console.log(parseInt(value))

        if ((value > 4) && (value < 40) && (lengths === 6)) {

            showOtherFields();

        } else {
            hideOtherFields();

            alert('Désolé vous n\'est pas eligible')

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




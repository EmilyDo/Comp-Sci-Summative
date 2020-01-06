var imgProblem;
var imgSolution;

function readURLProblem(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#uploadProblem')
                .attr('src', e.target.result)
                .width(640);
        };

        reader.readAsDataURL(input.files[0]);
    }

    if (document.getElementById("defaultImgP").style.display === "block") {
        document.getElementById("defaultImgP").style.display = "none";
    }
}

function readURLSolution(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#uploadSolution')
                .attr('src', e.target.result)
                .width(640);
        };

        reader.readAsDataURL(input.files[0]);
    }

    if (document.getElementById("defaultImgS").style.display === "block") {
        document.getElementById("defaultImgS").style.display = "none";
    }
}

//problem stuff
function displayIconP() {
    document.getElementById("icon-problem").style.display = "block";
}

function hideIconP() {
    document.getElementById("icon-problem").style.display = "none";
}

//solution stuff*/
function displayIconS() {
    document.getElementById("icon-solution").style.display = "block";
}

function hideIconS() {
    document.getElementById("icon-solution").style.display = "none";
}

//problem stuff
function displayIconUploadP() {
    document.getElementById("icon-uploadP").style.display = "block";
}

function hideIconUploadP() {
    document.getElementById("icon-uploadP").style.display = "none";
}

function displayUploadP() {
    document.getElementById("uploadProblem").style.display = "block";
    imgProblem = document.getElementById("uploadProblem");
    fetchProblem(imgSolution);

}

//solution stuff*/
function displayIconUploadS() {
    document.getElementById("icon-uploadS").style.display = "block";
}

function hideIconUploadS() {
    document.getElementById("icon-uploadS").style.display = "none";
}

function displayUploadS() {
    document.getElementById("uploadSolution").style.display = "block";
    imgSolution = document.getElementById("uploadSolution");
    fetchSolution();

}



//returning the problem image uploaded by teacher//
function fetchProblem() {
    return imgSolution;
}

//returning solution image uploaded by teacher
function fetchSolution() {
    return imgSolution;
}
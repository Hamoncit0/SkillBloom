document.getElementById("reviewForm").addEventListener('submit', function(event){
    event.preventDefault();
    let isValid = true;

    const review = document.getElementById("review");
    const reviewError = document.getElementById("reviewError");
    const reviewScore = document.getElementById("reviewScore");
    const reviewScoreError = document.getElementById("reviewScoreError");
    if(review.value === ""){
        isValid = false;
        console.log("ewww")
        reviewError.textContent = "Please write a review"
    }
    else{
        reviewError.textContent = "";
    }
    if( reviewScore.value === ""){
        isValid = false;
        console.log("ewww")
        reviewScoreError.textContent = "Please input a score"
    }
    else{
        reviewScoreError.textContent = ""

    }
    // Si todas las validaciones pasan, muestra el mensaje de éxito y limpia el formulario
    if (isValid) {
        alert('Review uploaded successfully');
        this.reset();
        window.location.href = '/'; 
    }
});
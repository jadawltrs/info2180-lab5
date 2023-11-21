document.addEventListener("DOMContentLoaded", function() {
    const lookupBtn = document.getElementById("lookup");
    var countryInput = document.getElementById("country");
    const resultDiv = document.getElementById("result");

    lookupBtn.addEventListener("click", function(event) {
        event.preventDefault();
        var country = countryInput.value;
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                resultDiv.innerHTML = xhr.responseText;
            }
        }; 
        
        xhr.open("GET", "world.php?country=" + encodeURIComponent(country), true);
        xhr.send();
    });
});

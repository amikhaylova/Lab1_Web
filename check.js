window.onload = function () {
    let warning_element = document.getElementById("warning");
    document.getElementById("x_value").oninput = function (e) {
        warning_element.style.visibility = "hidden";
        let input = e.target.value;
        let incorrect = isNaN(e.target.value);
        console.log(incorrect);
        if (incorrect === true) {
            if (input !== "-") {
                e.target.value = input.substring(0, input.length - 1);
                warning_element.textContent = "Требуется число!";
                warning_element.style.visibility = "visible";
            }
        } else if (parseInt(input) < -3) {
            e.target.value = "-3";
            warning_element.textContent = "Не меньше -3";
            warning_element.style.visibility = "visible";
        } else if (parseInt(input) > 5) {
            e.target.value = "5";
            warning_element.textContent = "Не больше 5";
            warning_element.style.visibility = "visible";
        }
    }
    document.getElementById("x_value").onblur = function (e) {
        warning_element.style.visibility = "hidden"
        let input = e.target.value;
        if (input === "-") {
            e.target.value = "";
            warning_element.textContent = "Требуется число!";
            warning_element.style.visibility = "visible"
            setTimeout(function () {
                    warning_element.style.visibility = "hidden"
                },
                2000);
        }
    }
}


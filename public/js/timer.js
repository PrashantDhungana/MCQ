function startTimer(duration, display) {
    var timer = duration,
        minutes,
        seconds;
    end = setInterval(main, 1000);
    function main() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        var time = document.getElementById("time").innerHTML;

        var res = time.split(":");
        if (parseInt(res[0]) < 20) {
            document.getElementById("time").style.color = "#FF0000";
        }

        if (--timer < 0) {
            clearInterval(end);
            document.getElementById("myForm").submit();
        }
    }
}

function timer() {
    var Minutes = 60 * 45,
        display = document.querySelector("#time");

    startTimer(Minutes, display);
}

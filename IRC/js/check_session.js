setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "src/php/sessions/check_session.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.response);
                if (xhr.response === "no_session") {
                    window.location.href = "join.php";
                }
            }
        }
    }
    xhr.send();
}, 333); // Run every 1/3 of a second
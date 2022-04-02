// Find elements from the DOM
const form = document.querySelector(".msg-form");
var sendBtn = form.querySelector(".msg-send-btn");
var inputField = form.querySelector(".msg-content-text");
var chatBox = document.querySelector(".msgs");

// Prevent default event on msg-form submit event
form.onsubmit = (e) => {
    e.preventDefault();
}

// Send button onclick event
sendBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "src/php/send_message.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// Code that runs every 250ms that retrieves message data from the db and displays it in the chat
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "src/php/chat_load.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 250);
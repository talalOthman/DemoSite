var messages = document.getElementById("messages");
var text = document.getElementById("message");
var button = document.getElementById("submit");

button.addEventListener("click", ()=>{
    var newMessage = document.createElement("li");
    newMessage.innerHTML = text.value;
    messages.appendChild(newMessage);

    text.value = "";
});



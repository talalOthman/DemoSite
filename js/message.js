var messages = document.getElementById("messages");
var text = document.getElementById("message");
var button = document.getElementById("submit");

button.addEventListener("click", ()=>{
    sendMessage();
});

text.addEventListener("keydown", (e)=>{
    if(e.code==="Enter"){
        sendMessage();
    }
})

function sendMessage(){
    var newMessage = document.createElement("li");
    newMessage.innerHTML = text.value;
    messages.appendChild(newMessage);

    text.value = "";
}



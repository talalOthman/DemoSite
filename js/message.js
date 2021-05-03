var messages = document.getElementById("messages");
var text = document.getElementById("message");
var button = document.getElementById("submit");
var file = document.getElementById("file");
var fileButton = document.getElementById("fileButton");
var dummy = document.getElementById("dummy");


fileButton.addEventListener('click', openDialog);

function openDialog() {
  file.click();
}

button.addEventListener("click", ()=>{
    sendMessage();
});

dummy.addEventListener("click", ()=>{
    dummyMessage();
});

text.addEventListener("keydown", (e)=>{
    if(e.code==="Enter"){
        sendMessage();
    }
})

function sendMessage(){
    
    var newMessage = document.createElement("div");
    newMessage.innerHTML = file.value.replace(/.*[\/\\]/, '') + " " + text.value;

    if(newMessage.innerHTML === " "){
    }
    else{
        messages.appendChild(newMessage);
    }
    

    text.value = "";
    file.value="";
}

function dummyMessage(){
    
    var newDUM = document.createElement("div");
    newDUM.className = "recieved";
    newDUM.innerHTML = "dummy message";

    messages.appendChild(newDUM);
    
}





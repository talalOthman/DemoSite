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
    var newMessageBody = document.createElement("div");
    var newFile = document.createElement("div");

    newMessage.className = "message";
    newMessageBody.className = "text";
    newFile.className = "doc";

    newMessageBody.innerHTML = text.value;
    newFile.innerHTML = file.value.replace(/.*[\/\\]/, '');

    

    if(newFile.innerHTML === ""){
        
    }
    else{
        newMessage.appendChild(newFile);
        
    }

    if(newMessageBody.innerHTML === ""){
        
    }
    else{
        newMessage.appendChild(newMessageBody);
    }
    

    if(newMessageBody.innerHTML === "" && newFile.innerHTML === ""){
    }
    else{
        messages.appendChild(newMessage);
    }
    

    text.value = "";
    file.value="";


    var elem = document.getElementById('content');
    elem.scrollTop = elem.scrollHeight;
}

function dummyMessage(){
    
    var newDUM = document.createElement("div");
    newDUM.className = "recieved message";
    newDUM.innerHTML = "dummy message";

    messages.appendChild(newDUM);


    var elem = document.getElementById('content');
    elem.scrollTop = elem.scrollHeight;
    
}





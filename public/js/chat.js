const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");
// let theme = document.querySelector(".theme");


form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

// function changeTheme(){
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "php/theme.php", true);
//     xhr.onload = ()=> {
//       if(xhr.readyState === XMLHttpRequest.DONE){
//           if(xhr.status === 200){
//           theme.innerHTML=xhr.response;
//           }
//       }
//     }
//     xhr.send();
// }
// theme.onclick = () =>{
//     changeTheme();
// }


sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/message/" + incoming_id + "/chat", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
            }
        }
        else{
            console.log(xhr.status);
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("get", "/message/" + incoming_id + "/display", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);


chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}



function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

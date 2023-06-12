const forms = document.querySelector(".typing-area"),
inputField = forms.querySelector(".input-field"),
sendBtn = forms.querySelector("button"),
chatBox = document.querySelector(".chat-box");

forms.onsubmit=(e)=>{
  e.preventDefault();
}

sendBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            inputField.value = ""; // Once its inserted into database it will clear the inputfield
        }
    }
  }
  let formDataa = new FormData(forms);
  xhr.send(formDataa);
}

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true); // Using get because we are retreving data not sending
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };
  let formDataa = new FormData(forms);
  xhr.send(formDataa);
}, 500); // This function will run after every 500ms
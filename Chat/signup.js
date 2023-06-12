const formm = document.querySelector(".signup form"),
  continueBtn = formm.querySelector(".button input"),
  errorText = formm.querySelector(".error-txt");

formm.onsubmit = (e) => {
  e.preventDefault(); // Preventing form from submitting
};

continueBtn.onclick = ()=>{
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data === "success"){
              location.href="user.php";
            }else{
              errorText.style.display = "block";
              errorText.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(formm);
  xhr.send(formData);
}

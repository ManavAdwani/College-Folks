const searchBar = document.querySelector(".user .search input"),
  searchBtnn = document.querySelector(".user .search button"),
  usersList = document.querySelector(".user .user-list");

searchBtnn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtnn.classList.toggle("active");
  searchBar.value = "";
};

searchBar.onkeyup = () => {
  let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }else{
        searchBar.classList.remove("active");
    }


  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        usersList.innerHTML = data;
      }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true); // Using get because we are retreving data not sending
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if(!searchBar.classList.contains("active")){
            usersList.innerHTML=data;
        }
      }
    }
  };
  xhr.send();
}, 500); // This function will run after every 500ms

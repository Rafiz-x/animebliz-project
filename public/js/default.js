function defaultJs() {
  // const search = document.body.querySelector(".search");
  // const searchIcon = document.body.querySelector("#searchIcon");
  // const searchBoxInput = document.body.querySelector(".searchBox input");

  // search.onclick = () => {
  // if (!search.classList.contains("activated")) {
  //   search.classList.add("activated");
  //   searchBoxInput.focus();
  // }
  // };

  // ### SEARCH AREA ###


  const searchIcon = document.body.querySelector("#searchIcon");

  searchIcon.addEventListener('click', e => {
    // let url = searchIcon.getAttribute('data-url');
    // location.href = url; 

    // if (!searchArea.classList.contains('activated')) {
    //   searchArea.classList.replace('left-full', 'left-0');
    //   searchArea.classList.add('activated')
    //   handleBodyScrolling(true);
    // }
  })



  // ### END - SEARCH AREA ##

}

// function handleBodyScrolling(boolTrue) {
//   if (boolTrue) {
//     document.body.style.overflowY = 'hidden';
//   } else {
//     document.body.style.overflowY = '';
//   }
// }
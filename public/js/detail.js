const navBarTag = document.getElementById("Navbar1234");
const editTag = document.getElementById("editTag");
const commentTag = document.getElementById("commentTag");
const commentInputTag = document.getElementById("commentInputTag");

window.onwheel = (e) => {
    if (e.deltaY >= 0) {
        // Scrolling Down with mouse
      
        navBarTag.classList.remove("addtopForNavbar");
    } else {
        // Scrolling Up with mouse
        navBarTag.classList.add("addtopForNavbar");
    }
};

// editTag.addEventListener("click",() => {
//     commentTag.classList.add('d-none');
//     commentInputTag.classList.remove('d-none');
// })
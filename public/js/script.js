const navButtonTag1 = document.getElementsByClassName("nav-button")[0];
const navButtonTag2 = document.getElementsByClassName("nav-button")[1];
const allStatusBar = document.getElementById("allStatusBar");
const navBarTag = document.getElementById("Navbar1234");
const leftNavbarTag = document.getElementById("leftNavbar");
const leftNavButtonTag = document.getElementsByClassName("left-nav-button");

//top nav bar , left nav bar , status bar
window.onwheel = (e) => {
    if (e.deltaY >= 0) {
        // Scrolling Down with mouse
        allStatusBar.classList.remove("addtopForAllStatus");
        navBarTag.classList.remove("addtopForNavbar");
        leftNavbarTag.classList.remove("addtopForLeftNavbar");
    } else {
        // Scrolling Up with mouse
        allStatusBar.classList.add("addtopForAllStatus");
        navBarTag.classList.add("addtopForNavbar");
        leftNavbarTag.classList.add("addtopForLeftNavbar");
    }
};

//left nav bar

for (let i = 0; i < leftNavButtonTag.length; i++) {
    leftNavButtonTag[i].addEventListener("click", () => {
        // var el = leftNavButtonTag[0];
        // while(el) {
        //     if(el.tagName === "LI") {
        //         el.classList.remove("left-nav-button-color");
        //     }
        //     el = el.nextSibling;
        // }

        // leftNavButtonTag[i].classList.add("left-nav-button-color");
        // localStorage.setItem("left-nav-button", "active");
        localStorage.setItem("status-button", "all");
    });
}

// let leftNavButtonStatus = localStorage.getItem("lef-nav-button");
// if (leftNavButtonStatus == "active") {
//     console.log("hello world");
//     leftNavButtonTag.classList.add("left-nav-button-color");
// }

//saved , unsaved

const savedTag = document.getElementsByClassName("saved-button");
const unsavedTag = document.getElementsByClassName("unsaved-button");

//status bar
const changeStatusAll = () => {
    navButtonTag1.classList.add("add-color-1");
    navButtonTag2.classList.remove("add-color-2");
};

var url = window.location.href
if(!url.includes("save")) {
    sessionStorage.setItem('status-button','all');
    changeStatusAll();
}


const changeStatusSaved = () => {
    navButtonTag1.classList.remove("add-color-1");
    navButtonTag2.classList.add("add-color-2");
};

const showUnsavedTag = () => {
    unsavedTag.classList.remove("d-none");
    savedTag.classList.add("d-none");
};

const showSavedTag = () => {
    unsavedTag.classList.add("d-none");
    savedTag.classList.remove("d-none");
};

navButtonTag1.addEventListener("click", () => {
    sessionStorage.setItem("status-button", "all");
    changeStatusAll();
});

navButtonTag2.addEventListener("click", () => {
    sessionStorage.setItem("status-button", "saved");
    changeStatusSaved();
});

for (let i = 0; i < savedTag.length; i++) {
    // savedTag[i].addEventListener("click",() => {
    //     localStorage.setItem("saved-unsaved-"+[i],"saved");
    //     unsavedTag[i].classList.remove('d-none');
    //     savedTag[i].classList.add('d-none');
    // })

    // unsavedTag[i].addEventListener("click",() => {
    //     localStorage.setItem("saved-unsaved-"+[i],'unsaved');
    //     unsavedTag[i].classList.add('d-none');
    //     savedTag[i].classList.remove("d-none");
    // })

    let savedUnsaved = sessionStorage.getItem("saved-unsaved-" + [i]);

    if (savedUnsaved == "saved") {
        unsavedTag[i].classList.remove("d-none");
        savedTag[i].classList.add("d-none");
    } else {
        unsavedTag[i].classList.add("d-none");
        savedTag[i].classList.remove("d-none");
    }

    status = sessionStorage.getItem("status-button");
    

    if (status === "all") {
        changeStatusAll();
    }
    if (status === "saved") {
        changeStatusSaved();
        unsavedTag[i].classList.remove("d-none");
        savedTag[i].classList.add("d-none");
    }
}



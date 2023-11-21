let topLine = document.querySelector("#top-line");
let midLine = document.querySelector("#mid-line");
let botLine = document.querySelector("#bot-line");
let burger = document.querySelector("#menu-burger");
let menuWrapper = document.querySelector("nav");
let menu = document.querySelector("#nav-in-wrapper");
let isBurgerActive = false;
let forms = [];
let deg = 0;
forms.push([document.querySelector("#checkScore"), false]);
forms.push([document.querySelector("#addScore"), false]);
forms.push([document.querySelector("#loginUser"), false]);

let refresh = document.querySelector("#refresh");
let img = document.querySelector("#refreshImg");

if (img != undefined) {
    refresh.addEventListener("click", e => {
        setInterval(rotate, 10);
    })
} 

function rotate() {
    deg = deg + 5;
    console.log(deg)
    img.style.transform = "rotate(" + deg + "deg)";
}

burger.addEventListener("click", e => {
    if (isBurgerActive) {
        menuWrapper.setAttribute("class", "none flex col jus-con-cent ali-ite-cent width-100");
        menu.setAttribute("class", "flex col2 jus-con-cent ali-ite-cent width-25 height-100");
        topLine.setAttribute("class", "line");
        midLine.setAttribute("class", "line");
        botLine.setAttribute("class", "line");
        isBurgerActive = false;
    }
    else {
        menuWrapper.setAttribute("class", "flex visi col jus-con-cent ali-ite-cent width-100");
        menu.setAttribute("class", "flex col2 jus-con-cent ali-ite-cent width-25 height-100");
        topLine.setAttribute("class", "top-skew line");
        midLine.setAttribute("class", "mid-vanish line");
        botLine.setAttribute("class", "bot-skew line");
        isBurgerActive = true;
    }
})

function showForm(id) {
    if (!forms[id][1]) {
        forms[id][0].setAttribute("class", "formActive");
        forms[id][1] = true;
        for (let i = 0; i < forms.length; i++){
            if (i != id) {
                forms[i][1] = true;
                showForm(i);
            }
        }
    }
    else {
        forms[id][0].setAttribute("class", "formInactive");
        forms[id][1] = false;
    }
}

function forceLower(strInput){
    strInput.value=strInput.value.toLowerCase();
}

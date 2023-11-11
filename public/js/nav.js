
const firstPage = "http://picerija-misko/";
const homePage = "http://picerija-misko/index.php";

page = window.location.href == firstPage ? page = homePage : page = window.location.href;

const loginPage = "http://picerija-misko/index.php?page=login";

const nav = document.querySelectorAll("ul li a").
forEach(link => {
    console.log(link);
    if (link.href == page && link.href != loginPage) {
        link.classList.add("active");
    } 
})
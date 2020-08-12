/* SIDE NAVIGATION
------------------------------------------------------------------------------------*/

function side_open() {
    document.getElementById("page").style.marginLeft = "15%";
    document.getElementById("mySidebar").style.width = "15%";
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("openNav").style.display = "inline-block";
}

function side_close() {
    document.getElementById("page").style.marginLeft = "0%";
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("openNav").style.display = "inline-block";
}

/* TABS
------------------------------------------------------------------------------------*/

function openTab(evt, tabName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("tab");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tab-border-blue", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.firstElementChild.className += " tab-border-blue";
}
function openTab(event, tabName, idtab) {
    var i, tabContent, tabButtons;
    tabContent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }

    tabButtons = document.getElementsByClassName("tab-btn");
    for (i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove("active");
    }
    $('#btntab' + idtab).css('background-color', 'white');
    $('#btntab' + idtab).css('color', 'black');

    if (idtab == 1) {
        $('#btntab2').css('background-color', '#aeaead9c');
        $('#btntab2').css('color', 'white');
        $('#btntab3').css('background-color', '#aeaead9c');
        $('#btntab3').css('color', 'white');
    }

    if (idtab == 2) {
        $('#btntab1').css('background-color', '#aeaead9c');
        $('#btntab1').css('color', 'white');
        $('#btntab3').css('background-color', '#aeaead9c');
        $('#btntab3').css('color', 'white');
    }

    if (idtab == 3) {
        $('#btntab1').css('background-color', '#aeaead9c');
        $('#btntab1').css('color', 'white');
        $('#btntab2').css('background-color', '#aeaead9c');
        $('#btntab2').css('color', 'white');
    }



    document.getElementById(tabName).style.display = "block";
    event.currentTarget.classList.add("active");
}
function selectTab(tabIndex) {
    document.getElementById("tab1Content").style.display = "none";
    document.getElementById("tab2Content").style.display = "none";
    document.getElementById("tab3Content").style.display = "none";
    document.getElementById("tab4Content").style.display = "none";
    document.getElementById("tab" + tabIndex + "Content").style.display =
        "flex";
}
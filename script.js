function getCellValues(element){
    var table = document.getElementById("StokBarang");
    var r = element.parentNode.parentNode.rowIndex;
    var id = table.rows[r].cells[0].innerText;
    var harga = table.rows[r].cells[3].innerText;
    document.getElementById("updateID").value = id;
    document.getElementById("updateHarga").value = harga;
}
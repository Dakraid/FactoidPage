var request = $.ajax({
    url: "genNew.php",
    type: 'GET',
    success: function (data) {
        document.getElementById("text").innerHTML = data;
        formatTable();
    }
});


function formatTable() {
    $("#factTable").tablesorter({
        theme: 'metro-dark',
        sortList: [[0, 0]],
        sortForce: [[0, 0]],
        fixedHeight: true,
        fixedWidth: true,
        widgets: ['zebra', 'columns', 'filter']
    });

    $("#factTable").tablesorterPager({
        container: $(".pager"),
        fixedHeight: true,
        fixedWidth: true,
        size: 20,
        output: '{startRow} to {endRow} ({totalRows})'
    });

    var autolinker = new Autolinker([{
        newWindow: true,
        stripPrefix: false
                }]);

    var array = document.getElementsByClassName("fact");
    var arrayLength = array.length;
    for (i = 0; i < arrayLength; i++) {
        array[i].innerHTML = autolinker.link(array[i].innerHTML);
    };

    var title = document.getElementById("date");
    title.innerHTML = "Currently serving " + arrayLength + " facts!";
}

function clearCache() {
    $.ajax({
        url: "clear.php",
        type: 'GET',
        success: function (data) {
            alert(data);
        }
    });
}

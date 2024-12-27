
$(document).ready(function() {
    $("#address").suggestions({
        token: "731901aad9934085c0b4a470afbe8e181f1595f3",
        type: "ADDRESS",
        count:"3",
        deferRequestBy:"200",
        hint:"Выберите вариант",
        minChars:"1",
        location:{ country_iso_code: "RU" },
        geoLocation: { kladr_id: '1300000000000' }
    });
});

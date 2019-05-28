$(document).ready(function () {
    $("#butSubmit").click(
        function () {
            sendAjaxForm('resultForm', 'contactForm', 'SaveTable.php');
            return false;
        }
    );
});

function sendAjaxForm(resultForm, contactForm, url) {
    var data = JSON.stringify($("#" + contactForm).serializeArray());
    $.ajax({
        url: url, //url страницы (SaveTable.php)
        type: "POST", //метод отправки
        dataType: "json", //формат данных
        data: {json: data},
        success: function (data) { //Данные отправлены успешно
            console.log(data);
            if (data.result == 'ok') {
                $("#" + resultForm).html('Данные успешно отправленны');
                $("#" + contactForm)[0].reset();//Очистка формы
            }
        },
        error: function (data) { // Данные не отправлены
            if (data.responseJSON.result == 'Fail') {
                var error = new Array();
                for (i = 0; i < data.responseJSON.errors.length; i++) {
                    error[i] = Object.values(data.responseJSON.errors[i])+"\n";
                }
                $("#" + resultForm).html(error);
            }
        }
    });
}
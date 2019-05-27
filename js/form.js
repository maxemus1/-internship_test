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
            console.log(data.responseText.error);
            if (data.result == 'Fail') {
                $("#" + resultForm).html('Пустые поля');
                $("#" + resultForm).html(data.errors);
                $("#" + resultForm).html('Данные не отправлены.');
            }
        }
    });
}
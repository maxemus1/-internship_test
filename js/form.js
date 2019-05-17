$(document).ready(function () {
    $("#butSubmit").click(
        function () {
            sendAjaxForm('resultForm', 'contactForm', 'SaveTable.php');
            return false;
        }
    );

});

function sendAjaxForm(resultForm, contactForm, url) {



    $.ajax({
        url: url, //url страницы (SaveTable.php)
        type: "POST", //метод отправки
        dataType: "json", //формат данных
       // data: $("#" + contactForm).serialize(),  // Сеарилизуем объект
        data:{json: JSON.stringify($("#" + contactForm).serializeArray())},
        success: function (response) { //Данные отправлены успешно
            $("#" + resultForm).html('Данные успешно отправленны');
            $("#" + contactForm)[0].reset();//Очистка формы
        },
        error: function (response) { // Данные не отправлены
            $("#" + resultForm).html('Ошибка. Данные не отправлены.');
        }
    });
}


$(document).ready(function() {
    // Функция для получения данных из базы данных
    function getData() {
        $.ajax({
            type: 'GET',
            url: 'path/to/get-data.php', // Замените на путь к серверному скрипту для получения данных
            success: function(response) {
                // Обновляем содержимое страницы полученными данными
                $('#dataContainer').html(response);
            },
            error: function(xhr, status, error) {
                console.log('Ошибка при получении данных: ' + error);
            }
        });
    }

    // Вызываем функцию getData() при загрузке страницы
    getData();

    // Вызываем функцию getData() каждые 5 секунд (можно изменить интервал)
    setInterval(getData, 5000);

    // Обработчик события отправки формы
    $('#orderForm').submit(function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Получаем данные формы
        var formData = $(this).serialize();

        // Отправляем AJAX-запрос
        $.ajax({
            type: 'POST',
            url: 'path/to/save-data.php', // Замените на путь к серверному скрипту для сохранения данных
            data: formData,
            success: function(response) {
                // Если запрос успешен, показываем модальное окно
                showModal('Успешная запись', response);
                // Очищаем поля формы после успешной отправки
                $('#orderForm')[0].reset();
                // Обновляем данные на странице
                getData();
            },
            error: function(xhr, status, error) {
                // Если произошла ошибка, показываем модальное окно с сообщением об ошибке
                showModal('Ошибка', 'Произошла ошибка при отправке формы. Пожалуйста, попробуйте еще раз.');
            }
        });
    });

    // Функция для отображения модального окна
    function showModal(title, message) {
        var modalHtml = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content">' +
                                    '<div class="modal-header">' +
                                        '<h5 class="modal-title" id="myModalLabel">' + title + '</h5>' +
                                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                            '<span aria-hidden="true">&times;</span>' +
                                        '</button>' +
                                    '</div>' +
                                    '<div class="modal-body">' +
                                        message +
                                    '</div>' +
                                    '<div class="modal-footer">' +
                                        '<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>';

        $('body').append(modalHtml);
        $('#myModal').modal('show');
        $('#myModal').on('hidden.bs.modal', function() {
            $(this).remove();
        });
    }
});

<?php

/**
 * Контроллер TodoitemsController
 */

class TodoitemsController extends AdminBase {
    /**
     * Action для добавления Todoitem
     */
    public function actionCreate() {
        // Обработка формы
        if (isset($_POST['submit'])) {
            $options['username'] = strip_tags($_POST['username']); // avoid html tags
            $options['email'] = strip_tags($_POST['email']); // avoid html tags
            $options['todoitem_text'] = strip_tags($_POST['todoitem_text']); // avoid html tags

            // Флаг ошибок в форме
            $errors = false;

            if (!isset($options['username']) || empty($options['username'])) {
                $errors[] = 'Заполните полe имени';
            }

            if (!isset($options['email']) || empty($options['email'])) {
                $errors[] = 'Заполните полe email';
            }

            if (!Todoitem::checkEmail($options['email'])) {
                $errors[] = 'Неправильный формат email';
            }

            if (!isset($options['todoitem_text']) || empty($options['todoitem_text'])) {
                $errors[] = 'Заполните полe текста задачи';
            }

            if ($errors == false) {
                $id = Todoitem::createTodoitem($options);
                if($id) {
                    $_SESSION['success'] = 'Задача успешно добавлена';
                } else {
                    $_SESSION['error_message'] = 'Ошибка сохранения';
                }

                header("Location: /");
            }
        }

        require_once(ROOT . '/views/site/create_todoitem.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать задачу"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной задаче
        $todoitem = Todoitem::getTodoitemById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            $options['todoitem_text'] = strip_tags($_POST['todoitem_text']); //avoid html
            $options['status'] = isset($_POST['status']) ? intval($_POST['status']) : 0;

            // Если текст задачи отредактирован пользователем
            if($options['todoitem_text'] != $todoitem['todoitem_text']) {
                $options['edited_by_admin'] = 1;
            } else {
                $options['edited_by_admin'] = $todoitem['edited_by_admin'];
            }

            if(Todoitem::updateTodoitemById($id, $options)) {
                $_SESSION['success'] = 'Задача успешно изменена';
            }else {
                $_SESSION['error_message'] = 'Ошибка сохранения';
            }
        
            header("Location: /");
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/update_todoitem.php');
        return true;
    }
}
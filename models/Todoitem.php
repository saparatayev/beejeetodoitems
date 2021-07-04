<?php

/**
 * Класс Todoitem - модель для работы с задачами
 */
class Todoitem {

     // Количество отображаемых задач по умолчанию
     const SHOW_BY_DEFAULT = 3;

    /**
     * Возвращает массив задач
     * @return array <p>Массив с задачами</p>
     */
    public static function getAllTodoitems($page = 1, $sort_field, $sort_order) {
        $limit = Todoitem::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT * FROM todoitems 
            ORDER BY '. $sort_field . ' ' . $sort_order 
            . ' LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $todoitemsList = array();
        while ($row = $result->fetch()) {
            $todoitemsList[$i]['id'] = $row['id'];
            $todoitemsList[$i]['username'] = $row['username'];
            $todoitemsList[$i]['email'] = $row['email'];
            $todoitemsList[$i]['todoitem_text'] = $row['todoitem_text'];
            $todoitemsList[$i]['status'] = $row['status'];
            $todoitemsList[$i]['edited_by_admin'] = $row['edited_by_admin'];
            $i++;
        }
        return $todoitemsList;
    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalTodoitems()
    {
        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM todoitems';

        $result = $db->prepare($sql);

        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Добавляет новую задачу
     * @param array $options <p>Массив с информацией о задаче</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createTodoitem($options) {
        $db = Db::getConnection();

        $sql = 'INSERT INTO todoitems '
                . '(username, email, todoitem_text) '
                . 'VALUES '
                . '(:username, :email, :todoitem_text)';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $options['username'], PDO::PARAM_STR);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':todoitem_text', $options['todoitem_text'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    /**
     * Возвращает задачу с указанным id
     * @param integer $id <p>id задачи</p>
     * @return array <p>Массив с информацией о задаче</p>
     */
    public static function getTodoitemById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM todoitems WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * Редактирует задачу с заданным id
     * @param integer $id <p>id задачи</p>
     * @param array $options <p>Массив с информацей о задаче</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateTodoitemById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE todoitems
            SET 
                todoitem_text = :todoitem_text, 
                status = :status, 
                edited_by_admin = :edited_by_admin 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':todoitem_text', $options['todoitem_text'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':edited_by_admin', $options['edited_by_admin'], PDO::PARAM_INT);
        
        return $result->execute();
    }

    /**
     * Проверяет формат email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
}
<?php

/**
 * Контроллер SiteController
 */
class SiteController {
    /**
     * Action для главной страницы
     */
    public function actionIndex($sort_field = 'id', $sort_order = 'asc', $page = 1)
    {
        $successMessage = false;
        $errorMessage= false;
        if(isset($_SESSION['success'])) $successMessage = $_SESSION['success'];
        if(isset($_SESSION['error_message'])) $errorMessage = $_SESSION['error_message'];
        //Unset the useless session variables
        unset($_SESSION['success']);
        unset($_SESSION['error_message']);


        // Список задач
        $todoitems = Todoitem::getAllTodoitems($page, $sort_field, $sort_order);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Todoitem::getTotalTodoitems();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Todoitem::SHOW_BY_DEFAULT, 'page-', $sort_field, $sort_order);

        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}
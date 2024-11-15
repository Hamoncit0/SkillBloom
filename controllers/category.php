<?php

require 'clases/controllers/CategoryController.php';

$categoryController = new CategoryController();

$categoryList = $categoryController->getCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if($action == "ban"){
        $categoryId = $_POST['categoryId'];
        $changed = $categoryController->deleteCategory($categoryId, 'blocked');
        if($changed){

            header("Location: /category");
        }
    }
    else if($action == "edit"){
        $categoryId = $_POST['categoryId'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        $changed = $categoryController->updateCategory($categoryId, $name, $description);
        if($changed){

            header("Location: /category");
        }
    }
    else if($action == "create"){
        $name = $_POST['name'];
        $description = $_POST['description'];

        $created = $categoryController->createCategory($name, $description);
        if($created){

            header("Location: /category");
        }

    }

}

require 'views/category.view.php';
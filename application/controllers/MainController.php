<?php
/* -------------------------------------
MainController

-------------------------------------*/

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    /**
     * Главная страница
     * @POST удаляет данные
     */
    public function indexAction() {
        if (isset($_POST) and isset($_POST['table']))
            $this->model->deleteSomthing();
        else
            $this->view->render('Name');
    }

    /**
     * Страница Животные
     * @POST принимает данные на удаление/добавление записей в таблицу animals
     */
    public function animalsAction() {
        if (isset($_POST) and isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'add':
                    $this->model->addAnimal();
                    break;
                case 'update':
                    $this->model->updateAnimal();
            }
            $this->view->redirect('animals');
        } else {
            $this->view->render('Name', [
                'animals' => $this->model->getAnimals(),
                'types' => $this->model->getAnimals_types()
            ]);
        }

    }


    public function kormAction() {
        if (isset($_POST) and isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'add':
                    $this->model->addKorm();
                    break;
                case 'update':
                    $this->model->updateKorm();
            }
            $this->view->redirect('korm');
        } else {
            $this->view->render('Name', [
                'korms' => $this->model->getKorm(),
                'animals' => $this->model->getAllAnimals()
            ]);
        }
    }
        
    
    public function biletiAction() {
        if (isset($_POST) and isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'add':
                    $this->model->addBileti();
                    break;
            }
            $this->view->redirect('bileti');
        } else {
            $this->view->render('Name', [
                'korms' => $this->model->getBileti(),
                'animals' => $this->model->getSotrudniki()
            ]);
        }
    }

    public function animals_typeAction() {

        if (isset($_POST) and isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'add':
                    $this->model->addAnimalType();
                    break;
                case 'update':
                    $this->model->updateAnimalType();
            }
            $this->view->redirect('animals_type');
        } else {
            $this->view->render('Name', [
                'types' => $this->model->getAnimals_types()
            ]);
        }
    }
        
    
    public function sotrundikiAction() {
        if (isset($_POST) and isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'add':
                    $this->model->addSotrudnik();
                    break;
                case 'update':
                    $this->model->updateSotrudnik();
            }
            $this->view->redirect('sotrundiki');
        } else {
            $this->view->render('Name', [
                'sotrudniki' => $this->model->getSotrudniki(),
                'types' => $this->model->getSotTypes()
            ]);
        }
    }
        
    //e::::d
    
    
    
    
    
    
    
    
        
}
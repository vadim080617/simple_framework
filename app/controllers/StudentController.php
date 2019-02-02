<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 29.01.19
 * Time: 11:40
 */

namespace app\controllers;

use app\core\controller\Controller;
use app\models\Student;


class StudentController extends Controller
{
    public function index() {
        $model = new Student();
        $res = $model->all();
        $this->view->render('Student list', ['students' => $res]);
    }
}
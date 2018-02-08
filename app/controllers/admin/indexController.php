<?php
namespace App\Controllers\Admin;
use App\controllers\BaseController;

class IndexController extends BaseController{
  public function getIndex(){
    return $this-> render('admin/index.twig');
  }
}

 ?>

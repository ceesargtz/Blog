<?php
namespace App\Controllers\Admin;
use App\controllers\BaseController;
 use App\models\User;
class IndexController extends BaseController{
  public function getIndex(){
    if(isset($_SESSION['userId'])){
      $userId =$_SESSION['userId'];
      $user = User::find($userId);
      if($user){
        return $this-> render('admin/index.twig',['user'=>$user]);
      }
    }
   header('location: '.BASE_URL.'auth/login');

  }
}

 ?>

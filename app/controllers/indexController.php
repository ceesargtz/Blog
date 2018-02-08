<?php
 namespace App\Controllers;
use App\models\BlogPosts;
class IndexController extends BaseController{
  public function getIndex(){
      // global $pdo;
      // $query = $pdo ->prepare('select * from blog_posts order by id desc');
      // $query -> execute();
      //
      // $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
      //MODELO
      $blogPosts= BlogPosts::query()->orderBy('id','desc')->get();
      return $this->render('index.twig',['blogPosts'=> $blogPosts]);
  }
}

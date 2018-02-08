<?php
namespace App\controllers\admin;
use App\controllers\BaseController;
use App\models\BlogPosts;
class PostController extends BaseController{
  public function getIndex(){
    //admin/posts or admin/posts/index
    // global $pdo;
    //   $query = $pdo ->prepare('select * from blog_posts order by id desc');
    //   $query -> execute();
    //   $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
    //Model
    $blogPosts = BlogPosts::all();
      return $this ->render('admin/posts.twig',['blogPosts'=>$blogPosts]);
  }
  public function getCreate(){
    //admin/posts/create
      return $this->render('admin/insert-post.twig');
  }
  public function postCreate(){
    $blogPost = new BlogPosts([
      'title'=>$_POST['title'],
      'content'=>$_POST['content']
    ]);
    $result=true;
    $blogPost -> save();

    // global $pdo;
    //   //admin/posts/create
    //   $sql ='insert into blog_posts(title,content) values (:title,:content)';
    //   $query = $pdo ->prepare($sql);
    //   $result = $query->execute([
    //     'title'=>$_POST['title'],
    //     'content'=>$_POST['content']
    //   ]);
    return $this->render('admin/insert-post.twig',['result'=>$result]);
  }
}
 ?>

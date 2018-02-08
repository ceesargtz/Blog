<?php
namespace App\controllers\admin;
use App\controllers\BaseController;
use App\models\BlogPosts;
use Sirius\Validation\Validator;
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
    $errors=[];
    $result=false;
    $validator = new Validator();
    $validator ->add('title','required');
    $validator->add('content','required');
    if ($validator->validate($_POST)) {
      $blogPost = new BlogPosts([
        'title'=>$_POST['title'],
        'content'=>$_POST['content'],
      ]);
      if($_POST['img']){
        $blogPost->img_url = $_POST['img'];
      }
      $result=true;
      $blogPost -> save();
    } else{
      $errors = $validator->getMessages();
    }


    // global $pdo;
    //   //admin/posts/create
    //   $sql ='insert into blog_posts(title,content) values (:title,:content)';
    //   $query = $pdo ->prepare($sql);
    //   $result = $query->execute([
    //     'title'=>$_POST['title'],
    //     'content'=>$_POST['content']
    //   ]);
    return $this->render('admin/insert-post.twig',['result'=>$result,
  'errors'=>$errors]);
  }
}
 ?>

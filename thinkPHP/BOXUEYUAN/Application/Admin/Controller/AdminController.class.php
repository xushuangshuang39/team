<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{
	
	public function password(){
		$this->display();
	}
	public function edit(){
        $adminModel=D("administrator");
        $admin=$adminModel->select();
        $this->assign('administrator',$admin);
        $this->display();
    }
    public function doEdit(){
        // if (IS_POST) {
        //     $model=M("user");
        //     $model=create();
        //     if($model->save()){
        //         $this->success("修改成功", U("lists"));
        //     }
        // }
        if (!IS_POST) {
            exit("bad request请求");
        }
        $adminModel=D("administrator");
        if (!$adminModel->create()) {
            $this->error($adminModel->getError());
        }
        if ($adminModel->add()) {
            $this->success("添加成功",U("all"));
        }else{
            $this->error("添加失败");
        }
       
    }



    public function add(){
    	$this->display();
    }


    public function add_post()
    {
    	echo 'this ';
    }

	public function doAdd(){
 

        if (!IS_POST) {
            exit("bad request请求");
        }
        $adminModel=D("administrator");
        if (!$adminModel->create()) {
            $this->error($adminModel->getError());
        }
        if ($adminModel->add()) {
        	// echo 'this ';

            $this->success("添加成功",U('admin/all'));
        }else{
            $this->error("添加失败");
        }
}




    public function delete(){
        $id = $_GET['administratorId'];
        var_dump($id);
        if(is_array($id)){
            foreach($id as $value){
                M("administrator")->delete($value);

            }  
            $this->success("删除成功！");
        } 
     else{
            if(M("administrator")->delete($id)){
                $this->success("删除成功！",U("Admin/admin/all"));
            }else{
                $this->error("删除失败！");
            }
        }      
    }




  public function pass(){
        $adminModel=D("administrator");
        $admin=$adminModel->select();
        $this->assign('administrator',$admin);
        $this->display();
    }
    public function doPass(){
        if (!IS_POST) {
            exit("bad request请求");
        }
        $adminModel=D("administrator");
        if (!$adminModel->create()) {
            $this->error($adminModel->getError());
        }
        if ($adminModel->add()) {
            $this->success("添加成功",U('admin/all'));
        }else{
            $this->error("添加失败");
        }
    }

  public function all(){
        $adminModle = D("administrator");
        $count = $adminModle->count();
        $pagecount = 3;
        $page = new \Think\Page($count , $pagecount);
        $page->parameter = $row; //此处的row是数组，为了传递查询条件
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% 第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $administrator = $adminModle->order('gid asc')->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('administrator',$administrator);
        $this->assign('page',$show);
        $this->display();       
    }


// $this->display();
	
	// public function login(){
	// 	if (IS_POST) {
	// 		$adminUserModel=M('administrator');
	// 		//$adminUserModle=M('admin_user');
	// 		//前面的两条语句是一个意思，在M函数里，省略_第二个首字母大写来代替它原始的
	// 		$condition=array(
	// 			'username' => I("post.username"),
	// 			'password' => I("post.password")
	// 			);
	// 		$result=$adminUserModel->where($condition)->count();
	// 		if ($result>0) {
	// 			session("username",I("post.username"));
	// 			$this->success("登录成功",U("Index/index"));
	// 		}
	// 		else{
	// 			$this->error("用户名或密码不正确");
	// 		}
	// 	}
	// 	else{
	// 		$this->display();
	// 	}
	// }
	   //   public function delete(){
    //     $id = $_GET['administratorId'];
    //     if(is_array($id)){
    //         foreach($id as $value){
    //             M("administrator")->delete($value);
    //         }  
    //         $this->success("删除成功！");
    //     } 
    //     else{
    //         if(M("administrator")->delete($id)){
    //             $this->success("删除成功！");
    //         }
    //     }       
    // }

	// public function __construct(){
 //    	parent::__construct();
 //    	if (!isLogin()) {
 //    		$this->error("请先登录",U("Admin/login"));
 //    	}
 //    }
 //    public function add(){
 //        $this->display();
 //    }
 //    public function doAdd(){
 //        if (!IS_POST) {
 //            exit("bad request请求");
 //        }
 //        $userModel=D("user");
 //        if (!$userModel->create()) {
 //            $this->error($userModel->getError());
 //        }
 //        if ($userModel->add()) {
 //            $this->success("添加成功",U("lists"));
 //        }else{
 //            $this->error("添加失败");
 //        }
 //    }
 //    public function lists(){
 //        $userModel=D("user");
 //        $user=$userModel->select();
 //        $this->assign('user',$user);
 //        $this->display();
 //    }
 //    public function edit(){
 //        $userModel=D("user");
 //        $user=$userModel->select();
 //        $this->assign('user',$user);
 //        $this->display();
 //    }
 //    public function doEdit(){
 //        // if (!IS_POST) {
 //        //     exit("bad request请求");
 //        // }
 //        if (IS_POST) {
 //            $model=M("user");
 //            $model=create();
 //            if($model->save()){
 //                $this->success("修改成功", U("lists"));
 //            }
 //        } 
 //        else {
 //            $id = isset($_GET['id']) ? intval($_GET['id']) : '';
 //            if ($id == '') {
 //                exit("bad param!");
 //            }
 //            $categorys = M("NewsCategory")->select(); 
 //            $news = M("NewsArticle")->find($id);
 //            $this->assign("categorys", $categorys);
 //            $this->assign("news", $news);
 //            $this->display();
 //        }
 //        public function pass(){
 //        $userModel=D("user");
 //        $user=$userModel->select();
 //        $this->assign('user',$user);
 //        $this->display();
 //    }
 //    public function doPass(){
 //        if (!IS_POST) {
 //            exit("bad request请求");
 //        }
 //        $userModel=D("user");
 //        if (!$userModel->create()) {
 //            $this->error($userModel->getError());
 //        }
 //        if ($userModel->add()) {
 //            $this->success("添加成功",U("lists"));
 //        }else{
 //            $this->error("添加失败");
 //        }
 //    }
    

}

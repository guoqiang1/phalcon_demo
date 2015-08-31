<?php
/*
*ͨ通讯录
*@author guoqiang
*2015/08/31
*/
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Resultset;

class PhonebookController extends \Phalcon\MVC\Controller{
    
    function indexAction(){

    }
    
    /*
    *添加数据
    *@author guoqiang
    *2015/08/31
    *@params array
    *@return mixed
    */
    function addAction(){
        $phone = new Phonebook();

        // 添加数据
        $success = $phone->save($this->request->getPost(), array('name', 'phone'));

        if ($success) {
            echo json_encode(array(
		'resultCode'=>1
	    ));
        } else {
            foreach ($phone->getMessages() as $message) {
		echo json_encode(array(
		    'resultCode'=>2,
		    'resultMsg'=>$message->getMessage()
		));
            }
        }

        $this->view->disable();
    }
    
    
    /*
     * 获取列表
     * @author guoqiang
     * 2015/08/31
     * @retun mixed
     */
    function  listAction(){
	//页数
	$page= (isset($_POST['page'])&&(intval($_POST['page'])>0))?intval($_POST['page']):1;
	//每页记录数
	$pageSize=(isset($_POST['pageSize']) && (intval($_POST['pageSize'])>0))?intval($_POST['pageSize']):10;

	$phone=new Phonebook();
	
	$res=$phone->find(array(
	    'order'=>'id desc',
	    'limit'=>array(
		'offset'=>($page-1)*$pageSize,
		'number'=>$pageSize
	    )
	));

	$res->setHydrateMode(Resultset::HYDRATE_ARRAYS);
	$list=array();
	foreach ($res as $value) {
	    $temp=array();
	    $temp['id']=$value['id'];
	    $temp['name']=$value['name'];
	    $temp['phone']=$value['phone'];
	    $list[]=$temp;
	}

	$count=$phone->count();
	$pages=  ceil($count/$pageSize);
	
	echo json_encode(array(
	    'page'=>$page,
	    'pages'=>$pages,
	    'list'=>$list
	));
	exit;
    }
}
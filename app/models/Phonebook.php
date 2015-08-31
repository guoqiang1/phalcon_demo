<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Regex as RegexValidator;

class Phonebook extends Model
{
    public $id;

    public $name;

    public $phone;
    
    public $addtime;
    
    /*
     * 插入前操作
     * @author guoqiang
     * 2015/08/31
     */
    public function beforeSave() {
	$this->addtime=  time();
    }
    
    /*
     * 数据校验
     * @author guoqiang
     * 2015/08/31
     */
    public function validation(){
      $this->validate(new RegexValidator(array(
          "field" => 'phone',
          'pattern' => '/^1[34578]{1}[0-9]{11}$/',
	  'message'=>'手机号码格式不正确'
      )));
      if ($this->validationHasFailed() == true) {
          return false;
      }
    }
}


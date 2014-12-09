<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  //Sessionコンポーネントを使うよ
  public $components = array(
    'Session',
    'Auth' => array( //ログイン機能を利用する
      'authenticate' => array(
        'Form' => array(
          'userModel' => 'User',
          'fields' => array('username' => 'mail','password' => 'pass')
        )
      ),
      //ログイン後の移動先
      'loginRedirect' => array('controller' => 'events', 'action' => 'index'),
      //ログアウト後の移動先
      //    'logoutRedirect' => array('controller' => 'new_boards', 'action' => 'login'),
      //ログインページのパス
      'loginAction' => array('controller' => 'users', 'action' => 'index'),
      //未ログイン時のメッセージ
      'authError' => 'あなたのお名前とパスワードを入力して下さい。',
    )


  );

  public function beforeFilter(){
  //$this->set('users',$this->Auth->user()); //ctpで$userを使えるように。ユーザー情報を渡してあげる。けどうまくいかない。
  }




}

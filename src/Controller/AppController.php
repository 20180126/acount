<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        // loadComponentしたら$this->???で利用できる
        $this->loadComponent('RequestHandler'); // Request
        $this->loadComponent('Flash'); // HTMLコンポーネント
        // 認証コンポーネント、入力された値がデータベースのカラムと一致する場合
        // Sessionに値をidとusername(Auth独自定義、この定義にあわせてテーブル設計を行う)をつける
        // Auth->user()で簡単にログイン状態を確認できる
        // ログイン状態の確認,Validererやハッシュ化などを簡単に行える
        $this->loadComponent('Auth', [
            'authenticate' => [
                // HTMLから飛んできたname
                'Form' => [
                    'fields' => [
                    // 左に入れる定義名、左にHTMLのname名
                    'username' => 'email',
                    'password' => 'password'
                    ]
                ]
            ],
            // 認証関数
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // 認証後のリダイレクト先
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index'
            ],
            // ログアウトが呼ばれた時のリダイレクト先
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ]
        ]);
        // Authでログインを処理する画面を許可しないと認証が通らない
        // 認証前、認証に関わる部分と認証後のコンテンツの区別をつけよう
        // またログインが完了した場合には、すべてのコンテンツの出入りできる
        $this->Auth->allow('add');
        $this->Auth->allow('index');
        $this->Auth->allow('display');
        $this->Auth->allow('view');
        // 使用するレイアウトを選択
        
        // $this->viewBuilder()->layout('index');
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
    }
}


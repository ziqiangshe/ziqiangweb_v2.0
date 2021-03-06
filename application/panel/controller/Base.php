<?php
/**
 * Created by PhpStorm.
 * User: XZFFF
 * Date: 2017/7/18
 * Time: 0:44
 */
namespace app\panel\controller;

use think\Controller;
use Firebase\JWT\JWT;
use think\Db;
use think\Request;
use think\Session;

class Base extends Controller
{
    public $menu = array(
        array(
            'c' => 'home',
            'a' => 'index',
            'title' => '控制台',
            'icon' => 'dashboard',
            'child' => array()
        ),
        array(
            'c' => '',
            'a' => 'index',
            'title' => '博客内容',
            'icon' => '',
            'child' => array(
                array(
                    'c' => 'blog',
                    'a' => 'add',
                    'title' => '添加博客'
                ),
                array(
                    'c' => 'blog',
                    'a' => 'index',
                    'title' => '博客池'
                ),
            )
        ),
        array(
            'c' => 'activity',
            'a' => 'index',
            'title' => '活动入口',
            'icon' => '',
            'child' => array(
                array(
                    'c' => 'activity',
                    'a' => 'books',
                    'title' => '旧书圆新梦'
                ),
                array(
                    'c' => 'activity',
                    'a' => 'newspaper',
                    'title' => '义务卖报'
                ),
            )
        ),
        array(
            'c' => 'sign',
            'a' => 'index',
            'title' => '报名信息',
            'icon' => '',
            'child' => array(
                array(
                    'c' => 'sign',
                    'a' => 'index?id=1',
                    'title' => '服务队'
                ),
                array(
                    'c' => 'sign',
                    'a' => 'index?id=2',
                    'title' => '外联部'
                ),
                array(
                    'c' => 'sign',
                    'a' => 'index?id=3',
                    'title' => '宣传部'
                ),
                array(
                    'c' => 'sign',
                    'a' => 'index?id=4',
                    'title' => '办公室'
                ),
                array(
                    'c' => 'sign',
                    'a' => 'index?id=5',
                    'title' => '策划部'
                ),
            )
        ),
        array(
            'c' => 'character',
            'a' => 'index',
            'title' => '自强人物',
            'icon' => '',
            'child' => array(
                array(
                    'c' => 'character',
                    'a' => 'editword',
                    'title' => '我的寄语'
                ),
                array(
                    'c' => 'character',
                    'a' => 'manage',
                    'title' => '人物管理'
                ),
            )
        ),
        array(
            'c' => 'user',
            'a' => 'index',
            'title' => '用户管理',
            'icon' => '',
            'child' => array(
                array(
                    'c' => 'user',
                    'a' => 'mine',
                    'title' => '个人信息'
                ),
                array(
                    'c' => 'user',
                    'a' => 'ziqiang',
                    'title' => '用户列表'
                ),
            )
        ),
    );


    protected function _initialize()
    {
        if (!Session::has('panel_user')) {
            $this->redirect('login/index');
        }
        $this->assign('realname', empty(Session::get('panel_user.realname'))?'匿名':Session::get('panel_user.realname'));
        $this->assign('menu', $this->menu);
    }

    
}
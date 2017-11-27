<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * 用户的添加页面显示
     */
    public function add()
    {
        return view('admin.user.add');
    }

    /**
     * 用户的插入动作
     */
    public function insert(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'username' => 'required|regex:/\w{8,20}/',
            'email' => 'required|email',
            'password' => 'same:repassword'
        ],[
            'username.required' => '用户名不能省略',
            'username.regex'=>'用户名规则不正确 请填写8~20位字母数字下划线',
            'email.required' => '邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'password.same' => '两次密码不一致'
        ]);

        //数据的插入
        $user = new User;
        $user -> username = $request->input('username');
        $user -> email = $request->input('email');
        $user -> password = Hash::make($request->input('password'));
        $user -> intro = $request->input('intro');
        //随机字符串标识
        $user -> rememberToken = str_random(50);
        //处理图片上传
        
        if ($request->hasFile('profile')) {
            //文件的存放目录
            $path = './Uploads/'.date('Ymd');
            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();
            //文件的名称
            $fileName = time().rand(100000, 999999).'.'.$suffix;
            $request->file('profile')->move($path, $fileName);
            $user -> profile = trim($path.'/'.$fileName,'.');
        }
        //执行插入
        if($user->save()) {
            return redirect('/user/index')->with('info', '添加成功');
        }else{
            return back()->with('info', '添加失败');
        }
    }

    /**
     * 用户的列表显示
     */
    public function index(Request $request)
    {
        //1 每页显示的数量 调整
        //2 检索的条件
        $users = User::orderBy('id','desc')
                ->where(function($query) use ($request){
                    //获取关键字
                    $keyword = $request->input('keyword');
                    //检测参数
                    if(!empty($keyword)) {
                        $query->where('username','like','%'.$keyword.'%');
                    }
                })
                ->paginate($request->input('num', 10));

        //分配变量 解析模板
        return view('admin.user.index', ['users'=>$users,'request'=>$request]);// assign('users', $users); $this->display('index');
    }

    /**
     * 用户的修改
     */
    public function edit($id)
    {
        //读取用户的信息
        $user = User::findOrFail($id);

        //展现用户的信息
        return view('admin.user.edit', ['user'=>$user]);
    }

    /**
     * 用户的更新操作
     */
    public function update(Request $request)
    {
        //读取用户的模型
        $user = User::findOrFail($request->input('id'));
        $user -> username = $request->input('username');
        $user -> email = $request->input('email');
        $user -> intro = $request->input('intro');

        if ($request->hasFile('profile')) {
            //文件的存放目录
            $path = './Uploads/'.date('Ymd');
            //获取后缀
            $suffix = $request->file('profile')->getClientOriginalExtension();
            //文件的名称
            $fileName = time().rand(100000, 999999).'.'.$suffix;
            $request->file('profile')->move($path, $fileName);
            $user -> profile = trim($path.'/'.$fileName,'.');
        }
        if($user->save()) {
            return redirect('/user/index')->with('info','更新成功');
        }else{
            return back()->with('info','更新失败');
        }
    }

    /**
     * 删除操作
     */
    public function delete($id)
    {
        //创建模型
        $user = User::findOrFail($id);
        //读取用户的头像信息
        $profile = $user->profile;
        $path = '.'.$profile;
        if(file_exists($path)) {
            unlink($path);
        }
        //删除
        if($user->delete()) {
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }

}

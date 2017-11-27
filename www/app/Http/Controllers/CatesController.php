<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cate;
use DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cates=self::getCates();
        return view('admin.cate.index',['cates'=>$cates,'request'=>$request]);
    }
    public static function getCates(){
        $cates=Cate::select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        foreach($cates as $key => $value){
            $tmp=count(explode(',',$value->path))-1;

            $prefix=str_repeat('|----',$tmp);
            $value->name=$prefix.$value->name;
            if($value->pid==0){
                $value->pid='顶级分类';
            }else{
                $value->pid=$value->name;
            }

        }
        return $cates;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cates=Cate::get();



        return view('admin.cate.add',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        if ($data['pid']==0){
            $data['path']='0';
        }else{
            $info=Cate::find($data['pid']);
            $data['path']=$info->path .','.$info->id;
        }
        $cate=new Cate();
        $cate->name=$data['name'];
        $cate->pid=$data['pid'];
        $cate->path=$data['path'];
        if($cate->save()){
            return redirect('/cate')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info=Cate::findOrFail($id);
        $cates=Cate::get();

        return view('admin.cate.edit',['info'=>$info,'cates'=>$cates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cates=Cate::findOrFail($id);
        $cates->name=$request->name;
        $cates->pid=$request->pid;
        if ($cates->save()){
            return redirect('/cate')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cates=Cate::findOrFail($id);
        //删除子集分类
        $path=$cates->path.','.$cates->id;
        DB::table('cates')->where('path','like',$path.'%')->delete();
        if ($cates->delete()){
            return back()->with('info','删除成功');
        }else{
            return back()->with('info','删除失败');
        }
    }
}

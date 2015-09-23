<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;  
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Page;

use Redirect, Input, Auth;

class PagesController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    //对应创建一个新的内容，方法是get路由是/create
    public function create()
    {
         echo 'ddd';//测试是否能成功转向此控制器
        return view('admin.pages.create');//为何不能找到views文件夹下级文件夹下的视图

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    //对应post方法，路由是/pages
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:pages|max:255',
            'body' => 'required',
        ]);

        $page = new Page;
        $page->title = Input::get('title');
        $page->body = Input::get('body');
        $page->user_id = 1;//Auth::user()->id;

        if ($page->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.pages.edit')->withPage(Page::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required|unique:pages,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        $page = Page::find($id);
        $page->title = Input::get('title');
        $page->body = Input::get('body');
        $page->user_id = 1;//Auth::user()->id;

        if ($page->save()) {
            return Redirect::to('admin');
        } else {
            return Redirect::back()->withInput()->withErrors('保存失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        return Redirect::to('admin');
    }

}
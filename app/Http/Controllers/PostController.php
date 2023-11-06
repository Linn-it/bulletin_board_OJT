<?php

namespace App\Http\Controllers;

use App\Exports\postExport;
use App\Imports\postImport;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    public function showPost()
    {
        return view('post.posts', [
            'posts' => Post::where('status', 1)->latest()->filter(request('search'))->paginate(3)
        ]);
    }

    public function showOwnPost()
    {
        return view('post.posts', [
            'posts' => Post::where('created_user_id', auth()->user()->id)->latest()->filter(request('search'))->paginate(3)
        ]);
    }

    public function createPage()
    {
        return view('post.create');
    }

    public function createConfirmPage(Request $request)
    {
        $inputField = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => ['required']
        ]);

        return view('post.create-confirm', [
            'post' => $inputField
        ]);
    }

    public function create(Request $request)
    {
        $inputField = $request->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'description' => ['required']
        ]);

        $inputField['created_user_id'] = Auth::user()->id;
        $inputField['updated_user_id'] = Auth::user()->id;

        Post::create($inputField);
        return redirect('/posts')->with('message', 'Post Created Successfully!');
    }

    public function editPage(Post $id)
    {
        return view('post/edit', [
            'post' => $id
        ]);
    }

    public function editConfirmPage(Request $request, Post $id)
    {
        $inputField = $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $inputField['status'] = $request['status'] === 'on' ? 1 : 0;

        return view('post.edit-confirm', [
            'post' => $inputField,
            'postId' => $id
        ]);
    }

    public function postUpdate(Request $request, Post $id)
    {
        $inputField = $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $inputField['status'] = $request['status'] === 'on'  ? 1 : 0;

        $id->update($inputField);
        return redirect('/posts')->with('message', 'Post Updated Successfully!');
    }

    public function postDetailPage(Post $id)
    {
        return view('post.detail', [
            'post' => $id
        ]);
    }

    public function destroy(Post $id)
    {
        $id->delete();
        return redirect('/posts')->with('message', 'Post Deleted Successfully!');
    }

    public function getPostData(Request $request)
    {
        $filter = $request->input('search');
        $export = new postExport($filter);
        return Excel::download($export, 'posts.xlsx');
    }

    public function showImport()
    {
        return view('post.importUpload');
    }

    public function importExcel(Request $request)
    {
        $inputField = $request->validate([
            'fileUpload' => ['required', 'file', 'mimes : csv,xlsx']
        ]);

        Excel::import(new postImport, $request->file('fileUpload'));
        return redirect('/posts');
    }
}

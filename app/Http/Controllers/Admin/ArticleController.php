<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticteRequest;
use App\Http\Requests\UpdateArticteRequest;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $articles = Article::latest()->get();

            return DataTables::of($articles)
                ->addIndexColumn()
                ->addColumn('category_id', function ($articles) {
                    return $articles->category->name;
                })
                ->addColumn('status', function ($articles) {
                    if ($articles->status == 1) {
                        return '<span class="badge badge-success">Published</span>';
                    } else {
                        return '<span class="badge badge-danger">Draft</span>';
                    }
                })
                ->addColumn('action', function ($articles) {
                    return '
                    <th>
                        <a href="article/' . $articles->id . '" class="btn btn-sm btn-primary"><i class="fas fa-fw fa-eye"></i></a>
                        <a href="article/' . $articles->id . '/edit" class="btn btn-sm btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                        <a href="#" onclick="deleteData(this)" data-id="' . $articles->id . '" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                    </th>';
                })
                ->rawColumns(['category_id', 'status', 'action'])
                ->make();
        }
        return view('admin.article.index', [
            'page_title' => 'Article',
        ]);
    }

    public function create()
    {
        return view('admin.article.create', [
            'categories' => Category::get(),
            'page_title' => 'Create Article',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $file = $request->file('img'); // get file
        $filename = uniqid() . '.' . $file->getClientOriginalExtension(); // generate filename randomnes and extension
        $file->move(storage_path('app/public/article'), $filename); // path file

        $data['img'] = $filename;
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);
        $data['views'] = 0;

        Article::create($data);

        return redirect()->route('article.index')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.article.show', [
            'page_title' => 'Show Article',
            'article' => Article::with('user', 'category')->find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.article.edit', [
            'page_title' => 'Edit Article',
            'article' => Article::find($id),
            'categories' => Category::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticteRequest $request, string $id)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {
            $file = $request->file('img'); // get file
            $filename = uniqid() . '.' . $file->getClientOriginalExtension(); // generate filename randomnes and extension
            $file->move(storage_path('app/public/article'), $filename); // path file

            // delete old file
            unlink(storage_path('app/public/article/' . $data['old_img']));

            $data['img'] = $filename;
        } else {
            $data['img'] = $data['old_img'];
        }

        $data['slug'] = Str::slug($data['title']);

        Article::find($id)->update($data);

        return redirect()->route('article.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        unlink(storage_path('app/public/article/' . $article->img));
        $article->delete();

        return response()->json([
            'message' => 'Data deleted successfully',
        ]);
    }
}

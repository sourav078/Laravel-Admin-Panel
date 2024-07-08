<?php

namespace App\Http\Controllers;

use App\Models\Backend\Blog;
use App\Repositories\BlogInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public $user;
    protected $blogRepository;
    public function __construct(BlogInterface $blogRepositoryObj)
    {
//        $this->middleware(function ($request, $next) {
//            $this->user = Auth::user();
//            /**
//             * profile image data
//             */
//            $userProfileImage = \App\Models\Backend\UsersMediaModel::where('user_id', Auth::user()->id)->first();
//            if ($userProfileImage) {
//                \Illuminate\Support\Facades\View::share('profileImage', $userProfileImage->profile_image);
//            }
//            /**
//             * end profile image data
//             */
//            return $next($request);
//        });
        $this->blogRepository = $blogRepositoryObj;
    }

//        if (is_null($this->user) || !$this->user->hasPermissionTo('blog.list', 'web')) {
//            abort(403, 'Sorry !! You are Unauthorized to view blog lists page!');
//        }
    public function index()
    {
        $blogs = $this->blogRepository->all();
        return view('backend.pages.blogs.index', compact('blogs'));
    }



    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.blogs.create_blog');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $this->blogRepository->store($request);
        return redirect()->route('blog.index')->with('success', 'Blog item added successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.pages.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->blogRepository->update($request,$id);
        return redirect()->route('blog.index')->with('success', 'Blog item updated successfully.');
    }

    public function destroy($id)
    {
        $this->blogRepository->delete($id);
        return redirect()->route('blog.index')->with('success', 'Blog item deleted successfully.');
    }

    //api functions

    public function apiindex()
    {
        $blogs = Blog::all();
        // Modify each blog item to include the full image URL
        $blogs->transform(function ($blog) {
            $blog->image = asset('storage/' . $blog->image);
            return $blog;
        });
        return response()->json($blogs);
    }
}


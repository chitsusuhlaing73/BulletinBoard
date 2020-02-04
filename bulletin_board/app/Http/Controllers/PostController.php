<?php

namespace App\Http\Controllers;
use App\Contracts\Services\Post\PostServiceInterface;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostConfirmRequest;
use Illuminate\Support\Facades\DB;
use App\Services\Post\PostService;
use App\Models\Post;
use App\Models\Users;
use App\Exports\Download;
use App\Imports\CSVFiles;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{

    private $postService;

    /**
     * Create a new controller instance.
     *
     * @param postServiceInterface $postService
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }
    
    /**
     * Show Post Create Form
     *
     * @return void
     */
    protected function index()
    {  
        return view('post.post');
    }

    /**
     * post create confirm Function
     *
     * @param Request $request
     * @return void
     */
    public function confirm(PostConfirmRequest $request) 
    {
        $validator = $request->validated();
        $post = $this->postService->confirm($request);
        return view('post.postconfirm', compact('post'));
    }

    /**
     * post Store Function
     *
     * @param Request $request
     * @return void
     */
    public function store (Request $request) 
    {
        $post = $this->postService->store($request);
        return redirect('postlist');
    }

    /**
     * show postlist Function
     *
     * @return void
     */
    function show() 
    {
        $data = Post::with('users')->paginate(10);
        return view('post.postlist', compact('data'));
    }

    /**
     * show post update Function
     * 
     * @param integer $id
     * @return void
     */
    public function postupdate($id)
    {
        $post = Post::find($id);
        return view('/post.postupdate',[ 'post' => $post ]);
    }

    /**
     * post update confirm Function
     *
     * @param Request $request
     * @return void
     */
    public function updateconfirm(PostConfirmRequest $request) 
    {
        $validator = $request->validated();
        $post = new Post();
        $post = Post::find($request->input('id'));
        $post -> title = $request->input('title');
        $post -> description = $request->input('description');
        $post -> status = $request->input('status');
        return view('post.updateconfirm', [ 'post' => $post ]);
    }

    /**
     * update post Function
     *
     * @param Request $request
     * @return void
     */
    public function update (Request $request) 
    {
        if($request->get('status') == null){
            $status = 0;
        } else {
        $status = request('status');
        }
        $post = new Post();
        $post = Post::find($request->input('id'));
        $post -> title = $request->input('title');
        $post -> description = $request->input('description');
        $post -> status = $status;
        $post -> create_user_id = Auth::user()->id;
        $post -> updated_user_id =Auth::user()->id;
        $post -> created_at = now();
        $post -> updated_at = now();
        $post -> save();
        return redirect('postlist');
    }

    /**
     * soft delete Function
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id) 
    {
        $del = Post::find($id);

        $del -> delete();

        return redirect()->back();

    }
    
    /**
     * search post Function
     *
     * @param Request $request
     * @return void
     */
    public function search (Request $request) 
    {
        $search = $request -> get('search');
        $data = Post::with('users')
        ->where ('title', 'LIKE', '%' . $search . '%' )
        ->orWhere ('description', 'LIKE', '%' . $search . '%' )
        ->orWhereHas('users', function($query) use ($search){

            $query->where('name', 'like', '%'. $search. '%');

        })
        ->orderBy('id','DESC')
        -> paginate(5);
        return view('post.postlist', ['data' => $data]);
    }

    /**
     * download by excel format Function
     *
     * @param Request $request
     * @return void
     */
    public function download (Request $request) 
    {
        return Excel::download(new Download , 'post.xlsx');
    }

    /**
     * show upload form Function
     *
     * @return void
     */
    public function postupload () 
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('post.postupload',compact('posts'));
    }

    /**
     * upload file Function
     *
     * @param Request $request
     * @return void
     */
    public function uploadFile(Request $request)
    {
        $request -> validate([
            'import_file' => 'required|max:10240'
        ]);
        Excel::import(new CSVFiles , request() -> file ('import_file'));
        return redirect('postlist');
    }
    

    
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticle;
use App\Models\Article;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleModel;

    public function __construct(Article $articleModel)
    {
        $this->articleModel = $articleModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.pages.article.list', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticle $request)
    {
        // $article = Article::create();
        // $check = Article::insert();

        $this->articleModel->addArticle($request);

        return redirect()->route('admin.articles')->with('message', 'ADDED');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);
        return response()->json(['title' => $slug]);
    }

    // public function generate(Request $request)
    // {
    //     if (is_null($request->title)) {
    //         return;
    //     }

    //     $title = $request->title;

    //     $client = \OpenAI::client(config('app.openai_api_key'));

    //     $result = $client->completion()->create([
    //         'model' => 'text-davinci-003',
    //         'temperature' => 0.7,
    //         'top_p' => 1,
    //         'frequency_penalty' => 0,
    //         'presence_penalty' => 0,
    //         'max_tokens' => 600,
    //         'prompt' => sprintf('Write article about: %s', $title),
    //     ]);

    //     $content = trim($result['choices'][0]['text']);
    //     return response()->json(['content' => $content]);
    // }
}

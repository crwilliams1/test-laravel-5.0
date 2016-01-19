<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\HttpResponse;
use App\Article;
use Resources\Views\Articles\index;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ArticlesController extends Controller {

/**
* Show all articles
*
* @return Response
*/

//homestead.app/articles
	public function index(){

		$articles = Article::latest('published_at')->published()->get();

		return view('articles.index', compact('articles'));

	}

//homestead.app/articles/x
	public function show($id){

		$article = Article::findOrFail($id);

		// dd($article->published_at);

		return view('articles.show', compact('article')); //article ->null
		
	}



//homestead.app/articles/create
	public function create(){

		return view('Articles.create');

	}


/**
 * Save a new article
 *
 * @param CreateArticleRequest $request
 * @return Response
 */

//store method
	public function store(ArticleRequest $request)
	{	

		Article::create($request->all());

		return redirect('articles');
	}



//edit method
	public function edit($id)
	{

		$article=Article::findOrFail($id);



		return view('articles.edit', compact('article'));

	}

//update method
	public function update($id, ArticleRequest $request)
	{
		$article=Article::findOrFail($id);

		$article->update($request->all());

		return redirect('articles');

	}

}

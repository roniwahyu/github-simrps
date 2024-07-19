<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalAccessTokensAddRequest;
use App\Models\PersonalAccessTokens;
use Illuminate\Http\Request;
use Exception;
class PersonalAccessTokensController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.personalaccesstokens.list";
		$query = PersonalAccessTokens::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			PersonalAccessTokens::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "personal_access_tokens.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, PersonalAccessTokens::listFields());
		return $this->renderView($view, compact("records"));
	}
}

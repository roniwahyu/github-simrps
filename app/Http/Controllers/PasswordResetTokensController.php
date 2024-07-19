<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordResetTokensAddRequest;
use App\Models\PasswordResetTokens;
use Illuminate\Http\Request;
use Exception;
class PasswordResetTokensController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.passwordresettokens.list";
		$query = PasswordResetTokens::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			PasswordResetTokens::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "password_reset_tokens.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, PasswordResetTokens::listFields());
		return $this->renderView($view, compact("records"));
	}
}

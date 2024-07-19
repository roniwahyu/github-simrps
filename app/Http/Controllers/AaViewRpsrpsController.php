<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AaViewRpsrps;
use Illuminate\Http\Request;
use Exception;
class AaViewRpsrpsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.aaviewrpsrps.list";
		$query = AaViewRpsrps::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AaViewRpsrps::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "aa_view_rpsrps.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AaViewRpsrps::listFields());
		return $this->renderView($view, compact("records"));
	}
}

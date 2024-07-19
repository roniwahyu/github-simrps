<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\00ViewRpsrps;
use Illuminate\Http\Request;
use Exception;
class 00ViewRpsrpsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.00viewrpsrps.list";
		$query = 00ViewRpsrps::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			00ViewRpsrps::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "00_view_rpsrps.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, 00ViewRpsrps::listFields());
		return $this->renderView($view, compact("records"));
	}
}

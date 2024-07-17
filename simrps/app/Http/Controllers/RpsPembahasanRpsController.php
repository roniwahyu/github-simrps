<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsPembahasanRpsAddRequest;
use App\Http\Requests\RpsPembahasanRpsEditRequest;
use App\Models\RpsPembahasanRps;
use Illuminate\Http\Request;
use Exception;
class RpsPembahasanRpsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpspembahasanrps.list";
		$query = RpsPembahasanRps::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsPembahasanRps::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_pembahasan_rps.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsPembahasanRps::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsPembahasanRps::query();
		$record = $query->findOrFail($rec_id, RpsPembahasanRps::viewFields());
		return $this->renderView("pages.rpspembahasanrps.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpspembahasanrps.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsPembahasanRpsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsPembahasanRps record
		$record = RpsPembahasanRps::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpspembahasanrps", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsPembahasanRpsEditRequest $request, $rec_id = null){
		$query = RpsPembahasanRps::query();
		$record = $query->findOrFail($rec_id, RpsPembahasanRps::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpspembahasanrps", "Record updated successfully");
		}
		return $this->renderView("pages.rpspembahasanrps.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = RpsPembahasanRps::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

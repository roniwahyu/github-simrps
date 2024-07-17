<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsCpMkAddRequest;
use App\Http\Requests\RpsCpMkEditRequest;
use App\Models\RpsCpMk;
use Illuminate\Http\Request;
use Exception;
class RpsCpMkController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpscpmk.list";
		$query = RpsCpMk::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsCpMk::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_cp_mk.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsCpMk::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsCpMk::query();
		$record = $query->findOrFail($rec_id, RpsCpMk::viewFields());
		return $this->renderView("pages.rpscpmk.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.rpscpmk.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpscpmk.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsCpMkAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsCpMk record
		$record = RpsCpMk::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpscpmk", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsCpMkEditRequest $request, $rec_id = null){
		$query = RpsCpMk::query();
		$record = $query->findOrFail($rec_id, RpsCpMk::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpscpmk", "Record updated successfully");
		}
		return $this->renderView("pages.rpscpmk.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsCpMk::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

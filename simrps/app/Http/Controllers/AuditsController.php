<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuditsAddRequest;
use App\Http\Requests\AuditsEditRequest;
use App\Models\Audits;
use Illuminate\Http\Request;
use Exception;
class AuditsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.audits.list";
		$query = Audits::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			Audits::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "audits.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Audits::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Audits::query();
		$record = $query->findOrFail($rec_id, Audits::viewFields());
		return $this->renderView("pages.audits.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.audits.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AuditsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save Audits record
		$record = Audits::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("audits", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AuditsEditRequest $request, $rec_id = null){
		$query = Audits::query();
		$record = $query->findOrFail($rec_id, Audits::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("audits", "Record updated successfully");
		}
		return $this->renderView("pages.audits.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = Audits::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadPtAddRequest;
use App\Http\Requests\AkadPtEditRequest;
use App\Models\AkadPt;
use Illuminate\Http\Request;
use Exception;
class AkadPtController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akadpt.list";
		$query = AkadPt::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadPt::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_pt.kode_pt";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadPt::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadPt::query();
		$record = $query->findOrFail($rec_id, AkadPt::viewFields());
		return $this->renderView("pages.akadpt.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akadpt.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadPtAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadPt record
		$record = AkadPt::create($modeldata);
		$rec_id = $record->kode_pt;
		return $this->redirect("akadpt", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadPtEditRequest $request, $rec_id = null){
		$query = AkadPt::query();
		$record = $query->findOrFail($rec_id, AkadPt::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akadpt", "Record updated successfully");
		}
		return $this->renderView("pages.akadpt.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadPt::query();
		$query->whereIn("kode_pt", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

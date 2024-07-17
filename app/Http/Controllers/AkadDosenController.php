<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadDosenAddRequest;
use App\Http\Requests\AkadDosenEditRequest;
use App\Models\AkadDosen;
use Illuminate\Http\Request;
use Exception;
class AkadDosenController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akaddosen.list";
		$query = AkadDosen::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadDosen::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_dosen.nidn";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadDosen::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadDosen::query();
		$record = $query->findOrFail($rec_id, AkadDosen::viewFields());
		return $this->renderView("pages.akaddosen.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akaddosen.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadDosenAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadDosen record
		$record = AkadDosen::create($modeldata);
		$rec_id = $record->nidn;
		return $this->redirect("akaddosen", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadDosenEditRequest $request, $rec_id = null){
		$query = AkadDosen::query();
		$record = $query->findOrFail($rec_id, AkadDosen::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akaddosen", "Record updated successfully");
		}
		return $this->renderView("pages.akaddosen.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadDosen::query();
		$query->whereIn("nidn", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

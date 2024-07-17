<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsAsesmenAddRequest;
use App\Http\Requests\RpsAsesmenEditRequest;
use App\Models\RpsAsesmen;
use Illuminate\Http\Request;
use Exception;
class RpsAsesmenController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpsasesmen.list";
		$query = RpsAsesmen::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsAsesmen::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_asesmen.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsAsesmen::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsAsesmen::query();
		$record = $query->findOrFail($rec_id, RpsAsesmen::viewFields());
		return $this->renderView("pages.rpsasesmen.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpsasesmen.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsAsesmenAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsAsesmen record
		$record = RpsAsesmen::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpsasesmen", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsAsesmenEditRequest $request, $rec_id = null){
		$query = RpsAsesmen::query();
		$record = $query->findOrFail($rec_id, RpsAsesmen::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpsasesmen", "Record updated successfully");
		}
		return $this->renderView("pages.rpsasesmen.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsAsesmen::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

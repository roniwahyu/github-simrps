<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsSubCpmkAsesmenAddRequest;
use App\Http\Requests\RpsSubCpmkAsesmenEditRequest;
use App\Models\RpsSubCpmkAsesmen;
use Illuminate\Http\Request;
use Exception;
class RpsSubCpmkAsesmenController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpssubcpmkasesmen.list";
		$query = RpsSubCpmkAsesmen::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsSubCpmkAsesmen::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_sub_cpmk_asesmen.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsSubCpmkAsesmen::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsSubCpmkAsesmen::query();
		$record = $query->findOrFail($rec_id, RpsSubCpmkAsesmen::viewFields());
		return $this->renderView("pages.rpssubcpmkasesmen.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpssubcpmkasesmen.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsSubCpmkAsesmenAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsSubCpmkAsesmen record
		$record = RpsSubCpmkAsesmen::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpssubcpmkasesmen", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsSubCpmkAsesmenEditRequest $request, $rec_id = null){
		$query = RpsSubCpmkAsesmen::query();
		$record = $query->findOrFail($rec_id, RpsSubCpmkAsesmen::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpssubcpmkasesmen", "Record updated successfully");
		}
		return $this->renderView("pages.rpssubcpmkasesmen.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsSubCpmkAsesmen::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

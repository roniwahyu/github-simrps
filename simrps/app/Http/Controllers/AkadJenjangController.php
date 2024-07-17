<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadJenjangAddRequest;
use App\Http\Requests\AkadJenjangEditRequest;
use App\Models\AkadJenjang;
use Illuminate\Http\Request;
use Exception;
class AkadJenjangController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akadjenjang.list";
		$query = AkadJenjang::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadJenjang::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_jenjang.id_jenjang";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadJenjang::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadJenjang::query();
		$record = $query->findOrFail($rec_id, AkadJenjang::viewFields());
		return $this->renderView("pages.akadjenjang.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akadjenjang.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadJenjangAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadJenjang record
		$record = AkadJenjang::create($modeldata);
		$rec_id = $record->id_jenjang;
		return $this->redirect("akadjenjang", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadJenjangEditRequest $request, $rec_id = null){
		$query = AkadJenjang::query();
		$record = $query->findOrFail($rec_id, AkadJenjang::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akadjenjang", "Record updated successfully");
		}
		return $this->renderView("pages.akadjenjang.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadJenjang::query();
		$query->whereIn("id_jenjang", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

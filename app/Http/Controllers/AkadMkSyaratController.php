<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadMkSyaratAddRequest;
use App\Http\Requests\AkadMkSyaratEditRequest;
use App\Models\AkadMkSyarat;
use Illuminate\Http\Request;
use Exception;
class AkadMkSyaratController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akadmksyarat.list";
		$query = AkadMkSyarat::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadMkSyarat::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_mk_syarat.id_siakad_mk_syarat";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadMkSyarat::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadMkSyarat::query();
		$record = $query->findOrFail($rec_id, AkadMkSyarat::viewFields());
		return $this->renderView("pages.akadmksyarat.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akadmksyarat.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadMkSyaratAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadMkSyarat record
		$record = AkadMkSyarat::create($modeldata);
		$rec_id = $record->id_siakad_mk_syarat;
		return $this->redirect("akadmksyarat", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadMkSyaratEditRequest $request, $rec_id = null){
		$query = AkadMkSyarat::query();
		$record = $query->findOrFail($rec_id, AkadMkSyarat::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akadmksyarat", "Record updated successfully");
		}
		return $this->renderView("pages.akadmksyarat.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadMkSyarat::query();
		$query->whereIn("id_siakad_mk_syarat", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadKurikulumAddRequest;
use App\Http\Requests\AkadKurikulumEditRequest;
use App\Models\AkadKurikulum;
use Illuminate\Http\Request;
use Exception;
class AkadKurikulumController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akadkurikulum.list";
		$query = AkadKurikulum::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadKurikulum::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_kurikulum.id_siakad_kurikulum";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadKurikulum::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadKurikulum::query();
		$record = $query->findOrFail($rec_id, AkadKurikulum::viewFields());
		return $this->renderView("pages.akadkurikulum.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.akadkurikulum.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akadkurikulum.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadKurikulumAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadKurikulum record
		$record = AkadKurikulum::create($modeldata);
		$rec_id = $record->id_siakad_kurikulum;
		return $this->redirect("akadkurikulum", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadKurikulumEditRequest $request, $rec_id = null){
		$query = AkadKurikulum::query();
		$record = $query->findOrFail($rec_id, AkadKurikulum::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akadkurikulum", "Record updated successfully");
		}
		return $this->renderView("pages.akadkurikulum.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadKurikulum::query();
		$query->whereIn("id_siakad_kurikulum", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

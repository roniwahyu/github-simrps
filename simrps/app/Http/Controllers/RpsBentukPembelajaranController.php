<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsBentukPembelajaranAddRequest;
use App\Http\Requests\RpsBentukPembelajaranEditRequest;
use App\Models\RpsBentukPembelajaran;
use Illuminate\Http\Request;
use Exception;
class RpsBentukPembelajaranController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpsbentukpembelajaran.list";
		$query = RpsBentukPembelajaran::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsBentukPembelajaran::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_bentuk_pembelajaran.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsBentukPembelajaran::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsBentukPembelajaran::query();
		$record = $query->findOrFail($rec_id, RpsBentukPembelajaran::viewFields());
		return $this->renderView("pages.rpsbentukpembelajaran.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpsbentukpembelajaran.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsBentukPembelajaranAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsBentukPembelajaran record
		$record = RpsBentukPembelajaran::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpsbentukpembelajaran", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsBentukPembelajaranEditRequest $request, $rec_id = null){
		$query = RpsBentukPembelajaran::query();
		$record = $query->findOrFail($rec_id, RpsBentukPembelajaran::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpsbentukpembelajaran", "Record updated successfully");
		}
		return $this->renderView("pages.rpsbentukpembelajaran.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsBentukPembelajaran::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

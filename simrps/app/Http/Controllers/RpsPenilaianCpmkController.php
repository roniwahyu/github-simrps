<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsPenilaianCpmkAddRequest;
use App\Http\Requests\RpsPenilaianCpmkEditRequest;
use App\Models\RpsPenilaianCpmk;
use Illuminate\Http\Request;
use Exception;
class RpsPenilaianCpmkController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpspenilaiancpmk.list";
		$query = RpsPenilaianCpmk::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsPenilaianCpmk::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_penilaian_cpmk.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsPenilaianCpmk::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsPenilaianCpmk::query();
		$record = $query->findOrFail($rec_id, RpsPenilaianCpmk::viewFields());
		return $this->renderView("pages.rpspenilaiancpmk.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpspenilaiancpmk.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsPenilaianCpmkAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save RpsPenilaianCpmk record
		$record = RpsPenilaianCpmk::create($modeldata);
		$rec_id = $record->id;
		return $this->redirect("rpspenilaiancpmk", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsPenilaianCpmkEditRequest $request, $rec_id = null){
		$query = RpsPenilaianCpmk::query();
		$record = $query->findOrFail($rec_id, RpsPenilaianCpmk::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpspenilaiancpmk", "Record updated successfully");
		}
		return $this->renderView("pages.rpspenilaiancpmk.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsPenilaianCpmk::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

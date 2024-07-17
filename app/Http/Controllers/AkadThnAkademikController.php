<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AkadThnAkademikAddRequest;
use App\Http\Requests\AkadThnAkademikEditRequest;
use App\Models\AkadThnAkademik;
use Illuminate\Http\Request;
use Exception;
class AkadThnAkademikController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.akadthnakademik.list";
		$query = AkadThnAkademik::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			AkadThnAkademik::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "akad_thn_akademik.id_thn_akademik";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, AkadThnAkademik::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = AkadThnAkademik::query();
		$record = $query->findOrFail($rec_id, AkadThnAkademik::viewFields());
		return $this->renderView("pages.akadthnakademik.view", ["data" => $record]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.akadthnakademik.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(AkadThnAkademikAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//save AkadThnAkademik record
		$record = AkadThnAkademik::create($modeldata);
		$rec_id = $record->id_thn_akademik;
		return $this->redirect("akadthnakademik", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(AkadThnAkademikEditRequest $request, $rec_id = null){
		$query = AkadThnAkademik::query();
		$record = $query->findOrFail($rec_id, AkadThnAkademik::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("akadthnakademik", "Record updated successfully");
		}
		return $this->renderView("pages.akadthnakademik.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = AkadThnAkademik::query();
		$query->whereIn("id_thn_akademik", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

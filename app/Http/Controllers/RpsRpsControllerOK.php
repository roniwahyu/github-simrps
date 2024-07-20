<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\RpsRpsAddRequest;
use App\Http\Requests\RpsRpsEditRequest;
use App\Models\RpsRps;
use Illuminate\Http\Request;
use Exception;
class RpsRpsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.rpsrps.list";
		$query = RpsRps::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			RpsRps::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "rps_rps.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, RpsRps::listFields());
		return $this->renderView($view, compact("records"));
	}
	public function getFakultas($id_fakultas) {
        $records = RpsRps::where('id_fakultas', $id_fakultas)->with('fakultas')->get();
        return view('pages.rpsrps.list', compact('records'));
    }
	public function getProdi($id_prodi) {
        $records = RpsRps::where('id_prodi', $id_prodi)->with('prodi')->get();
        return view('pages.rpsrps.list', compact('records'));
    }
	public function getMk($id) {
        $records = RpsRps::where('id', $id)->with('mk')->get();
        return view('pages.rpsrps.list', compact('records'));
    }
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = RpsRps::query();
		$query->join("akad_mk", "rps_rps.id_mk", "=", "akad_mk.id");
		$query->join("akad_prodi", "akad_mk.id_prodi", "=", "akad_prodi.id_prodi");
		$query->join("akad_fakultas", "akad_prodi.fakultas_id", "=", "akad_fakultas.id_fakultas");
		$record = $query->findOrFail($rec_id, RpsRps::viewFields());
		return $this->renderView("pages.rpsrps.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.rpsrps.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.rpsrps.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(RpsRpsAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		//Validate RpsCpRps form data
		$rpscprpsPostData = $request->rpscprps;
		$rpscprpsValidator = validator()->make($rpscprpsPostData, ["*.nama_cp" => "nullable|string",
				"*.id_cp" => "nullable|numeric"]);
		if ($rpscprpsValidator->fails()) {
			return $rpscprpsValidator->errors();
		}
		$rpscprpsValidData = $rpscprpsValidator->valid();
		$rpscprpsModeldata = array_values($rpscprpsValidData);
		
		//Validate RpsCpMk form data
		$rpscpmkPostData = $request->rpscpmk;
		$rpscpmkValidator = validator()->make($rpscpmkPostData, ["*.id_mk" => "nullable",
				"*.nama_cp" => "nullable|string",
				"*.deskripsi" => "nullable|string"]);
		if ($rpscpmkValidator->fails()) {
			return $rpscpmkValidator->errors();
		}
		$rpscpmkValidData = $rpscpmkValidator->valid();
		$rpscpmkModeldata = array_values($rpscpmkValidData);
		
		//save RpsRps record
		$record = RpsRps::create($modeldata);
		$rec_id = $record->id;
		
		// set rpscprps.id_rps to rps_rps $rec_id
		foreach ($rpscprpsModeldata as &$data) {
			$data['id_rps'] = $rec_id;
		}
		
		//Save RpsCpRps record
		\App\Models\RpsCpRps::insert($rpscprpsModeldata);
		
		// set rpscpmk.id_rps to rps_rps $rec_id
		foreach ($rpscpmkModeldata as &$data) {
			$data['id_rps'] = $rec_id;
		}
		
		//Save RpsCpMk record
		\App\Models\RpsCpMk::insert($rpscpmkModeldata);
		return $this->redirect("rpsrps", "Record added successfully");
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(RpsRpsEditRequest $request, $rec_id = null){
		$query = RpsRps::query();
		$record = $query->findOrFail($rec_id, RpsRps::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
			$record->update($modeldata);
			return $this->redirect("rpsrps", "Record updated successfully");
		}
		return $this->renderView("pages.rpsrps.edit", ["data" => $record, "rec_id" => $rec_id]);
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
		$query = RpsRps::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, "Record deleted successfully");
	}
}

<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\FailedJobsAddRequest;
use App\Models\FailedJobs;
use Illuminate\Http\Request;
use Exception;
class FailedJobsController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.failedjobs.list";
		$query = FailedJobs::query();
		$limit = $request->limit ?? 25;
		if($request->search){
			$search = trim($request->search);
			FailedJobs::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "failed_jobs.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, FailedJobs::listFields());
		return $this->renderView($view, compact("records"));
	}
}

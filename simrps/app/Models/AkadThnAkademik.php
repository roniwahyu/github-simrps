<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadThnAkademik extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_thn_akademik';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id_thn_akademik';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'id_universitas','semester_periode','isactive'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				id_thn_akademik LIKE ?  OR 
				semester_periode LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id_thn_akademik",
			"id_universitas",
			"semester_periode",
			"date_created",
			"date_updated",
			"isactive" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id_thn_akademik",
			"id_universitas",
			"semester_periode",
			"date_created",
			"date_updated",
			"isactive" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id_thn_akademik",
			"id_universitas",
			"semester_periode",
			"date_created",
			"date_updated",
			"isactive" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id_thn_akademik",
			"id_universitas",
			"semester_periode",
			"date_created",
			"date_updated",
			"isactive" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id_thn_akademik",
			"id_universitas",
			"semester_periode",
			"isactive" 
		];
	}
}

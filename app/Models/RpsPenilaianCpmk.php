<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RpsPenilaianCpmk extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'rps_penilaian_cpmk';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'id_subcpmk','id_asesmen','id_kriteria','bobot_prosen','date_update','isactive'
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
				id LIKE ? 
		)';
		$search_params = [
			"%$text%"
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
			"id",
			"id_subcpmk",
			"id_asesmen",
			"id_kriteria",
			"bobot_prosen",
			"date_created",
			"date_update",
			"isactive",
			"date_updated" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"id_subcpmk",
			"id_asesmen",
			"id_kriteria",
			"bobot_prosen",
			"date_created",
			"date_update",
			"isactive",
			"date_updated" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"id_subcpmk",
			"id_asesmen",
			"id_kriteria",
			"bobot_prosen",
			"date_created",
			"date_update",
			"isactive",
			"date_updated" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"id_subcpmk",
			"id_asesmen",
			"id_kriteria",
			"bobot_prosen",
			"date_created",
			"date_update",
			"isactive",
			"date_updated" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"id_subcpmk",
			"id_asesmen",
			"id_kriteria",
			"bobot_prosen",
			"date_update",
			"isactive" 
		];
	}
}

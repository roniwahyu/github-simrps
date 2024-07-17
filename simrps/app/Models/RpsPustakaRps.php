<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RpsPustakaRps extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'rps_pustaka_rps';
	

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
		'id_mk','id_rps','no_urut','pustaka','deskripsi','jenis_pustaka','url'
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
				id LIKE ?  OR 
				pustaka LIKE ?  OR 
				deskripsi LIKE ?  OR 
				url LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%"
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
			"id_mk",
			"id_rps",
			"no_urut",
			"pustaka",
			"deskripsi",
			"jenis_pustaka",
			"url",
			"date_created",
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
			"id_mk",
			"id_rps",
			"no_urut",
			"pustaka",
			"deskripsi",
			"jenis_pustaka",
			"url",
			"date_created",
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
			"id_mk",
			"id_rps",
			"no_urut",
			"pustaka",
			"deskripsi",
			"jenis_pustaka",
			"url",
			"date_created",
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
			"id_mk",
			"id_rps",
			"no_urut",
			"pustaka",
			"deskripsi",
			"jenis_pustaka",
			"url",
			"date_created",
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
			"id_mk",
			"id_rps",
			"no_urut",
			"pustaka",
			"deskripsi",
			"jenis_pustaka",
			"url" 
		];
	}
}

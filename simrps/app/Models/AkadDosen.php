<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadDosen extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_dosen';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'nidn';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'nidn','id_prodi','nama_lengkap','nama_lengkap_gelar','jkel','id_jabfung','isactive','id_user'
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
				nidn LIKE ?  OR 
				nama_lengkap LIKE ?  OR 
				nama_lengkap_gelar LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%"
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
			"nidn",
			"id_prodi",
			"nama_lengkap",
			"nama_lengkap_gelar",
			"jkel",
			"id_jabfung",
			"isactive",
			"date_created",
			"date_updated",
			"id_user" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"nidn",
			"id_prodi",
			"nama_lengkap",
			"nama_lengkap_gelar",
			"jkel",
			"id_jabfung",
			"isactive",
			"date_created",
			"date_updated",
			"id_user" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"nidn",
			"id_prodi",
			"nama_lengkap",
			"nama_lengkap_gelar",
			"jkel",
			"id_jabfung",
			"isactive",
			"date_created",
			"date_updated",
			"id_user" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"nidn",
			"id_prodi",
			"nama_lengkap",
			"nama_lengkap_gelar",
			"jkel",
			"id_jabfung",
			"isactive",
			"date_created",
			"date_updated",
			"id_user" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"nidn",
			"id_prodi",
			"nama_lengkap",
			"nama_lengkap_gelar",
			"jkel",
			"id_jabfung",
			"isactive",
			"id_user" 
		];
	}
}

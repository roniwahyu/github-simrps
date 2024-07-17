<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadKurikulum extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_kurikulum';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id_siakad_kurikulum';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'kode_kurikulum','nm_kurikulum','id_prodi','isactive','user_group_id'
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
				id_siakad_kurikulum LIKE ?  OR 
				kode_kurikulum LIKE ?  OR 
				nm_kurikulum LIKE ? 
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
			"id_siakad_kurikulum",
			"kode_kurikulum",
			"nm_kurikulum",
			"id_prodi",
			"isactive",
			"date_created",
			"date_updated",
			"user_group_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id_siakad_kurikulum",
			"kode_kurikulum",
			"nm_kurikulum",
			"id_prodi",
			"isactive",
			"date_created",
			"date_updated",
			"user_group_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id_siakad_kurikulum",
			"kode_kurikulum",
			"nm_kurikulum",
			"id_prodi",
			"isactive",
			"date_created",
			"date_updated",
			"user_group_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id_siakad_kurikulum",
			"kode_kurikulum",
			"nm_kurikulum",
			"id_prodi",
			"isactive",
			"date_created",
			"date_updated",
			"user_group_id" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id_siakad_kurikulum",
			"kode_kurikulum",
			"nm_kurikulum",
			"id_prodi",
			"isactive",
			"user_group_id" 
		];
	}
}

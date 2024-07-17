<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadMk extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_mk';
	

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
		'kode_mk','id_siakad_kurikulum','nm_mk','jns_mk','kurikulum_mk','kelompok_mk','sks_mk','sks_tatapmuka','sks_praktikum','min_mk_lulus','status_mk','upload_silabus_mk','upload_sap_mk','upload_bahan_mk','upload_diktat_mk','id_prodi','isactive'
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
				kode_mk LIKE ?  OR 
				nm_mk LIKE ?  OR 
				upload_silabus_mk LIKE ?  OR 
				upload_sap_mk LIKE ?  OR 
				upload_bahan_mk LIKE ?  OR 
				upload_diktat_mk LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"kode_mk",
			"id_siakad_kurikulum",
			"nm_mk",
			"jns_mk",
			"kurikulum_mk",
			"kelompok_mk",
			"sks_mk",
			"sks_tatapmuka",
			"sks_praktikum",
			"min_mk_lulus",
			"status_mk",
			"upload_silabus_mk",
			"upload_sap_mk",
			"upload_bahan_mk",
			"upload_diktat_mk",
			"id_prodi",
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
			"id",
			"kode_mk",
			"id_siakad_kurikulum",
			"nm_mk",
			"jns_mk",
			"kurikulum_mk",
			"kelompok_mk",
			"sks_mk",
			"sks_tatapmuka",
			"sks_praktikum",
			"min_mk_lulus",
			"status_mk",
			"upload_silabus_mk",
			"upload_sap_mk",
			"upload_bahan_mk",
			"upload_diktat_mk",
			"id_prodi",
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
			"id",
			"kode_mk",
			"id_siakad_kurikulum",
			"nm_mk",
			"jns_mk",
			"kurikulum_mk",
			"kelompok_mk",
			"sks_mk",
			"sks_tatapmuka",
			"sks_praktikum",
			"min_mk_lulus",
			"status_mk",
			"upload_silabus_mk",
			"upload_sap_mk",
			"upload_bahan_mk",
			"upload_diktat_mk",
			"id_prodi",
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
			"id",
			"kode_mk",
			"id_siakad_kurikulum",
			"nm_mk",
			"jns_mk",
			"kurikulum_mk",
			"kelompok_mk",
			"sks_mk",
			"sks_tatapmuka",
			"sks_praktikum",
			"min_mk_lulus",
			"status_mk",
			"upload_silabus_mk",
			"upload_sap_mk",
			"upload_bahan_mk",
			"upload_diktat_mk",
			"id_prodi",
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
			"id",
			"kode_mk",
			"id_siakad_kurikulum",
			"nm_mk",
			"jns_mk",
			"kurikulum_mk",
			"kelompok_mk",
			"sks_mk",
			"sks_tatapmuka",
			"sks_praktikum",
			"min_mk_lulus",
			"status_mk",
			"upload_silabus_mk",
			"upload_sap_mk",
			"upload_bahan_mk",
			"upload_diktat_mk",
			"id_prodi",
			"isactive" 
		];
	}
}

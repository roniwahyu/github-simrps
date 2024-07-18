<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class RpsRps extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'rps_rps';
	

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
		'id_fakultas','id_prodi','id_mk','id_otoritas1','id_otoritas2','deskripsi_rps'
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
				deskripsi_rps LIKE ? 
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
			"id",
			"id_fakultas",
			"id_prodi",
			"id_mk",
			"id_otoritas1",
			"id_otoritas2",
			"deskripsi_rps" 
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
			"id_fakultas",
			"id_prodi",
			"id_mk",
			"id_otoritas1",
			"id_otoritas2",
			"deskripsi_rps" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"rps_rps.id AS id",
			"rps_rps.id_fakultas AS id_fakultas",
			"akad_mk.id AS akadmk_id",
			"akad_mk.kode_mk AS akadmk_kode_mk",
			"akad_mk.id_siakad_kurikulum AS akadmk_id_siakad_kurikulum",
			"akad_mk.nm_mk AS akadmk_nm_mk",
			"akad_mk.id_prodi AS akadmk_id_prodi",
			"akad_prodi.id_prodi AS akadprodi_id_prodi",
			"akad_prodi.fakultas_id AS akadprodi_fakultas_id",
			"akad_prodi.kode_prodi AS akadprodi_kode_prodi",
			"akad_prodi.nama_prodi AS akadprodi_nama_prodi",
			"akad_fakultas.id_fakultas AS akadfakultas_id_fakultas",
			"akad_fakultas.universitas_id AS akadfakultas_universitas_id",
			"akad_fakultas.nama_fakultas AS akadfakultas_nama_fakultas",
			"rps_rps.id_prodi AS id_prodi",
			"rps_rps.id_mk AS id_mk",
			"rps_rps.id_otoritas1 AS id_otoritas1",
			"rps_rps.id_otoritas2 AS id_otoritas2" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"rps_rps.id AS id",
			"rps_rps.id_fakultas AS id_fakultas",
			"akad_mk.id AS akadmk_id",
			"akad_mk.kode_mk AS akadmk_kode_mk",
			"akad_mk.id_siakad_kurikulum AS akadmk_id_siakad_kurikulum",
			"akad_mk.nm_mk AS akadmk_nm_mk",
			"akad_mk.id_prodi AS akadmk_id_prodi",
			"akad_prodi.id_prodi AS akadprodi_id_prodi",
			"akad_prodi.fakultas_id AS akadprodi_fakultas_id",
			"akad_prodi.kode_prodi AS akadprodi_kode_prodi",
			"akad_prodi.nama_prodi AS akadprodi_nama_prodi",
			"akad_fakultas.id_fakultas AS akadfakultas_id_fakultas",
			"akad_fakultas.universitas_id AS akadfakultas_universitas_id",
			"akad_fakultas.nama_fakultas AS akadfakultas_nama_fakultas",
			"rps_rps.id_prodi AS id_prodi",
			"rps_rps.id_mk AS id_mk",
			"rps_rps.id_otoritas1 AS id_otoritas1",
			"rps_rps.id_otoritas2 AS id_otoritas2" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id_fakultas",
			"id_prodi",
			"id_mk",
			"id_otoritas1",
			"id_otoritas2",
			"deskripsi_rps",
			"id" 
		];
	}
}

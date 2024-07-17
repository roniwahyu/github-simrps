<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadMkSyarat extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_mk_syarat';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id_siakad_mk_syarat';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'id_prodi','kode_mk_main','kode_mk_syarat','nil_mk_syarat','nil_angka_mk_syarat','urut_syarat'
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
				id_siakad_mk_syarat LIKE ?  OR 
				kode_mk_main LIKE ?  OR 
				kode_mk_syarat LIKE ? 
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
			"id_siakad_mk_syarat",
			"id_prodi",
			"kode_mk_main",
			"kode_mk_syarat",
			"nil_mk_syarat",
			"nil_angka_mk_syarat",
			"urut_syarat",
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
			"id_siakad_mk_syarat",
			"id_prodi",
			"kode_mk_main",
			"kode_mk_syarat",
			"nil_mk_syarat",
			"nil_angka_mk_syarat",
			"urut_syarat",
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
			"id_siakad_mk_syarat",
			"id_prodi",
			"kode_mk_main",
			"kode_mk_syarat",
			"nil_mk_syarat",
			"nil_angka_mk_syarat",
			"urut_syarat",
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
			"id_siakad_mk_syarat",
			"id_prodi",
			"kode_mk_main",
			"kode_mk_syarat",
			"nil_mk_syarat",
			"nil_angka_mk_syarat",
			"urut_syarat",
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
			"id_siakad_mk_syarat",
			"id_prodi",
			"kode_mk_main",
			"kode_mk_syarat",
			"nil_mk_syarat",
			"nil_angka_mk_syarat",
			"urut_syarat" 
		];
	}
}

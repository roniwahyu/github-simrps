<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadFakultas extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_fakultas';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id_fakultas';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'universitas_id','kode_fakultas','nama_fakultas','keterangan'
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
				id_fakultas LIKE ?  OR 
				kode_fakultas LIKE ?  OR 
				nama_fakultas LIKE ?  OR 
				keterangan LIKE ? 
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
			"id_fakultas",
			"universitas_id",
			"kode_fakultas",
			"nama_fakultas",
			"keterangan",
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
			"id_fakultas",
			"universitas_id",
			"kode_fakultas",
			"nama_fakultas",
			"keterangan",
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
			"id_fakultas",
			"universitas_id",
			"kode_fakultas",
			"nama_fakultas",
			"keterangan",
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
			"id_fakultas",
			"universitas_id",
			"kode_fakultas",
			"nama_fakultas",
			"keterangan",
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
			"id_fakultas",
			"universitas_id",
			"kode_fakultas",
			"nama_fakultas",
			"keterangan" 
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AkadPt extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'akad_pt';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'kode_pt';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'kode_pt','nm_pt','tgl_pt','sk_pt','tgl_sk_pt','almt_pt','kota_pt','kodepos_pt','telp_pt','fax_pt','email_pt','web_pt','logo_pt'
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
				kode_pt LIKE ?  OR 
				nm_pt LIKE ?  OR 
				sk_pt LIKE ?  OR 
				almt_pt LIKE ?  OR 
				kota_pt LIKE ?  OR 
				kodepos_pt LIKE ?  OR 
				telp_pt LIKE ?  OR 
				fax_pt LIKE ?  OR 
				email_pt LIKE ?  OR 
				web_pt LIKE ?  OR 
				logo_pt LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"kode_pt",
			"nm_pt",
			"tgl_pt",
			"sk_pt",
			"tgl_sk_pt",
			"almt_pt",
			"kota_pt",
			"kodepos_pt",
			"telp_pt",
			"fax_pt",
			"email_pt",
			"web_pt",
			"logo_pt",
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
			"kode_pt",
			"nm_pt",
			"tgl_pt",
			"sk_pt",
			"tgl_sk_pt",
			"almt_pt",
			"kota_pt",
			"kodepos_pt",
			"telp_pt",
			"fax_pt",
			"email_pt",
			"web_pt",
			"logo_pt",
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
			"kode_pt",
			"nm_pt",
			"tgl_pt",
			"sk_pt",
			"tgl_sk_pt",
			"almt_pt",
			"kota_pt",
			"kodepos_pt",
			"telp_pt",
			"fax_pt",
			"email_pt",
			"web_pt",
			"logo_pt",
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
			"kode_pt",
			"nm_pt",
			"tgl_pt",
			"sk_pt",
			"tgl_sk_pt",
			"almt_pt",
			"kota_pt",
			"kodepos_pt",
			"telp_pt",
			"fax_pt",
			"email_pt",
			"web_pt",
			"logo_pt",
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
			"kode_pt",
			"nm_pt",
			"tgl_pt",
			"sk_pt",
			"tgl_sk_pt",
			"almt_pt",
			"kota_pt",
			"kodepos_pt",
			"telp_pt",
			"fax_pt",
			"email_pt",
			"web_pt",
			"logo_pt" 
		];
	}
}

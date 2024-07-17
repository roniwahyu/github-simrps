<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Corepermissions extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'corepermissions';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = '';
	public $incrementing = false;
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'id','id_role','name','permission','action','isactive','create','read','update','delete','setup','report','print','export','import','upload','download','backup','restore','user_dashboard','admin_dashboard','validation','userid','created','modified'
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
				name LIKE ?  OR 
				permission LIKE ?  OR 
				action LIKE ?  OR 
				validation LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"id_role",
			"name",
			"permission",
			"action",
			"isactive",
			"create",
			"read",
			"update",
			"delete",
			"setup",
			"report",
			"print",
			"export",
			"import",
			"upload",
			"download",
			"backup",
			"restore",
			"user_dashboard",
			"admin_dashboard",
			"validation",
			"userid",
			"created",
			"modified",
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
			"id_role",
			"name",
			"permission",
			"action",
			"isactive",
			"create",
			"read",
			"update",
			"delete",
			"setup",
			"report",
			"print",
			"export",
			"import",
			"upload",
			"download",
			"backup",
			"restore",
			"user_dashboard",
			"admin_dashboard",
			"validation",
			"userid",
			"created",
			"modified",
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
		];
	}
}

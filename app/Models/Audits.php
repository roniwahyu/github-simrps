<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Audits extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'audits';
	

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
		'user_type','user_id','event','auditable_type','auditable_id','old_values','new_values','url','ip_address','user_agent','tags'
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
				user_type LIKE ?  OR 
				event LIKE ?  OR 
				auditable_type LIKE ?  OR 
				old_values LIKE ?  OR 
				new_values LIKE ?  OR 
				url LIKE ?  OR 
				ip_address LIKE ?  OR 
				user_agent LIKE ?  OR 
				tags LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"user_type",
			"user_id",
			"event",
			"auditable_type",
			"auditable_id",
			"old_values",
			"new_values",
			"url",
			"ip_address",
			"user_agent",
			"tags",
			"created_at",
			"updated_at",
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
			"user_type",
			"user_id",
			"event",
			"auditable_type",
			"auditable_id",
			"old_values",
			"new_values",
			"url",
			"ip_address",
			"user_agent",
			"tags",
			"created_at",
			"updated_at",
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
			"user_type",
			"user_id",
			"event",
			"auditable_type",
			"auditable_id",
			"old_values",
			"new_values",
			"url",
			"ip_address",
			"user_agent",
			"tags",
			"created_at",
			"updated_at",
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
			"user_type",
			"user_id",
			"event",
			"auditable_type",
			"auditable_id",
			"old_values",
			"new_values",
			"url",
			"ip_address",
			"user_agent",
			"tags",
			"created_at",
			"updated_at",
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
			"user_type",
			"user_id",
			"event",
			"auditable_type",
			"auditable_id",
			"old_values",
			"new_values",
			"url",
			"ip_address",
			"user_agent",
			"tags" 
		];
	}
}

<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class CoreUsers extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'core_users';
	

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
		'ip_address','username','password','email','email_login_hash','activation_selector','activation_code','forgotten_password_selector','forgotten_password_code','forgotten_password_time','remember_selector','remember_code','created_on','last_login','active','first_name','last_name','company','phone','picture','oauth_provider','oauth_uid','created','nim','claimed','wa_activated','email_activated','activated','otp','otp_login_code','otp_backup_code','user_role_id','user_group_id'
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
				ip_address LIKE ?  OR 
				username LIKE ?  OR 
				password LIKE ?  OR 
				email LIKE ?  OR 
				email_login_hash LIKE ?  OR 
				activation_selector LIKE ?  OR 
				activation_code LIKE ?  OR 
				forgotten_password_selector LIKE ?  OR 
				forgotten_password_code LIKE ?  OR 
				remember_selector LIKE ?  OR 
				remember_code LIKE ?  OR 
				first_name LIKE ?  OR 
				last_name LIKE ?  OR 
				company LIKE ?  OR 
				phone LIKE ?  OR 
				oauth_provider LIKE ?  OR 
				oauth_uid LIKE ?  OR 
				nim LIKE ?  OR 
				otp LIKE ?  OR 
				otp_login_code LIKE ?  OR 
				otp_backup_code LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"ip_address",
			"username",
			"email",
			"email_login_hash",
			"activation_selector",
			"activation_code",
			"remember_selector",
			"remember_code",
			"created_on",
			"last_login",
			"active",
			"first_name",
			"last_name",
			"company",
			"phone",
			"picture",
			"oauth_provider",
			"oauth_uid",
			"created",
			"nim",
			"claimed",
			"wa_activated",
			"email_activated",
			"activated",
			"otp",
			"otp_login_code",
			"otp_backup_code",
			"user_role_id",
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
			"id",
			"ip_address",
			"username",
			"email",
			"email_login_hash",
			"activation_selector",
			"activation_code",
			"remember_selector",
			"remember_code",
			"created_on",
			"last_login",
			"active",
			"first_name",
			"last_name",
			"company",
			"phone",
			"picture",
			"oauth_provider",
			"oauth_uid",
			"created",
			"nim",
			"claimed",
			"wa_activated",
			"email_activated",
			"activated",
			"otp",
			"otp_login_code",
			"otp_backup_code",
			"user_role_id",
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
			"id",
			"ip_address",
			"username",
			"email",
			"email_login_hash",
			"activation_selector",
			"activation_code",
			"remember_selector",
			"remember_code",
			"created_on",
			"last_login",
			"active",
			"first_name",
			"last_name",
			"company",
			"phone",
			"picture",
			"oauth_provider",
			"oauth_uid",
			"created",
			"nim",
			"claimed",
			"wa_activated",
			"email_activated",
			"activated",
			"otp",
			"otp_login_code",
			"otp_backup_code",
			"user_role_id",
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
			"id",
			"ip_address",
			"username",
			"email",
			"email_login_hash",
			"activation_selector",
			"activation_code",
			"remember_selector",
			"remember_code",
			"created_on",
			"last_login",
			"active",
			"first_name",
			"last_name",
			"company",
			"phone",
			"picture",
			"oauth_provider",
			"oauth_uid",
			"created",
			"nim",
			"claimed",
			"wa_activated",
			"email_activated",
			"activated",
			"otp",
			"otp_login_code",
			"otp_backup_code",
			"user_role_id",
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
			"id",
			"ip_address",
			"username",
			"email",
			"email_login_hash",
			"activation_selector",
			"activation_code",
			"remember_selector",
			"remember_code",
			"created_on",
			"last_login",
			"active",
			"first_name",
			"last_name",
			"company",
			"phone",
			"picture",
			"oauth_provider",
			"oauth_uid",
			"created",
			"nim",
			"claimed",
			"wa_activated",
			"email_activated",
			"activated",
			"otp",
			"otp_login_code",
			"otp_backup_code",
			"user_role_id",
			"user_group_id" 
		];
	}
}

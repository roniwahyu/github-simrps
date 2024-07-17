<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * universitas_id_option_list Model Action
     * @return array
     */
	function universitas_id_option_list(){
		$sqltext = "SELECT id_universitas as value, id_universitas as label FROM akad_universitas";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_prodi_option_list Model Action
     * @return array
     */
	function id_prodi_option_list(){
		$sqltext = "SELECT id_prodi as value, id_prodi as label FROM akad_prodi";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_siakad_kurikulum_option_list Model Action
     * @return array
     */
	function id_siakad_kurikulum_option_list(){
		$sqltext = "SELECT id_siakad_kurikulum as value, id_siakad_kurikulum as label FROM akad_kurikulum";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * fakultas_id_option_list Model Action
     * @return array
     */
	function fakultas_id_option_list(){
		$sqltext = "SELECT id_fakultas as value, id_fakultas as label FROM akad_fakultas";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * group_id_option_list Model Action
     * @return array
     */
	function group_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM core_groups";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * user_id_option_list Model Action
     * @return array
     */
	function user_id_option_list(){
		$sqltext = "SELECT id as value, username as label FROM core_users";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * role_id_option_list Model Action
     * @return array
     */
	function role_id_option_list(){
		$sqltext = "SELECT role_id as value, role_name as label FROM roles";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_jenis_cp_option_list Model Action
     * @return array
     */
	function id_jenis_cp_option_list(){
		$sqltext = "SELECT id as value, id as label FROM rps_cp_jenis";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_mk_option_list Model Action
     * @return array
     */
	function id_mk_option_list(){
		$sqltext = "SELECT id as value, id as label FROM akad_mk";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_rps_option_list Model Action
     * @return array
     */
	function id_rps_option_list(){
		$sqltext = "SELECT id as value, id as label FROM rps_rps";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
	

	/**
     * id_cpmk_option_list Model Action
     * @return array
     */
	function id_cpmk_option_list(){
		$sqltext = "SELECT id as value, id as label FROM rps_cp_mk";
		$query_params = [];
		$arr = DB::select($sqltext, $query_params);
		return $arr;
	}
}

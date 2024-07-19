<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class AaViewRpsrps extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'aa_view_rpsrps';

    // Assuming the view does not have a primary key, set the following to false
    public $incrementing = false;
    protected $primaryKey = null;

    // If the view is read-only, you can set timestamps to false
    public $timestamps = false;

    // Define the listFields method
    public static function listFields() {
        return ['id', 'kode_prodi', 'nama_prodi', 'kode_fakultas', 'nama_fakultas', 'deskripsi_rps', 'kode_mk', 'nm_mk'];
    }

	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
	];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
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

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	
	Route::get('', 'HomeController@index')->name('index');
	Route::get('home', 'HomeController@index')->name('home');




/* routes for AkadDosen Controller */
	Route::get('akaddosen', 'AkadDosenController@index')->name('akaddosen.index');
	Route::get('akaddosen/index/{filter?}/{filtervalue?}', 'AkadDosenController@index')->name('akaddosen.index');	
	Route::get('akaddosen/view/{rec_id}', 'AkadDosenController@view')->name('akaddosen.view');	
	Route::get('akaddosen/add', 'AkadDosenController@add')->name('akaddosen.add');
	Route::post('akaddosen/add', 'AkadDosenController@store')->name('akaddosen.store');
		
	Route::any('akaddosen/edit/{rec_id}', 'AkadDosenController@edit')->name('akaddosen.edit');	
	Route::get('akaddosen/delete/{rec_id}', 'AkadDosenController@delete');

/* routes for AkadFakultas Controller */
	Route::get('akadfakultas', 'AkadFakultasController@index')->name('akadfakultas.index');
	Route::get('akadfakultas/index/{filter?}/{filtervalue?}', 'AkadFakultasController@index')->name('akadfakultas.index');	
	Route::get('akadfakultas/view/{rec_id}', 'AkadFakultasController@view')->name('akadfakultas.view');
	Route::get('akadfakultas/masterdetail/{rec_id}', 'AkadFakultasController@masterDetail')->name('akadfakultas.masterdetail');	
	Route::get('akadfakultas/add', 'AkadFakultasController@add')->name('akadfakultas.add');
	Route::post('akadfakultas/add', 'AkadFakultasController@store')->name('akadfakultas.store');
		
	Route::any('akadfakultas/edit/{rec_id}', 'AkadFakultasController@edit')->name('akadfakultas.edit');	
	Route::get('akadfakultas/delete/{rec_id}', 'AkadFakultasController@delete');

/* routes for AkadJabfung Controller */
	Route::get('akadjabfung', 'AkadJabfungController@index')->name('akadjabfung.index');
	Route::get('akadjabfung/index/{filter?}/{filtervalue?}', 'AkadJabfungController@index')->name('akadjabfung.index');	
	Route::get('akadjabfung/view/{rec_id}', 'AkadJabfungController@view')->name('akadjabfung.view');	
	Route::get('akadjabfung/add', 'AkadJabfungController@add')->name('akadjabfung.add');
	Route::post('akadjabfung/add', 'AkadJabfungController@store')->name('akadjabfung.store');
		
	Route::any('akadjabfung/edit/{rec_id}', 'AkadJabfungController@edit')->name('akadjabfung.edit');	
	Route::get('akadjabfung/delete/{rec_id}', 'AkadJabfungController@delete');

/* routes for AkadJenjang Controller */
	Route::get('akadjenjang', 'AkadJenjangController@index')->name('akadjenjang.index');
	Route::get('akadjenjang/index/{filter?}/{filtervalue?}', 'AkadJenjangController@index')->name('akadjenjang.index');	
	Route::get('akadjenjang/view/{rec_id}', 'AkadJenjangController@view')->name('akadjenjang.view');	
	Route::get('akadjenjang/add', 'AkadJenjangController@add')->name('akadjenjang.add');
	Route::post('akadjenjang/add', 'AkadJenjangController@store')->name('akadjenjang.store');
		
	Route::any('akadjenjang/edit/{rec_id}', 'AkadJenjangController@edit')->name('akadjenjang.edit');	
	Route::get('akadjenjang/delete/{rec_id}', 'AkadJenjangController@delete');

/* routes for AkadKurikulum Controller */
	Route::get('akadkurikulum', 'AkadKurikulumController@index')->name('akadkurikulum.index');
	Route::get('akadkurikulum/index/{filter?}/{filtervalue?}', 'AkadKurikulumController@index')->name('akadkurikulum.index');	
	Route::get('akadkurikulum/view/{rec_id}', 'AkadKurikulumController@view')->name('akadkurikulum.view');
	Route::get('akadkurikulum/masterdetail/{rec_id}', 'AkadKurikulumController@masterDetail')->name('akadkurikulum.masterdetail');	
	Route::get('akadkurikulum/add', 'AkadKurikulumController@add')->name('akadkurikulum.add');
	Route::post('akadkurikulum/add', 'AkadKurikulumController@store')->name('akadkurikulum.store');
		
	Route::any('akadkurikulum/edit/{rec_id}', 'AkadKurikulumController@edit')->name('akadkurikulum.edit');	
	Route::get('akadkurikulum/delete/{rec_id}', 'AkadKurikulumController@delete');

/* routes for AkadMk Controller */
	Route::get('akadmk', 'AkadMkController@index')->name('akadmk.index');
	Route::get('akadmk/index/{filter?}/{filtervalue?}', 'AkadMkController@index')->name('akadmk.index');	
	Route::get('akadmk/view/{rec_id}', 'AkadMkController@view')->name('akadmk.view');
	Route::get('akadmk/masterdetail/{rec_id}', 'AkadMkController@masterDetail')->name('akadmk.masterdetail');	
	Route::get('akadmk/add', 'AkadMkController@add')->name('akadmk.add');
	Route::post('akadmk/add', 'AkadMkController@store')->name('akadmk.store');
		
	Route::any('akadmk/edit/{rec_id}', 'AkadMkController@edit')->name('akadmk.edit');	
	Route::get('akadmk/delete/{rec_id}', 'AkadMkController@delete');

/* routes for AkadMkSyarat Controller */
	Route::get('akadmksyarat', 'AkadMkSyaratController@index')->name('akadmksyarat.index');
	Route::get('akadmksyarat/index/{filter?}/{filtervalue?}', 'AkadMkSyaratController@index')->name('akadmksyarat.index');	
	Route::get('akadmksyarat/view/{rec_id}', 'AkadMkSyaratController@view')->name('akadmksyarat.view');	
	Route::get('akadmksyarat/add', 'AkadMkSyaratController@add')->name('akadmksyarat.add');
	Route::post('akadmksyarat/add', 'AkadMkSyaratController@store')->name('akadmksyarat.store');
		
	Route::any('akadmksyarat/edit/{rec_id}', 'AkadMkSyaratController@edit')->name('akadmksyarat.edit');	
	Route::get('akadmksyarat/delete/{rec_id}', 'AkadMkSyaratController@delete');

/* routes for AkadProdi Controller */
	Route::get('akadprodi', 'AkadProdiController@index')->name('akadprodi.index');
	Route::get('akadprodi/index/{filter?}/{filtervalue?}', 'AkadProdiController@index')->name('akadprodi.index');	
	Route::get('akadprodi/view/{rec_id}', 'AkadProdiController@view')->name('akadprodi.view');
	Route::get('akadprodi/masterdetail/{rec_id}', 'AkadProdiController@masterDetail')->name('akadprodi.masterdetail');	
	Route::get('akadprodi/add', 'AkadProdiController@add')->name('akadprodi.add');
	Route::post('akadprodi/add', 'AkadProdiController@store')->name('akadprodi.store');
		
	Route::any('akadprodi/edit/{rec_id}', 'AkadProdiController@edit')->name('akadprodi.edit');	
	Route::get('akadprodi/delete/{rec_id}', 'AkadProdiController@delete');

/* routes for AkadPt Controller */
	Route::get('akadpt', 'AkadPtController@index')->name('akadpt.index');
	Route::get('akadpt/index/{filter?}/{filtervalue?}', 'AkadPtController@index')->name('akadpt.index');	
	Route::get('akadpt/view/{rec_id}', 'AkadPtController@view')->name('akadpt.view');	
	Route::get('akadpt/add', 'AkadPtController@add')->name('akadpt.add');
	Route::post('akadpt/add', 'AkadPtController@store')->name('akadpt.store');
		
	Route::any('akadpt/edit/{rec_id}', 'AkadPtController@edit')->name('akadpt.edit');	
	Route::get('akadpt/delete/{rec_id}', 'AkadPtController@delete');

/* routes for AkadThnAkademik Controller */
	Route::get('akadthnakademik', 'AkadThnAkademikController@index')->name('akadthnakademik.index');
	Route::get('akadthnakademik/index/{filter?}/{filtervalue?}', 'AkadThnAkademikController@index')->name('akadthnakademik.index');	
	Route::get('akadthnakademik/view/{rec_id}', 'AkadThnAkademikController@view')->name('akadthnakademik.view');	
	Route::get('akadthnakademik/add', 'AkadThnAkademikController@add')->name('akadthnakademik.add');
	Route::post('akadthnakademik/add', 'AkadThnAkademikController@store')->name('akadthnakademik.store');
		
	Route::any('akadthnakademik/edit/{rec_id}', 'AkadThnAkademikController@edit')->name('akadthnakademik.edit');	
	Route::get('akadthnakademik/delete/{rec_id}', 'AkadThnAkademikController@delete');

/* routes for AkadUniversitas Controller */
	Route::get('akaduniversitas', 'AkadUniversitasController@index')->name('akaduniversitas.index');
	Route::get('akaduniversitas/index/{filter?}/{filtervalue?}', 'AkadUniversitasController@index')->name('akaduniversitas.index');	
	Route::get('akaduniversitas/view/{rec_id}', 'AkadUniversitasController@view')->name('akaduniversitas.view');
	Route::get('akaduniversitas/masterdetail/{rec_id}', 'AkadUniversitasController@masterDetail')->name('akaduniversitas.masterdetail');	
	Route::get('akaduniversitas/add', 'AkadUniversitasController@add')->name('akaduniversitas.add');
	Route::post('akaduniversitas/add', 'AkadUniversitasController@store')->name('akaduniversitas.store');
		
	Route::any('akaduniversitas/edit/{rec_id}', 'AkadUniversitasController@edit')->name('akaduniversitas.edit');	
	Route::get('akaduniversitas/delete/{rec_id}', 'AkadUniversitasController@delete');

/* routes for Audits Controller */
	Route::get('audits', 'AuditsController@index')->name('audits.index');
	Route::get('audits/index/{filter?}/{filtervalue?}', 'AuditsController@index')->name('audits.index');	
	Route::get('audits/view/{rec_id}', 'AuditsController@view')->name('audits.view');	
	Route::get('audits/add', 'AuditsController@add')->name('audits.add');
	Route::post('audits/add', 'AuditsController@store')->name('audits.store');
		
	Route::any('audits/edit/{rec_id}', 'AuditsController@edit')->name('audits.edit');	
	Route::get('audits/delete/{rec_id}', 'AuditsController@delete');

/* routes for CoreGroupPermission Controller */
	Route::get('coregrouppermission', 'CoreGroupPermissionController@index')->name('coregrouppermission.index');
	Route::get('coregrouppermission/index/{filter?}/{filtervalue?}', 'CoreGroupPermissionController@index')->name('coregrouppermission.index');	
	Route::get('coregrouppermission/view/{rec_id}', 'CoreGroupPermissionController@view')->name('coregrouppermission.view');	
	Route::get('coregrouppermission/add', 'CoreGroupPermissionController@add')->name('coregrouppermission.add');
	Route::post('coregrouppermission/add', 'CoreGroupPermissionController@store')->name('coregrouppermission.store');
		
	Route::any('coregrouppermission/edit/{rec_id}', 'CoreGroupPermissionController@edit')->name('coregrouppermission.edit');	
	Route::get('coregrouppermission/delete/{rec_id}', 'CoreGroupPermissionController@delete');

/* routes for CoreGroupRole Controller */
	Route::get('coregrouprole', 'CoreGroupRoleController@index')->name('coregrouprole.index');
	Route::get('coregrouprole/index/{filter?}/{filtervalue?}', 'CoreGroupRoleController@index')->name('coregrouprole.index');	
	Route::get('coregrouprole/view/{rec_id}', 'CoreGroupRoleController@view')->name('coregrouprole.view');	
	Route::get('coregrouprole/add', 'CoreGroupRoleController@add')->name('coregrouprole.add');
	Route::post('coregrouprole/add', 'CoreGroupRoleController@store')->name('coregrouprole.store');
		
	Route::any('coregrouprole/edit/{rec_id}', 'CoreGroupRoleController@edit')->name('coregrouprole.edit');	
	Route::get('coregrouprole/delete/{rec_id}', 'CoreGroupRoleController@delete');

/* routes for CoreGroups Controller */
	Route::get('coregroups', 'CoreGroupsController@index')->name('coregroups.index');
	Route::get('coregroups/index/{filter?}/{filtervalue?}', 'CoreGroupsController@index')->name('coregroups.index');	
	Route::get('coregroups/view/{rec_id}', 'CoreGroupsController@view')->name('coregroups.view');
	Route::get('coregroups/masterdetail/{rec_id}', 'CoreGroupsController@masterDetail')->name('coregroups.masterdetail');	
	Route::get('coregroups/add', 'CoreGroupsController@add')->name('coregroups.add');
	Route::post('coregroups/add', 'CoreGroupsController@store')->name('coregroups.store');
		
	Route::any('coregroups/edit/{rec_id}', 'CoreGroupsController@edit')->name('coregroups.edit');	
	Route::get('coregroups/delete/{rec_id}', 'CoreGroupsController@delete');

/* routes for CoreGroupUser Controller */
	Route::get('coregroupuser', 'CoreGroupUserController@index')->name('coregroupuser.index');
	Route::get('coregroupuser/index/{filter?}/{filtervalue?}', 'CoreGroupUserController@index')->name('coregroupuser.index');	
	Route::get('coregroupuser/view/{rec_id}', 'CoreGroupUserController@view')->name('coregroupuser.view');	
	Route::get('coregroupuser/add', 'CoreGroupUserController@add')->name('coregroupuser.add');
	Route::post('coregroupuser/add', 'CoreGroupUserController@store')->name('coregroupuser.store');
		
	Route::any('coregroupuser/edit/{rec_id}', 'CoreGroupUserController@edit')->name('coregroupuser.edit');	
	Route::get('coregroupuser/delete/{rec_id}', 'CoreGroupUserController@delete');

/* routes for Corepermissions Controller */
	Route::get('corepermissions', 'CorepermissionsController@index')->name('corepermissions.index');
	Route::get('corepermissions/index/{filter?}/{filtervalue?}', 'CorepermissionsController@index')->name('corepermissions.index');

/* routes for Coreroles Controller */
	Route::get('coreroles', 'CorerolesController@index')->name('coreroles.index');
	Route::get('coreroles/index/{filter?}/{filtervalue?}', 'CorerolesController@index')->name('coreroles.index');	
	Route::get('coreroles/view/{rec_id}', 'CorerolesController@view')->name('coreroles.view');	
	Route::get('coreroles/add', 'CorerolesController@add')->name('coreroles.add');
	Route::post('coreroles/add', 'CorerolesController@store')->name('coreroles.store');
		
	Route::any('coreroles/edit/{rec_id}', 'CorerolesController@edit')->name('coreroles.edit');	
	Route::get('coreroles/delete/{rec_id}', 'CorerolesController@delete');

/* routes for CoreRoles Controller */
	Route::get('coreroles', 'CoreRolesController@index')->name('coreroles.index');
	Route::get('coreroles/index/{filter?}/{filtervalue?}', 'CoreRolesController@index')->name('coreroles.index');	
	Route::get('coreroles/view/{rec_id}', 'CoreRolesController@view')->name('coreroles.view');	
	Route::get('coreroles/add', 'CoreRolesController@add')->name('coreroles.add');
	Route::post('coreroles/add', 'CoreRolesController@store')->name('coreroles.store');
		
	Route::any('coreroles/edit/{rec_id}', 'CoreRolesController@edit')->name('coreroles.edit');	
	Route::get('coreroles/delete/{rec_id}', 'CoreRolesController@delete');

/* routes for CoreUsers Controller */
	Route::get('coreusers', 'CoreUsersController@index')->name('coreusers.index');
	Route::get('coreusers/index/{filter?}/{filtervalue?}', 'CoreUsersController@index')->name('coreusers.index');	
	Route::get('coreusers/view/{rec_id}', 'CoreUsersController@view')->name('coreusers.view');
	Route::get('coreusers/masterdetail/{rec_id}', 'CoreUsersController@masterDetail')->name('coreusers.masterdetail');	
	Route::get('coreusers/add', 'CoreUsersController@add')->name('coreusers.add');
	Route::post('coreusers/add', 'CoreUsersController@store')->name('coreusers.store');
		
	Route::any('coreusers/edit/{rec_id}', 'CoreUsersController@edit')->name('coreusers.edit');	
	Route::get('coreusers/delete/{rec_id}', 'CoreUsersController@delete');

/* routes for Permissions Controller */
	Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
	Route::get('permissions/index/{filter?}/{filtervalue?}', 'PermissionsController@index')->name('permissions.index');	
	Route::get('permissions/view/{rec_id}', 'PermissionsController@view')->name('permissions.view');	
	Route::get('permissions/add', 'PermissionsController@add')->name('permissions.add');
	Route::post('permissions/add', 'PermissionsController@store')->name('permissions.store');
		
	Route::any('permissions/edit/{rec_id}', 'PermissionsController@edit')->name('permissions.edit');	
	Route::get('permissions/delete/{rec_id}', 'PermissionsController@delete');

/* routes for Roles Controller */
	Route::get('roles', 'RolesController@index')->name('roles.index');
	Route::get('roles/index/{filter?}/{filtervalue?}', 'RolesController@index')->name('roles.index');	
	Route::get('roles/view/{rec_id}', 'RolesController@view')->name('roles.view');
	Route::get('roles/masterdetail/{rec_id}', 'RolesController@masterDetail')->name('roles.masterdetail');	
	Route::get('roles/add', 'RolesController@add')->name('roles.add');
	Route::post('roles/add', 'RolesController@store')->name('roles.store');
		
	Route::any('roles/edit/{rec_id}', 'RolesController@edit')->name('roles.edit');	
	Route::get('roles/delete/{rec_id}', 'RolesController@delete');

/* routes for RpsAsesmen Controller */
	Route::get('rpsasesmen', 'RpsAsesmenController@index')->name('rpsasesmen.index');
	Route::get('rpsasesmen/index/{filter?}/{filtervalue?}', 'RpsAsesmenController@index')->name('rpsasesmen.index');	
	Route::get('rpsasesmen/view/{rec_id}', 'RpsAsesmenController@view')->name('rpsasesmen.view');	
	Route::get('rpsasesmen/add', 'RpsAsesmenController@add')->name('rpsasesmen.add');
	Route::post('rpsasesmen/add', 'RpsAsesmenController@store')->name('rpsasesmen.store');
		
	Route::any('rpsasesmen/edit/{rec_id}', 'RpsAsesmenController@edit')->name('rpsasesmen.edit');	
	Route::get('rpsasesmen/delete/{rec_id}', 'RpsAsesmenController@delete');

/* routes for RpsBahanAjar Controller */
	Route::get('rpsbahanajar', 'RpsBahanAjarController@index')->name('rpsbahanajar.index');
	Route::get('rpsbahanajar/index/{filter?}/{filtervalue?}', 'RpsBahanAjarController@index')->name('rpsbahanajar.index');	
	Route::get('rpsbahanajar/view/{rec_id}', 'RpsBahanAjarController@view')->name('rpsbahanajar.view');	
	Route::get('rpsbahanajar/add', 'RpsBahanAjarController@add')->name('rpsbahanajar.add');
	Route::post('rpsbahanajar/add', 'RpsBahanAjarController@store')->name('rpsbahanajar.store');
		
	Route::any('rpsbahanajar/edit/{rec_id}', 'RpsBahanAjarController@edit')->name('rpsbahanajar.edit');	
	Route::get('rpsbahanajar/delete/{rec_id}', 'RpsBahanAjarController@delete');

/* routes for RpsBentukPembelajaran Controller */
	Route::get('rpsbentukpembelajaran', 'RpsBentukPembelajaranController@index')->name('rpsbentukpembelajaran.index');
	Route::get('rpsbentukpembelajaran/index/{filter?}/{filtervalue?}', 'RpsBentukPembelajaranController@index')->name('rpsbentukpembelajaran.index');	
	Route::get('rpsbentukpembelajaran/view/{rec_id}', 'RpsBentukPembelajaranController@view')->name('rpsbentukpembelajaran.view');	
	Route::get('rpsbentukpembelajaran/add', 'RpsBentukPembelajaranController@add')->name('rpsbentukpembelajaran.add');
	Route::post('rpsbentukpembelajaran/add', 'RpsBentukPembelajaranController@store')->name('rpsbentukpembelajaran.store');
		
	Route::any('rpsbentukpembelajaran/edit/{rec_id}', 'RpsBentukPembelajaranController@edit')->name('rpsbentukpembelajaran.edit');	
	Route::get('rpsbentukpembelajaran/delete/{rec_id}', 'RpsBentukPembelajaranController@delete');

/* routes for RpsCp Controller */
	Route::get('rpscp', 'RpsCpController@index')->name('rpscp.index');
	Route::get('rpscp/index/{filter?}/{filtervalue?}', 'RpsCpController@index')->name('rpscp.index');	
	Route::get('rpscp/view/{rec_id}', 'RpsCpController@view')->name('rpscp.view');	
	Route::get('rpscp/add', 'RpsCpController@add')->name('rpscp.add');
	Route::post('rpscp/add', 'RpsCpController@store')->name('rpscp.store');
		
	Route::any('rpscp/edit/{rec_id}', 'RpsCpController@edit')->name('rpscp.edit');	
	Route::get('rpscp/delete/{rec_id}', 'RpsCpController@delete');

/* routes for RpsCpJenis Controller */
	Route::get('rpscpjenis', 'RpsCpJenisController@index')->name('rpscpjenis.index');
	Route::get('rpscpjenis/index/{filter?}/{filtervalue?}', 'RpsCpJenisController@index')->name('rpscpjenis.index');	
	Route::get('rpscpjenis/view/{rec_id}', 'RpsCpJenisController@view')->name('rpscpjenis.view');
	Route::get('rpscpjenis/masterdetail/{rec_id}', 'RpsCpJenisController@masterDetail')->name('rpscpjenis.masterdetail');	
	Route::get('rpscpjenis/add', 'RpsCpJenisController@add')->name('rpscpjenis.add');
	Route::post('rpscpjenis/add', 'RpsCpJenisController@store')->name('rpscpjenis.store');
		
	Route::any('rpscpjenis/edit/{rec_id}', 'RpsCpJenisController@edit')->name('rpscpjenis.edit');	
	Route::get('rpscpjenis/delete/{rec_id}', 'RpsCpJenisController@delete');

/* routes for RpsCpMk Controller */
	Route::get('rpscpmk', 'RpsCpMkController@index')->name('rpscpmk.index');
	Route::get('rpscpmk/index/{filter?}/{filtervalue?}', 'RpsCpMkController@index')->name('rpscpmk.index');	
	Route::get('rpscpmk/view/{rec_id}', 'RpsCpMkController@view')->name('rpscpmk.view');
	Route::get('rpscpmk/masterdetail/{rec_id}', 'RpsCpMkController@masterDetail')->name('rpscpmk.masterdetail');	
	Route::get('rpscpmk/add', 'RpsCpMkController@add')->name('rpscpmk.add');
	Route::post('rpscpmk/add', 'RpsCpMkController@store')->name('rpscpmk.store');
		
	Route::any('rpscpmk/edit/{rec_id}', 'RpsCpMkController@edit')->name('rpscpmk.edit');	
	Route::get('rpscpmk/delete/{rec_id}', 'RpsCpMkController@delete');

/* routes for RpsCpRps Controller */
	Route::get('rpscprps', 'RpsCpRpsController@index')->name('rpscprps.index');
	Route::get('rpscprps/index/{filter?}/{filtervalue?}', 'RpsCpRpsController@index')->name('rpscprps.index');	
	Route::get('rpscprps/view/{rec_id}', 'RpsCpRpsController@view')->name('rpscprps.view');	
	Route::get('rpscprps/add', 'RpsCpRpsController@add')->name('rpscprps.add');
	Route::post('rpscprps/add', 'RpsCpRpsController@store')->name('rpscprps.store');
		
	Route::any('rpscprps/edit/{rec_id}', 'RpsCpRpsController@edit')->name('rpscprps.edit');	
	Route::get('rpscprps/delete/{rec_id}', 'RpsCpRpsController@delete');

/* routes for RpsCpSubMk Controller */
	Route::get('rpscpsubmk', 'RpsCpSubMkController@index')->name('rpscpsubmk.index');
	Route::get('rpscpsubmk/index/{filter?}/{filtervalue?}', 'RpsCpSubMkController@index')->name('rpscpsubmk.index');	
	Route::get('rpscpsubmk/view/{rec_id}', 'RpsCpSubMkController@view')->name('rpscpsubmk.view');	
	Route::get('rpscpsubmk/add', 'RpsCpSubMkController@add')->name('rpscpsubmk.add');
	Route::post('rpscpsubmk/add', 'RpsCpSubMkController@store')->name('rpscpsubmk.store');
		
	Route::any('rpscpsubmk/edit/{rec_id}', 'RpsCpSubMkController@edit')->name('rpscpsubmk.edit');	
	Route::get('rpscpsubmk/delete/{rec_id}', 'RpsCpSubMkController@delete');

/* routes for RpsKategoriRelasi Controller */
	Route::get('rpskategorirelasi', 'RpsKategoriRelasiController@index')->name('rpskategorirelasi.index');
	Route::get('rpskategorirelasi/index/{filter?}/{filtervalue?}', 'RpsKategoriRelasiController@index')->name('rpskategorirelasi.index');	
	Route::get('rpskategorirelasi/view/{rec_id}', 'RpsKategoriRelasiController@view')->name('rpskategorirelasi.view');	
	Route::get('rpskategorirelasi/add', 'RpsKategoriRelasiController@add')->name('rpskategorirelasi.add');
	Route::post('rpskategorirelasi/add', 'RpsKategoriRelasiController@store')->name('rpskategorirelasi.store');
		
	Route::any('rpskategorirelasi/edit/{rec_id}', 'RpsKategoriRelasiController@edit')->name('rpskategorirelasi.edit');	
	Route::get('rpskategorirelasi/delete/{rec_id}', 'RpsKategoriRelasiController@delete');

/* routes for RpsKriteriaCapaian Controller */
	Route::get('rpskriteriacapaian', 'RpsKriteriaCapaianController@index')->name('rpskriteriacapaian.index');
	Route::get('rpskriteriacapaian/index/{filter?}/{filtervalue?}', 'RpsKriteriaCapaianController@index')->name('rpskriteriacapaian.index');	
	Route::get('rpskriteriacapaian/view/{rec_id}', 'RpsKriteriaCapaianController@view')->name('rpskriteriacapaian.view');	
	Route::get('rpskriteriacapaian/add', 'RpsKriteriaCapaianController@add')->name('rpskriteriacapaian.add');
	Route::post('rpskriteriacapaian/add', 'RpsKriteriaCapaianController@store')->name('rpskriteriacapaian.store');
		
	Route::any('rpskriteriacapaian/edit/{rec_id}', 'RpsKriteriaCapaianController@edit')->name('rpskriteriacapaian.edit');	
	Route::get('rpskriteriacapaian/delete/{rec_id}', 'RpsKriteriaCapaianController@delete');

/* routes for RpsMetodePembelajaran Controller */
	Route::get('rpsmetodepembelajaran', 'RpsMetodePembelajaranController@index')->name('rpsmetodepembelajaran.index');
	Route::get('rpsmetodepembelajaran/index/{filter?}/{filtervalue?}', 'RpsMetodePembelajaranController@index')->name('rpsmetodepembelajaran.index');	
	Route::get('rpsmetodepembelajaran/view/{rec_id}', 'RpsMetodePembelajaranController@view')->name('rpsmetodepembelajaran.view');	
	Route::get('rpsmetodepembelajaran/add', 'RpsMetodePembelajaranController@add')->name('rpsmetodepembelajaran.add');
	Route::post('rpsmetodepembelajaran/add', 'RpsMetodePembelajaranController@store')->name('rpsmetodepembelajaran.store');
		
	Route::any('rpsmetodepembelajaran/edit/{rec_id}', 'RpsMetodePembelajaranController@edit')->name('rpsmetodepembelajaran.edit');	
	Route::get('rpsmetodepembelajaran/delete/{rec_id}', 'RpsMetodePembelajaranController@delete');

/* routes for RpsPembahasanRps Controller */
	Route::get('rpspembahasanrps', 'RpsPembahasanRpsController@index')->name('rpspembahasanrps.index');
	Route::get('rpspembahasanrps/index/{filter?}/{filtervalue?}', 'RpsPembahasanRpsController@index')->name('rpspembahasanrps.index');	
	Route::get('rpspembahasanrps/view/{rec_id}', 'RpsPembahasanRpsController@view')->name('rpspembahasanrps.view');	
	Route::get('rpspembahasanrps/add', 'RpsPembahasanRpsController@add')->name('rpspembahasanrps.add');
	Route::post('rpspembahasanrps/add', 'RpsPembahasanRpsController@store')->name('rpspembahasanrps.store');
		
	Route::any('rpspembahasanrps/edit/{rec_id}', 'RpsPembahasanRpsController@edit')->name('rpspembahasanrps.edit');	
	Route::get('rpspembahasanrps/delete/{rec_id}', 'RpsPembahasanRpsController@delete');

/* routes for RpsPenilaianCpmk Controller */
	Route::get('rpspenilaiancpmk', 'RpsPenilaianCpmkController@index')->name('rpspenilaiancpmk.index');
	Route::get('rpspenilaiancpmk/index/{filter?}/{filtervalue?}', 'RpsPenilaianCpmkController@index')->name('rpspenilaiancpmk.index');	
	Route::get('rpspenilaiancpmk/view/{rec_id}', 'RpsPenilaianCpmkController@view')->name('rpspenilaiancpmk.view');	
	Route::get('rpspenilaiancpmk/add', 'RpsPenilaianCpmkController@add')->name('rpspenilaiancpmk.add');
	Route::post('rpspenilaiancpmk/add', 'RpsPenilaianCpmkController@store')->name('rpspenilaiancpmk.store');
		
	Route::any('rpspenilaiancpmk/edit/{rec_id}', 'RpsPenilaianCpmkController@edit')->name('rpspenilaiancpmk.edit');	
	Route::get('rpspenilaiancpmk/delete/{rec_id}', 'RpsPenilaianCpmkController@delete');

/* routes for RpsPustakaRps Controller */
	Route::get('rpspustakarps', 'RpsPustakaRpsController@index')->name('rpspustakarps.index');
	Route::get('rpspustakarps/index/{filter?}/{filtervalue?}', 'RpsPustakaRpsController@index')->name('rpspustakarps.index');	
	Route::get('rpspustakarps/view/{rec_id}', 'RpsPustakaRpsController@view')->name('rpspustakarps.view');	
	Route::get('rpspustakarps/add', 'RpsPustakaRpsController@add')->name('rpspustakarps.add');
	Route::post('rpspustakarps/add', 'RpsPustakaRpsController@store')->name('rpspustakarps.store');
		
	Route::any('rpspustakarps/edit/{rec_id}', 'RpsPustakaRpsController@edit')->name('rpspustakarps.edit');	
	Route::get('rpspustakarps/delete/{rec_id}', 'RpsPustakaRpsController@delete');

/* routes for RpsRps Controller */
	Route::get('rpsrps', 'RpsRpsController@index')->name('rpsrps.index');
	Route::get('rpsrps/index/{filter?}/{filtervalue?}', 'RpsRpsController@index')->name('rpsrps.index');	
	Route::get('rpsrps/view/{rec_id}', 'RpsRpsController@view')->name('rpsrps.view');
	Route::get('rpsrps/masterdetail/{rec_id}', 'RpsRpsController@masterDetail')->name('rpsrps.masterdetail');	
	Route::get('rpsrps/add', 'RpsRpsController@add')->name('rpsrps.add');
	Route::post('rpsrps/add', 'RpsRpsController@store')->name('rpsrps.store');
		
	Route::any('rpsrps/edit/{rec_id}', 'RpsRpsController@edit')->name('rpsrps.edit');	
	Route::get('rpsrps/delete/{rec_id}', 'RpsRpsController@delete');

	Route::get('rpsrps/fakultas/{id_fakultas}', 'RpsRpsController@getFakultas')->name('rpsrps.getFakultas');
	Route::get('rpsrps/prodi/{id_prodi}', 'RpsRpsController@getProdi')->name('rpsrps.getProdi');
	Route::get('rpsrps/mk/{id}', 'RpsRpsController@getMk')->name('rpsrps.getMk');


/* routes for RpsSubCpmkAsesmen Controller */
	Route::get('rpssubcpmkasesmen', 'RpsSubCpmkAsesmenController@index')->name('rpssubcpmkasesmen.index');
	Route::get('rpssubcpmkasesmen/index/{filter?}/{filtervalue?}', 'RpsSubCpmkAsesmenController@index')->name('rpssubcpmkasesmen.index');	
	Route::get('rpssubcpmkasesmen/view/{rec_id}', 'RpsSubCpmkAsesmenController@view')->name('rpssubcpmkasesmen.view');	
	Route::get('rpssubcpmkasesmen/add', 'RpsSubCpmkAsesmenController@add')->name('rpssubcpmkasesmen.add');
	Route::post('rpssubcpmkasesmen/add', 'RpsSubCpmkAsesmenController@store')->name('rpssubcpmkasesmen.store');
		
	Route::any('rpssubcpmkasesmen/edit/{rec_id}', 'RpsSubCpmkAsesmenController@edit')->name('rpssubcpmkasesmen.edit');	
	Route::get('rpssubcpmkasesmen/delete/{rec_id}', 'RpsSubCpmkAsesmenController@delete');

/* routes for 00ViewRpsrps Controller */
	Route::get('00viewrpsrps', '00ViewRpsrpsController@index')->name('00viewrpsrps.index');
	Route::get('00viewrpsrps/index/{filter?}/{filtervalue?}', '00ViewRpsrpsController@index')->name('00viewrpsrps.index');

/* routes for PersonalAccessTokens Controller */
	Route::get('personalaccesstokens', 'PersonalAccessTokensController@index')->name('personalaccesstokens.index');
	Route::get('personalaccesstokens/index/{filter?}/{filtervalue?}', 'PersonalAccessTokensController@index')->name('personalaccesstokens.index');

/* routes for PasswordResetTokens Controller */
	Route::get('passwordresettokens', 'PasswordResetTokensController@index')->name('passwordresettokens.index');
	Route::get('passwordresettokens/index/{filter?}/{filtervalue?}', 'PasswordResetTokensController@index')->name('passwordresettokens.index');

/* routes for Migrations Controller */
	Route::get('migrations', 'MigrationsController@index')->name('migrations.index');
	Route::get('migrations/index/{filter?}/{filtervalue?}', 'MigrationsController@index')->name('migrations.index');

/* routes for FailedJobs Controller */
	Route::get('failedjobs', 'FailedJobsController@index')->name('failedjobs.index');
	Route::get('failedjobs/index/{filter?}/{filtervalue?}', 'FailedJobsController@index')->name('failedjobs.index');

/* routes for AaViewRpsrps Controller */

/* routes for RpsStandarCp Controller */
	Route::get('rpsstandarcp', 'RpsStandarCpController@index')->name('rpsstandarcp.index');
	Route::get('rpsstandarcp/index/{filter?}/{filtervalue?}', 'RpsStandarCpController@index')->name('rpsstandarcp.index');

/**
 * All routes which requires auth
 */
Route::middleware(['auth'])->group(function () {
	
	
});


	
Route::get('componentsdata/universitas_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->universitas_id_option_list($request);
	}
);
	
Route::get('componentsdata/id_prodi_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_prodi_option_list($request);
	}
);
	
Route::get('componentsdata/id_siakad_kurikulum_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_siakad_kurikulum_option_list($request);
	}
);
	
Route::get('componentsdata/fakultas_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->fakultas_id_option_list($request);
	}
);
	
Route::get('componentsdata/group_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->group_id_option_list($request);
	}
);
	
Route::get('componentsdata/user_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->user_id_option_list($request);
	}
);
	
Route::get('componentsdata/role_id_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->role_id_option_list($request);
	}
);
	
Route::get('componentsdata/id_jenis_cp_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_jenis_cp_option_list($request);
	}
);
	
Route::get('componentsdata/id_mk_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_mk_option_list($request);
	}
);
	
Route::get('componentsdata/id_cpmk_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_cpmk_option_list($request);
	}
);
	
Route::get('componentsdata/id_rps_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_rps_option_list($request);
	}
);
	
Route::get('componentsdata/id_fakultas_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_fakultas_option_list($request);
	}
);
	
Route::get('componentsdata/rpsrps_id_prodi_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->rpsrps_id_prodi_option_list($request);
	}
);
	
Route::get('componentsdata/rpsrps_id_mk_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->rpsrps_id_mk_option_list($request);
	}
);
	
Route::get('componentsdata/id_otoritas1_option_list',  function(Request $request){
		$compModel = new App\Models\ComponentsData();
		return $compModel->id_otoritas1_option_list($request);
	}
);


Route::post('fileuploader/upload/{fieldname}', 'FileUploaderController@upload');
Route::post('fileuploader/s3upload/{fieldname}', 'FileUploaderController@s3upload');
Route::post('fileuploader/remove_temp_file', 'FileUploaderController@remove_temp_file');


/**
 * All static content routes
 */
Route::get('info/about',  function(){
		return view("pages.info.about");
	}
);
Route::get('info/faq',  function(){
		return view("pages.info.faq");
	}
);

Route::get('info/contact',  function(){
	return view("pages.info.contact");
}
);
Route::get('info/contactsent',  function(){
	return view("pages.info.contactsent");
}
);

Route::post('info/contact',  function(Request $request){
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		$senderName = $request->name;
		$senderEmail = $request->email;
		$message = $request->message;

		$receiverEmail = config("mail.from.address");

		Mail::send(
			'pages.info.contactemail', [
				'name' => $senderName,
				'email' => $senderEmail,
				'comment' => $message
			],
			function ($mail) use ($senderEmail, $receiverEmail) {
				$mail->from($senderEmail);
				$mail->to($receiverEmail)
					->subject('Contact Form');
			}
		);
		return redirect("info/contactsent");
	}
);


Route::get('info/features',  function(){
		return view("pages.info.features");
	}
);
Route::get('info/privacypolicy',  function(){
		return view("pages.info.privacypolicy");
	}
);
Route::get('info/termsandconditions',  function(){
		return view("pages.info.termsandconditions");
	}
);

Route::get('info/changelocale/{locale}', function ($locale) {
	app()->setlocale($locale);
	session()->put('locale', $locale);
    return redirect()->back();
})->name('info.changelocale');
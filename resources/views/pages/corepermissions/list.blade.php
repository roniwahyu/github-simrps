<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $field_name = request()->segment(3);
    $field_value = request()->segment(4);
    $total_records = $records->total();
    $limit = $records->perPage();
    $record_count = count($records);
    $pageTitle = "Corepermissions"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page ajax-page" data-page-type="list" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container-fluid">
            <div class="row justify-content-between align-items-center gap-3">
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Corepermissions</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn " href="<?php print_link("corepermissions/add") ?>" >
                    <i class="fa fa-plus"></i>                              
                    Add New Corepermission 
                </a>
            </div>
            <div class="col-md-3  " >
                <!-- Page drop down search component -->
                <form  class="search" action="{{ url()->current() }}" method="get">
                    <input type="hidden" name="page" value="1" />
                    <div class="input-group">
                        <input value="<?php echo get_value('search'); ?>" class="form-control page-search" type="text" name="search"  placeholder="Search" />
                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<div  class="" >
    <div class="container-fluid">
        <div class="row ">
            <div class="col comp-grid " >
                <div  class=" page-content" >
                    <div id="corepermissions-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/corepermissions/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-id" > Id</th>
                                        <th class="td-id_role" > Id Role</th>
                                        <th class="td-name" > Name</th>
                                        <th class="td-permission" > Permission</th>
                                        <th class="td-action" > Action</th>
                                        <th class="td-isactive" > Isactive</th>
                                        <th class="td-create" > Create</th>
                                        <th class="td-read" > Read</th>
                                        <th class="td-update" > Update</th>
                                        <th class="td-delete" > Delete</th>
                                        <th class="td-setup" > Setup</th>
                                        <th class="td-report" > Report</th>
                                        <th class="td-print" > Print</th>
                                        <th class="td-export" > Export</th>
                                        <th class="td-import" > Import</th>
                                        <th class="td-upload" > Upload</th>
                                        <th class="td-download" > Download</th>
                                        <th class="td-backup" > Backup</th>
                                        <th class="td-restore" > Restore</th>
                                        <th class="td-user_dashboard" > User Dashboard</th>
                                        <th class="td-admin_dashboard" > Admin Dashboard</th>
                                        <th class="td-validation" > Validation</th>
                                        <th class="td-userid" > Userid</th>
                                        <th class="td-created" > Created</th>
                                        <th class="td-modified" > Modified</th>
                                        <th class="td-date_created" > Date Created</th>
                                        <th class="td-date_updated" > Date Updated</th>
                                    </tr>
                                </thead>
                                <?php
                                    if($total_records){
                                ?>
                                <tbody class="page-data">
                                    <!--record-->
                                    <?php
                                        $counter = 0;
                                        foreach($records as $data){
                                        $rec_id = ($data['id'] ? urlencode($data['id']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <?php echo  $data['id'] ; ?>
                                        </td>
                                        <td class="td-id_role">
                                            <?php echo  $data['id_role'] ; ?>
                                        </td>
                                        <td class="td-name">
                                            <?php echo  $data['name'] ; ?>
                                        </td>
                                        <td class="td-permission">
                                            <?php echo  $data['permission'] ; ?>
                                        </td>
                                        <td class="td-action">
                                            <?php echo  $data['action'] ; ?>
                                        </td>
                                        <td class="td-isactive">
                                            <?php echo  $data['isactive'] ; ?>
                                        </td>
                                        <td class="td-create">
                                            <?php echo  $data['create'] ; ?>
                                        </td>
                                        <td class="td-read">
                                            <?php echo  $data['read'] ; ?>
                                        </td>
                                        <td class="td-update">
                                            <?php echo  $data['update'] ; ?>
                                        </td>
                                        <td class="td-delete">
                                            <?php echo  $data['delete'] ; ?>
                                        </td>
                                        <td class="td-setup">
                                            <?php echo  $data['setup'] ; ?>
                                        </td>
                                        <td class="td-report">
                                            <?php echo  $data['report'] ; ?>
                                        </td>
                                        <td class="td-print">
                                            <?php echo  $data['print'] ; ?>
                                        </td>
                                        <td class="td-export">
                                            <?php echo  $data['export'] ; ?>
                                        </td>
                                        <td class="td-import">
                                            <?php echo  $data['import'] ; ?>
                                        </td>
                                        <td class="td-upload">
                                            <?php echo  $data['upload'] ; ?>
                                        </td>
                                        <td class="td-download">
                                            <?php echo  $data['download'] ; ?>
                                        </td>
                                        <td class="td-backup">
                                            <?php echo  $data['backup'] ; ?>
                                        </td>
                                        <td class="td-restore">
                                            <?php echo  $data['restore'] ; ?>
                                        </td>
                                        <td class="td-user_dashboard">
                                            <?php echo  $data['user_dashboard'] ; ?>
                                        </td>
                                        <td class="td-admin_dashboard">
                                            <?php echo  $data['admin_dashboard'] ; ?>
                                        </td>
                                        <td class="td-validation">
                                            <?php echo  $data['validation'] ; ?>
                                        </td>
                                        <td class="td-userid">
                                            <?php echo  $data['userid'] ; ?>
                                        </td>
                                        <td class="td-created">
                                            <?php echo  $data['created'] ; ?>
                                        </td>
                                        <td class="td-modified">
                                            <?php echo  $data['modified'] ; ?>
                                        </td>
                                        <td class="td-date_created">
                                            <?php echo  $data['date_created'] ; ?>
                                        </td>
                                        <td class="td-date_updated">
                                            <?php echo  $data['date_updated'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                                    <!--endrecord-->
                                </tbody>
                                <tbody class="search-data"></tbody>
                                <?php
                                    }
                                    else{
                                ?>
                                <tbody class="page-data">
                                    <tr>
                                        <td class="bg-light text-center text-muted animated bounce p-3" colspan="1000">
                                            <i class="fa fa-ban"></i> No record found
                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                        <?php
                            if($show_footer){
                        ?>
                        <div class=" mt-3">
                            <div class="row align-items-center justify-content-between">    
                                <div class="col-md-auto d-flex">    
                                </div>
                                <div class="col">   
                                    <?php
                                        if($show_pagination == true){
                                        $pager = new Pagination($total_records, $record_count);
                                        $pager->show_page_count = false;
                                        $pager->show_record_count = true;
                                        $pager->show_page_limit =false;
                                        $pager->limit = $limit;
                                        $pager->show_page_number_list = true;
                                        $pager->pager_link_range=5;
                                        $pager->ajax_page = true;
                                        $pager->render();
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


@endsection

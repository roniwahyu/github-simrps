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
    $pageTitle = "Akad Mk"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Akad Mk</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("akadmk/add", true) ?>" >
                    <i class="fa fa-plus"></i>                              
                    Add New Akad Mk 
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
                    <div id="akadmk-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/akadmk/", $field_name, $field_value); ?>
                            <?php Html::display_page_errors($errors); ?>
                            <div class="filter-tags mb-2">
                                <?php Html::filter_tag('search', __('Search')); ?>
                            </div>
                            <table class="table table-hover table-striped table-sm text-left">
                                <thead class="table-header ">
                                    <tr>
                                        <th class="td-checkbox">
                                        <label class="form-check-label">
                                        <input class="toggle-check-all form-check-input" type="checkbox" />
                                        </label>
                                        </th>
                                        <th class="td-id" > Id</th>
                                        <th class="td-kode_mk" > Kode Mk</th>
                                        <th class="td-id_siakad_kurikulum" > Id Siakad Kurikulum</th>
                                        <th class="td-nm_mk" > Nm Mk</th>
                                        <th class="td-jns_mk" > Jns Mk</th>
                                        <th class="td-kurikulum_mk" > Kurikulum Mk</th>
                                        <th class="td-kelompok_mk" > Kelompok Mk</th>
                                        <th class="td-sks_mk" > Sks Mk</th>
                                        <th class="td-sks_tatapmuka" > Sks Tatapmuka</th>
                                        <th class="td-sks_praktikum" > Sks Praktikum</th>
                                        <th class="td-min_mk_lulus" > Min Mk Lulus</th>
                                        <th class="td-status_mk" > Status Mk</th>
                                        <th class="td-upload_silabus_mk" > Upload Silabus Mk</th>
                                        <th class="td-upload_sap_mk" > Upload Sap Mk</th>
                                        <th class="td-upload_bahan_mk" > Upload Bahan Mk</th>
                                        <th class="td-upload_diktat_mk" > Upload Diktat Mk</th>
                                        <th class="td-id_prodi" > Id Prodi</th>
                                        <th class="td-date_created" > Date Created</th>
                                        <th class="td-date_updated" > Date Updated</th>
                                        <th class="td-isactive" > Isactive</th>
                                        <th class="td-semester" > Semester</th>
                                        <th class="td-btn"></th>
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
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-id">
                                            <a href="<?php print_link("/akadmk/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                        </td>
                                        <td class="td-kode_mk">
                                            <?php echo  $data['kode_mk'] ; ?>
                                        </td>
                                        <td class="td-id_siakad_kurikulum">
                                            <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("akadkurikulum/view/$data[id_siakad_kurikulum]?subpage=1") ?>">
                                            <i class="fa fa-eye"></i> <?php echo "Akad Kurikulum" ?>
                                        </a>
                                    </td>
                                    <td class="td-nm_mk">
                                        <?php echo  $data['nm_mk'] ; ?>
                                    </td>
                                    <td class="td-jns_mk">
                                        <?php echo  $data['jns_mk'] ; ?>
                                    </td>
                                    <td class="td-kurikulum_mk">
                                        <?php echo  $data['kurikulum_mk'] ; ?>
                                    </td>
                                    <td class="td-kelompok_mk">
                                        <?php echo  $data['kelompok_mk'] ; ?>
                                    </td>
                                    <td class="td-sks_mk">
                                        <?php echo  $data['sks_mk'] ; ?>
                                    </td>
                                    <td class="td-sks_tatapmuka">
                                        <?php echo  $data['sks_tatapmuka'] ; ?>
                                    </td>
                                    <td class="td-sks_praktikum">
                                        <?php echo  $data['sks_praktikum'] ; ?>
                                    </td>
                                    <td class="td-min_mk_lulus">
                                        <?php echo  $data['min_mk_lulus'] ; ?>
                                    </td>
                                    <td class="td-status_mk">
                                        <?php echo  $data['status_mk'] ; ?>
                                    </td>
                                    <td class="td-upload_silabus_mk">
                                        <?php echo  $data['upload_silabus_mk'] ; ?>
                                    </td>
                                    <td class="td-upload_sap_mk">
                                        <?php echo  $data['upload_sap_mk'] ; ?>
                                    </td>
                                    <td class="td-upload_bahan_mk">
                                        <?php echo  $data['upload_bahan_mk'] ; ?>
                                    </td>
                                    <td class="td-upload_diktat_mk">
                                        <?php echo  $data['upload_diktat_mk'] ; ?>
                                    </td>
                                    <td class="td-id_prodi">
                                        <a size="sm" class="btn btn-sm btn btn-secondary page-modal" href="<?php print_link("akadprodi/view/$data[id_prodi]?subpage=1") ?>">
                                        <i class="fa fa-eye"></i> <?php echo "Akad Prodi" ?>
                                    </a>
                                </td>
                                <td class="td-date_created">
                                    <?php echo  $data['date_created'] ; ?>
                                </td>
                                <td class="td-date_updated">
                                    <?php echo  $data['date_updated'] ; ?>
                                </td>
                                <td class="td-isactive">
                                    <?php echo  $data['isactive'] ; ?>
                                </td>
                                <td class="td-semester">
                                    <?php echo  $data['semester'] ; ?>
                                </td>
                                <!--PageComponentEnd-->
                                <td class="td-btn">
                                    <div class="dropdown" >
                                        <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                        <i class="fa fa-bars"></i> 
                                        </button>
                                        <ul class="dropdown-menu">
                                            <a class="dropdown-item "   href="<?php print_link("akadmk/view/$rec_id"); ?>" >
                                            <i class="fa fa-eye"></i> View
                                        </a>
                                        <a class="dropdown-item "   href="<?php print_link("akadmk/edit/$rec_id"); ?>" >
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("akadmk/delete/$rec_id"); ?>" >
                                    <i class="fa fa-times"></i> Delete
                                </a>
                            </ul>
                        </div>
                    </td>
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
                <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("akadmk/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                <i class="fa fa-times"></i> Delete Selected
                </button>
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

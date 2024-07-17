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
    $pageTitle = "Akad Pt"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Akad Pt</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("akadpt/add", true) ?>" >
                    <i class="fa fa-plus"></i>                              
                    Add New Akad Pt 
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
                    <div id="akadpt-list-records">
                        <div id="page-main-content" class="table-responsive">
                            <div class="ajax-page-load-indicator" style="display:none">
                                <div class="text-center d-flex justify-content-center load-indicator">
                                    <span class="loader mr-3"></span>
                                    <span class="fw-bold">Loading...</span>
                                </div>
                            </div>
                            <?php Html::page_bread_crumb("/akadpt/", $field_name, $field_value); ?>
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
                                        <th class="td-kode_pt" > Kode Pt</th>
                                        <th class="td-nm_pt" > Nm Pt</th>
                                        <th class="td-tgl_pt" > Tgl Pt</th>
                                        <th class="td-sk_pt" > Sk Pt</th>
                                        <th class="td-tgl_sk_pt" > Tgl Sk Pt</th>
                                        <th class="td-almt_pt" > Almt Pt</th>
                                        <th class="td-kota_pt" > Kota Pt</th>
                                        <th class="td-kodepos_pt" > Kodepos Pt</th>
                                        <th class="td-telp_pt" > Telp Pt</th>
                                        <th class="td-fax_pt" > Fax Pt</th>
                                        <th class="td-email_pt" > Email Pt</th>
                                        <th class="td-web_pt" > Web Pt</th>
                                        <th class="td-logo_pt" > Logo Pt</th>
                                        <th class="td-date_created" > Date Created</th>
                                        <th class="td-date_updated" > Date Updated</th>
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
                                        $rec_id = ($data['kode_pt'] ? urlencode($data['kode_pt']) : null);
                                        $counter++;
                                    ?>
                                    <tr>
                                        <td class=" td-checkbox">
                                            <label class="form-check-label">
                                            <input class="optioncheck form-check-input" name="optioncheck[]" value="<?php echo $data['kode_pt'] ?>" type="checkbox" />
                                            </label>
                                        </td>
                                        <!--PageComponentStart-->
                                        <td class="td-kode_pt">
                                            <a href="<?php print_link("/akadpt/view/$data[kode_pt]") ?>"><?php echo $data['kode_pt']; ?></a>
                                        </td>
                                        <td class="td-nm_pt">
                                            <?php echo  $data['nm_pt'] ; ?>
                                        </td>
                                        <td class="td-tgl_pt">
                                            <?php echo  $data['tgl_pt'] ; ?>
                                        </td>
                                        <td class="td-sk_pt">
                                            <?php echo  $data['sk_pt'] ; ?>
                                        </td>
                                        <td class="td-tgl_sk_pt">
                                            <?php echo  $data['tgl_sk_pt'] ; ?>
                                        </td>
                                        <td class="td-almt_pt">
                                            <?php echo  $data['almt_pt'] ; ?>
                                        </td>
                                        <td class="td-kota_pt">
                                            <?php echo  $data['kota_pt'] ; ?>
                                        </td>
                                        <td class="td-kodepos_pt">
                                            <?php echo  $data['kodepos_pt'] ; ?>
                                        </td>
                                        <td class="td-telp_pt">
                                            <?php echo  $data['telp_pt'] ; ?>
                                        </td>
                                        <td class="td-fax_pt">
                                            <?php echo  $data['fax_pt'] ; ?>
                                        </td>
                                        <td class="td-email_pt">
                                            <a href="<?php print_link("mailto:$data[email_pt]") ?>"><?php echo $data['email_pt']; ?></a>
                                        </td>
                                        <td class="td-web_pt">
                                            <?php echo  $data['web_pt'] ; ?>
                                        </td>
                                        <td class="td-logo_pt">
                                            <?php echo  $data['logo_pt'] ; ?>
                                        </td>
                                        <td class="td-date_created">
                                            <?php echo  $data['date_created'] ; ?>
                                        </td>
                                        <td class="td-date_updated">
                                            <?php echo  $data['date_updated'] ; ?>
                                        </td>
                                        <!--PageComponentEnd-->
                                        <td class="td-btn">
                                            <div class="dropdown" >
                                                <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                <i class="fa fa-bars"></i> 
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <a class="dropdown-item "   href="<?php print_link("akadpt/view/$rec_id"); ?>" >
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                                <a class="dropdown-item "   href="<?php print_link("akadpt/edit/$rec_id"); ?>" >
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("akadpt/delete/$rec_id"); ?>" >
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
                        <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("akadpt/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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

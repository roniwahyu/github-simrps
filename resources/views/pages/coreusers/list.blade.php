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
    $pageTitle = "Core Users"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Core Users</div>
                    </div>
                </div>
                <div class="col-auto  " >
                    <a  class="btn btn-primary btn-block" href="<?php print_link("coreusers/add", true) ?>" >
                    <i class="fa fa-plus"></i>                              
                    Add New Core User 
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
                    <div id="coreusers-list-records">
                        <div class="row gutter-lg ">
                            <div class="col">
                                <div id="page-main-content" class="table-responsive">
                                    <div class="ajax-page-load-indicator" style="display:none">
                                        <div class="text-center d-flex justify-content-center load-indicator">
                                            <span class="loader mr-3"></span>
                                            <span class="fw-bold">Loading...</span>
                                        </div>
                                    </div>
                                    <?php Html::page_bread_crumb("/coreusers/", $field_name, $field_value); ?>
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
                                                <th class="td-" > </th><th class="td-id" > Id</th>
                                                <th class="td-ip_address" > Ip Address</th>
                                                <th class="td-username" > Username</th>
                                                <th class="td-email" > Email</th>
                                                <th class="td-email_login_hash" > Email Login Hash</th>
                                                <th class="td-activation_selector" > Activation Selector</th>
                                                <th class="td-activation_code" > Activation Code</th>
                                                <th class="td-remember_selector" > Remember Selector</th>
                                                <th class="td-remember_code" > Remember Code</th>
                                                <th class="td-created_on" > Created On</th>
                                                <th class="td-last_login" > Last Login</th>
                                                <th class="td-active" > Active</th>
                                                <th class="td-first_name" > First Name</th>
                                                <th class="td-last_name" > Last Name</th>
                                                <th class="td-company" > Company</th>
                                                <th class="td-phone" > Phone</th>
                                                <th class="td-picture" > Picture</th>
                                                <th class="td-oauth_provider" > Oauth Provider</th>
                                                <th class="td-oauth_uid" > Oauth Uid</th>
                                                <th class="td-created" > Created</th>
                                                <th class="td-nim" > Nim</th>
                                                <th class="td-claimed" > Claimed</th>
                                                <th class="td-wa_activated" > Wa Activated</th>
                                                <th class="td-email_activated" > Email Activated</th>
                                                <th class="td-activated" > Activated</th>
                                                <th class="td-otp" > Otp</th>
                                                <th class="td-otp_login_code" > Otp Login Code</th>
                                                <th class="td-otp_backup_code" > Otp Backup Code</th>
                                                <th class="td-user_role_id" > User Role Id</th>
                                                <th class="td-date_created" > Date Created</th>
                                                <th class="td-date_updated" > Date Updated</th>
                                                <th class="td-user_group_id" > User Group Id</th>
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
                                                <td class="td-masterdetailbtn">
                                                    <a data-page-id="coreusers-detail-page" class="btn btn-sm btn-secondary open-master-detail-page" href="<?php print_link("coreusers/masterdetail/$data[id]"); ?>">
                                                    <i class="fa fa-ellipsis-v"></i> 
                                                </a>
                                            </td>
                                            <td class="td-id">
                                                <a href="<?php print_link("/coreusers/view/$data[id]") ?>"><?php echo $data['id']; ?></a>
                                            </td>
                                            <td class="td-ip_address">
                                                <?php echo  $data['ip_address'] ; ?>
                                            </td>
                                            <td class="td-username">
                                                <?php echo  $data['username'] ; ?>
                                            </td>
                                            <td class="td-email">
                                                <a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a>
                                            </td>
                                            <td class="td-email_login_hash">
                                                <a href="<?php print_link("mailto:$data[email_login_hash]") ?>"><?php echo $data['email_login_hash']; ?></a>
                                            </td>
                                            <td class="td-activation_selector">
                                                <?php echo  $data['activation_selector'] ; ?>
                                            </td>
                                            <td class="td-activation_code">
                                                <?php echo  $data['activation_code'] ; ?>
                                            </td>
                                            <td class="td-remember_selector">
                                                <?php echo  $data['remember_selector'] ; ?>
                                            </td>
                                            <td class="td-remember_code">
                                                <?php echo  $data['remember_code'] ; ?>
                                            </td>
                                            <td class="td-created_on">
                                                <?php echo  $data['created_on'] ; ?>
                                            </td>
                                            <td class="td-last_login">
                                                <?php echo  $data['last_login'] ; ?>
                                            </td>
                                            <td class="td-active">
                                                <?php echo  $data['active'] ; ?>
                                            </td>
                                            <td class="td-first_name">
                                                <?php echo  $data['first_name'] ; ?>
                                            </td>
                                            <td class="td-last_name">
                                                <?php echo  $data['last_name'] ; ?>
                                            </td>
                                            <td class="td-company">
                                                <?php echo  $data['company'] ; ?>
                                            </td>
                                            <td class="td-phone">
                                                <a href="<?php print_link("tel:$data[phone]") ?>"><?php echo $data['phone']; ?></a>
                                            </td>
                                            <td class="td-picture">
                                                <?php 
                                                    Html :: page_img($data['picture'], '50px', '50px', "small", 1); 
                                                ?>
                                            </td>
                                            <td class="td-oauth_provider">
                                                <?php echo  $data['oauth_provider'] ; ?>
                                            </td>
                                            <td class="td-oauth_uid">
                                                <?php echo  $data['oauth_uid'] ; ?>
                                            </td>
                                            <td class="td-created">
                                                <?php echo  $data['created'] ; ?>
                                            </td>
                                            <td class="td-nim">
                                                <?php echo  $data['nim'] ; ?>
                                            </td>
                                            <td class="td-claimed">
                                                <?php echo  $data['claimed'] ; ?>
                                            </td>
                                            <td class="td-wa_activated">
                                                <?php echo  $data['wa_activated'] ; ?>
                                            </td>
                                            <td class="td-email_activated">
                                                <a href="<?php print_link("mailto:$data[email_activated]") ?>"><?php echo $data['email_activated']; ?></a>
                                            </td>
                                            <td class="td-activated">
                                                <?php echo  $data['activated'] ; ?>
                                            </td>
                                            <td class="td-otp">
                                                <?php echo  $data['otp'] ; ?>
                                            </td>
                                            <td class="td-otp_login_code">
                                                <?php echo  $data['otp_login_code'] ; ?>
                                            </td>
                                            <td class="td-otp_backup_code">
                                                <?php echo  $data['otp_backup_code'] ; ?>
                                            </td>
                                            <td class="td-user_role_id">
                                                <?php echo  $data['user_role_id'] ; ?>
                                            </td>
                                            <td class="td-date_created">
                                                <?php echo  $data['date_created'] ; ?>
                                            </td>
                                            <td class="td-date_updated">
                                                <?php echo  $data['date_updated'] ; ?>
                                            </td>
                                            <td class="td-user_group_id">
                                                <?php echo  $data['user_group_id'] ; ?>
                                            </td>
                                            <!--PageComponentEnd-->
                                            <td class="td-btn">
                                                <div class="dropdown" >
                                                    <button data-bs-toggle="dropdown" class="dropdown-toggle btn text-primary btn-flat btn-sm">
                                                    <i class="fa fa-bars"></i> 
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <a class="dropdown-item "   href="<?php print_link("coreusers/view/$rec_id"); ?>" >
                                                        <i class="fa fa-eye"></i> View
                                                    </a>
                                                    <a class="dropdown-item "   href="<?php print_link("coreusers/edit/$rec_id"); ?>" >
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a class="dropdown-item record-delete-btn" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal" href="<?php print_link("coreusers/delete/$rec_id"); ?>" >
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
                            <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("coreusers/delete/{sel_ids}"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
            <!-- Detail Page Column -->
            <?php if(!request()->has('subpage')){ ?>
            <div class="col-12">
                <div class=" ">
                    <div id="coreusers-detail-page" class="master-detail-page"></div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>


@endsection

<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Core Role"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="add" data-page-url="{{ url()->full() }}">
    <?php
        if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3" >
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto  back-btn-col" >
                    <a class="back-btn btn " href="{{ url()->previous() }}" >
                        <i class="fa fa-angle-left"></i>                                
                    </a>
                </div>
                <div class="col  " >
                    <div class="">
                        <div class="h5 font-weight-bold text-primary">Add New Core Role</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
    <div  class="" >
        <div class="container">
            <div class="row ">
                <div class="col-md-9 comp-grid " >
                    <div  class="card card-1 border rounded page-content" >
                        <!--[form-start]-->
                        <form id="coreroles-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('coreroles.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="role_name">Role Name </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-role_name-holder" class=" ">
                                                <input id="ctrl-role_name" data-field="role_name"  value="<?php echo get_value('role_name') ?>" type="text" placeholder="Enter Role Name"  name="role_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="description">Description </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-description-holder" class=" ">
                                                <textarea placeholder="Enter Description" id="ctrl-description" data-field="description"  rows="5" name="description" class=" form-control"><?php echo get_value('description') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="isactive">Isactive </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-isactive-holder" class=" ">
                                                <select  id="ctrl-isactive" data-field="isactive" name="isactive"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php
                                                    $options = Menu::isactive();
                                                    if(!empty($options)){
                                                    foreach($options as $option){
                                                    $value = $option['value'];
                                                    $label = $option['label'];
                                                    $selected = Html::get_field_selected('isactive', $value, "");
                                                ?>
                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                <?php echo $label ?>
                                                </option>                                   
                                                <?php
                                                    }
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="userid">Userid </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-userid-holder" class=" ">
                                                <input id="ctrl-userid" data-field="userid"  value="<?php echo get_value('userid') ?>" type="number" placeholder="Enter Userid" step="any"  name="userid"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="created">Created </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-created-holder" class="input-group ">
                                                <input id="ctrl-created" data-field="created" class="form-control datepicker  datepicker" value="<?php echo get_value('created') ?>" type="datetime"  name="created" placeholder="Enter Created" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="modified">Modified </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-modified-holder" class="input-group ">
                                                <input id="ctrl-modified" data-field="modified" class="form-control datepicker  datepicker" value="<?php echo get_value('modified') ?>" type="datetime"  name="modified" placeholder="Enter Modified" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="deleted">Deleted </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-deleted-holder" class="input-group ">
                                                <input id="ctrl-deleted" data-field="deleted" class="form-control datepicker  datepicker" value="<?php echo get_value('deleted') ?>" type="datetime"  name="deleted" placeholder="Enter Deleted" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="key">Key </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-key-holder" class=" ">
                                                <input id="ctrl-key" data-field="key"  value="<?php echo get_value('key') ?>" type="text" placeholder="Enter Key"  name="key"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <!--[form-button-start]-->
                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                <button class="btn btn-primary" type="submit">
                                Submit
                                <i class="fa fa-send"></i>
                                </button>
                            </div>
                            <!--[form-button-end]-->
                        </form>
                        <!--[form-end]-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

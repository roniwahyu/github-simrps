<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Rps Sub Cpmk Asesman"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Rps Sub Cpmk Asesman</div>
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
                        <form id="rpssubcpmkasesmen-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('rpssubcpmkasesmen.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_sub_cpmk">Id Sub Cpmk </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_sub_cpmk-holder" class=" ">
                                                <input id="ctrl-id_sub_cpmk" data-field="id_sub_cpmk"  value="<?php echo get_value('id_sub_cpmk') ?>" type="number" placeholder="Enter Id Sub Cpmk" step="any"  name="id_sub_cpmk"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_asesmen">Id Asesmen </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_asesmen-holder" class=" ">
                                                <input id="ctrl-id_asesmen" data-field="id_asesmen"  value="<?php echo get_value('id_asesmen') ?>" type="number" placeholder="Enter Id Asesmen" step="any"  name="id_asesmen"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="bobot">Bobot </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-bobot-holder" class=" ">
                                                <input id="ctrl-bobot" data-field="bobot"  value="<?php echo get_value('bobot') ?>" type="number" placeholder="Enter Bobot" step="0.1"  name="bobot"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="subtotal">Subtotal </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-subtotal-holder" class=" ">
                                                <input id="ctrl-subtotal" data-field="subtotal"  value="<?php echo get_value('subtotal') ?>" type="number" placeholder="Enter Subtotal" step="0.1"  name="subtotal"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="date_update">Date Update </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-date_update-holder" class="input-group ">
                                                <input id="ctrl-date_update" data-field="date_update" class="form-control datepicker  datepicker" value="<?php echo get_value('date_update') ?>" type="datetime"  name="date_update" placeholder="Enter Date Update" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
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

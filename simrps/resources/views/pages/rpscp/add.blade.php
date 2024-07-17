<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Rps Cp"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Rps Cp</div>
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
                        <form id="rpscp-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('rpscp.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_prodi">Id Prodi </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_prodi-holder" class=" ">
                                                <input id="ctrl-id_prodi" data-field="id_prodi"  value="<?php echo get_value('id_prodi') ?>" type="number" placeholder="Enter Id Prodi" step="any"  name="id_prodi"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="kode_cp">Kode Cp </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-kode_cp-holder" class=" ">
                                                <input id="ctrl-kode_cp" data-field="kode_cp"  value="<?php echo get_value('kode_cp') ?>" type="text" placeholder="Enter Kode Cp"  name="kode_cp"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="nama_cp">Nama Cp </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-nama_cp-holder" class=" ">
                                                <textarea placeholder="Enter Nama Cp" id="ctrl-nama_cp" data-field="nama_cp"  rows="5" name="nama_cp" class=" form-control"><?php echo get_value('nama_cp') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="deskripsi">Deskripsi </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-deskripsi-holder" class=" ">
                                                <textarea placeholder="Enter Deskripsi" id="ctrl-deskripsi" data-field="deskripsi"  rows="5" name="deskripsi" class=" form-control"><?php echo get_value('deskripsi') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_jenis_cp">Id Jenis Cp </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_jenis_cp-holder" class=" ">
                                                <select  id="ctrl-id_jenis_cp" data-field="id_jenis_cp" name="id_jenis_cp"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->id_jenis_cp_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_jenis_cp', $value, "");
                                                ?>
                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                <?php echo $label; ?>
                                                </option>
                                                <?php
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

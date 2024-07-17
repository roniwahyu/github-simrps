<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Akad Mk Syarat"; //set dynamic page title
?>
@extends($layout)
@section('title', $pageTitle)
@section('content')
<section class="page" data-page-type="edit" data-page-url="{{ url()->full() }}">
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
                        <div class="h5 font-weight-bold text-primary">Edit Akad Mk Syarat</div>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("akadmksyarat/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="id_prodi">Id Prodi <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-id_prodi-holder" class=" ">
                                            <input id="ctrl-id_prodi" data-field="id_prodi"  value="<?php  echo $data['id_prodi']; ?>" type="number" placeholder="Enter Id Prodi" step="any"  required="" name="id_prodi"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="kode_mk_main">Kode Mk Main <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-kode_mk_main-holder" class=" ">
                                            <input id="ctrl-kode_mk_main" data-field="kode_mk_main"  value="<?php  echo $data['kode_mk_main']; ?>" type="text" placeholder="Enter Kode Mk Main"  required="" name="kode_mk_main"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="kode_mk_syarat">Kode Mk Syarat <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-kode_mk_syarat-holder" class=" ">
                                            <input id="ctrl-kode_mk_syarat" data-field="kode_mk_syarat"  value="<?php  echo $data['kode_mk_syarat']; ?>" type="text" placeholder="Enter Kode Mk Syarat"  required="" name="kode_mk_syarat"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="nil_mk_syarat">Nil Mk Syarat <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-nil_mk_syarat-holder" class=" ">
                                            <select required=""  id="ctrl-nil_mk_syarat" data-field="nil_mk_syarat" name="nil_mk_syarat"  placeholder="Select a value ..."    class="form-select" >
                                            <option value="">Select a value ...</option>
                                            <?php
                                                $options = Menu::minMkLulus();
                                                $field_value = $data['nil_mk_syarat'];
                                                if(!empty($options)){
                                                foreach($options as $option){
                                                $value = $option['value'];
                                                $label = $option['label'];
                                                $selected = Html::get_record_selected($field_value, $value);
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
                                        <label class="control-label" for="nil_angka_mk_syarat">Nil Angka Mk Syarat <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-nil_angka_mk_syarat-holder" class=" ">
                                            <input id="ctrl-nil_angka_mk_syarat" data-field="nil_angka_mk_syarat"  value="<?php  echo $data['nil_angka_mk_syarat']; ?>" type="number" placeholder="Enter Nil Angka Mk Syarat" step="0.1"  required="" name="nil_angka_mk_syarat"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="urut_syarat">Urut Syarat </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-urut_syarat-holder" class=" ">
                                            <input id="ctrl-urut_syarat" data-field="urut_syarat"  value="<?php  echo $data['urut_syarat']; ?>" type="number" placeholder="Enter Urut Syarat" step="any"  name="urut_syarat"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-ajax-status"></div>
                        <!--[form-content-end]-->
                        <!--[form-button-start]-->
                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">
                            Update
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

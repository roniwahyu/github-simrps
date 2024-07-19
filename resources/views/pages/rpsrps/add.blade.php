<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Rps Rp"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Rps Rp</div>
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
                        <form id="rpsrps-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('rpsrps.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_fakultas">Id Fakultas </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_fakultas-holder" class=" ">
                                                <select  id="ctrl-id_fakultas" data-field="id_fakultas" name="id_fakultas"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->id_fakultas_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_fakultas', $value, "");
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
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_prodi">Id Prodi </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_prodi-holder" class=" ">
                                                <select  id="ctrl-id_prodi" data-field="id_prodi" name="id_prodi"  placeholder="Select a value ..."    class="form-select" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->rpsrps_id_prodi_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_prodi', $value, "");
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
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_mk">Id Mk </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_mk-holder" class=" ">
                                                <select  id="ctrl-id_mk" data-field="id_mk" name="id_mk"  placeholder="Select a value ..."    class="selectize" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->rpsrps_id_mk_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_mk', $value, "");
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
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_otoritas1">Id Otoritas1 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_otoritas1-holder" class=" ">
                                                <select  id="ctrl-id_otoritas1" data-field="id_otoritas1" name="id_otoritas1"  placeholder="Select a value ..."    class="selectize" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->id_otoritas1_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_otoritas1', $value, "");
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
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="id_otoritas2">Id Otoritas2 </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-id_otoritas2-holder" class=" ">
                                                <select  id="ctrl-id_otoritas2" data-field="id_otoritas2" name="id_otoritas2"  placeholder="Select a value ..."    class="selectize" >
                                                <option value="">Select a value ...</option>
                                                <?php 
                                                    $options = $comp_model->id_otoritas1_option_list() ?? [];
                                                    foreach($options as $option){
                                                    $value = $option->value;
                                                    $label = $option->label ?? $value;
                                                    $selected = Html::get_field_selected('id_otoritas2', $value, "");
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
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="deskripsi_rps">Deskripsi Rps </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-deskripsi_rps-holder" class=" ">
                                                <textarea placeholder="Enter Deskripsi Rps" id="ctrl-deskripsi_rps" data-field="deskripsi_rps"  rows="5" name="deskripsi_rps" class=" form-control"><?php echo get_value('deskripsi_rps') ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-ajax-status"></div>
                            <div class="bg-light p-2 subform">
                                <h4 class="record-title">Add New Rps Cp Rp</h4>
                                <hr />
                                @csrf
                                <div>
                                    <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                                        <thead>
                                            <tr>
                                                <th class="bg-light"><label for="nama_cp">Nama Cp</label></th>
                                                <th class="bg-light"><label for="id_cp">Id Cp</label></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th colspan="100" class="text-right">
                                            <?php $template_id = "table-row-" . random_str(); ?>
                                            <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-success btn-add-table-row"><i class="fa fa-plus"></i></button>
                                            </th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <!--[table row template]-->
                                    <template id="<?php echo $template_id ?>">
                                    <?php $row = "CURRENTROW"; // will be replaced with current row index. ?>
                                    <tr data-row="<?php echo $row ?>" class="input-row">
                                    <td>
                                        <div id="ctrl-nama_cp-row<?php echo $row; ?>-holder" class=" ">
                                        <input id="ctrl-nama_cp-row<?php echo $row; ?>" data-field="nama_cp"  value="<?php echo get_value('nama_cp') ?>" type="text" placeholder="Enter Nama Cp"  name="rpscprps[<?php echo $row ?>][nama_cp]"  class="form-control " />
                                    </div>
                                </td>
                                <td>
                                    <div id="ctrl-id_cp-row<?php echo $row; ?>-holder" class=" ">
                                    <input id="ctrl-id_cp-row<?php echo $row; ?>" data-field="id_cp"  value="<?php echo get_value('id_cp') ?>" type="number" placeholder="Enter Id Cp" step="any"  name="rpscprps[<?php echo $row ?>][id_cp]"  class="form-control " />
                                </div>
                            </td>
                            <th class="text-center">
                            <button type="button" class="btn-close btn-remove-table-row"></button>
                            </th>
                        </tr>
                    </template>
                    <!--[/table row template]-->
                </div>
                <div class="form-ajax-status"></div>
            </div>
            <div class="bg-light p-2 subform">
                <h4 class="record-title">Add New Rps Cp Mk</h4>
                <hr />
                @csrf
                <div>
                    <table class="table table-striped table-sm" data-maxrow="10" data-minrow="1">
                        <thead>
                            <tr>
                                <th class="bg-light"><label for="id_mk">Id Mk</label></th>
                                <th class="bg-light"><label for="nama_cp">Nama Cp</label></th>
                                <th class="bg-light"><label for="deskripsi">Deskripsi</label></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="100" class="text-right">
                            <?php $template_id = "table-row-" . random_str(); ?>
                            <button type="button" data-template="#<?php echo $template_id ?>" class="btn btn-sm btn-success btn-add-table-row"><i class="fa fa-plus"></i></button>
                            </th>
                        </tr>
                        </tfoot>
                    </table>
                    <!--[table row template]-->
                    <template id="<?php echo $template_id ?>">
                    <?php $row = "CURRENTROW"; // will be replaced with current row index. ?>
                    <tr data-row="<?php echo $row ?>" class="input-row">
                    <td>
                        <div id="ctrl-id_mk-row<?php echo $row; ?>-holder" class=" ">
                        <select  id="ctrl-id_mk-row<?php echo $row; ?>" data-field="id_mk" name="rpscpmk[<?php echo $row ?>][id_mk]"  placeholder="Select a value ..."    class="form-select" >
                        <option value="">Select a value ...</option>
                        <?php 
                            $options = $comp_model->id_mk_option_list() ?? [];
                            foreach($options as $option){
                            $value = $option->value;
                            $label = $option->label ?? $value;
                            $selected = Html::get_field_selected('id_mk', $value, "");
                        ?>
                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                        <?php echo $label; ?>
                        </option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div id="ctrl-nama_cp-row<?php echo $row; ?>-holder" class=" ">
                    <input id="ctrl-nama_cp-row<?php echo $row; ?>" data-field="nama_cp"  value="<?php echo get_value('nama_cp') ?>" type="text" placeholder="Enter Nama Cp"  name="rpscpmk[<?php echo $row ?>][nama_cp]"  class="form-control " />
                </div>
            </td>
            <td>
                <div id="ctrl-deskripsi-row<?php echo $row; ?>-holder" class=" ">
                <input id="ctrl-deskripsi-row<?php echo $row; ?>" data-field="deskripsi"  value="<?php echo get_value('deskripsi') ?>" type="text" placeholder="Enter Deskripsi"  name="rpscpmk[<?php echo $row ?>][deskripsi]"  class="form-control " />
            </div>
        </td>
        <th class="text-center">
        <button type="button" class="btn-close btn-remove-table-row"></button>
        </th>
    </tr>
</template>
<!--[/table row template]-->
</div>
<div class="form-ajax-status"></div>
</div>
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

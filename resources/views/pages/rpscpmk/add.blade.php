<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Rps Cp Mk"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Rps Cp Mk</div>
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
                        <form id="rpscpmk-add-form"  novalidate role="form" enctype="multipart/form-data" class="form multi-form page-form" action="{{ route('rpscpmk.store') }}" method="post" >
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
                                    <select  id="ctrl-id_mk-row<?php echo $row; ?>" data-field="id_mk" name="row[<?php echo $row ?>][id_mk]"  placeholder="Select a value ..."    class="form-select" >
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
                                <input id="ctrl-nama_cp-row<?php echo $row; ?>" data-field="nama_cp"  value="<?php echo get_value('nama_cp') ?>" type="text" placeholder="Enter Nama Cp"  name="row[<?php echo $row ?>][nama_cp]"  class="form-control " />
                            </div>
                        </td>
                        <td>
                            <div id="ctrl-deskripsi-row<?php echo $row; ?>-holder" class=" ">
                            <input id="ctrl-deskripsi-row<?php echo $row; ?>" data-field="deskripsi"  value="<?php echo get_value('deskripsi') ?>" type="text" placeholder="Enter Deskripsi"  name="row[<?php echo $row ?>][deskripsi]"  class="form-control " />
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

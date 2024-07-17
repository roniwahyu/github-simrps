<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Edit Akad Pt"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Edit Akad Pt</div>
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
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-horizontal needs-validation" action="<?php print_link("akadpt/edit/$rec_id"); ?>" method="post">
                        <!--[form-content-start]-->
                        @csrf
                        <div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="kode_pt">Kode Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-kode_pt-holder" class=" ">
                                            <input id="ctrl-kode_pt" data-field="kode_pt"  value="<?php  echo $data['kode_pt']; ?>" type="text" placeholder="Enter Kode Pt"  required="" name="kode_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="nm_pt">Nm Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-nm_pt-holder" class=" ">
                                            <input id="ctrl-nm_pt" data-field="nm_pt"  value="<?php  echo $data['nm_pt']; ?>" type="text" placeholder="Enter Nm Pt"  required="" name="nm_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="tgl_pt">Tgl Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-tgl_pt-holder" class="input-group ">
                                            <input id="ctrl-tgl_pt" data-field="tgl_pt" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['tgl_pt']; ?>" type="datetime" name="tgl_pt" placeholder="Enter Tgl Pt" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="sk_pt">Sk Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-sk_pt-holder" class=" ">
                                            <input id="ctrl-sk_pt" data-field="sk_pt"  value="<?php  echo $data['sk_pt']; ?>" type="text" placeholder="Enter Sk Pt"  required="" name="sk_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="tgl_sk_pt">Tgl Sk Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-tgl_sk_pt-holder" class="input-group ">
                                            <input id="ctrl-tgl_sk_pt" data-field="tgl_sk_pt" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['tgl_sk_pt']; ?>" type="datetime" name="tgl_sk_pt" placeholder="Enter Tgl Sk Pt" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="almt_pt">Almt Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-almt_pt-holder" class=" ">
                                            <input id="ctrl-almt_pt" data-field="almt_pt"  value="<?php  echo $data['almt_pt']; ?>" type="text" placeholder="Enter Almt Pt"  required="" name="almt_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="kota_pt">Kota Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-kota_pt-holder" class=" ">
                                            <input id="ctrl-kota_pt" data-field="kota_pt"  value="<?php  echo $data['kota_pt']; ?>" type="text" placeholder="Enter Kota Pt"  required="" name="kota_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="kodepos_pt">Kodepos Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-kodepos_pt-holder" class=" ">
                                            <input id="ctrl-kodepos_pt" data-field="kodepos_pt"  value="<?php  echo $data['kodepos_pt']; ?>" type="text" placeholder="Enter Kodepos Pt"  required="" name="kodepos_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="telp_pt">Telp Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-telp_pt-holder" class=" ">
                                            <input id="ctrl-telp_pt" data-field="telp_pt"  value="<?php  echo $data['telp_pt']; ?>" type="text" placeholder="Enter Telp Pt"  required="" name="telp_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="fax_pt">Fax Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-fax_pt-holder" class=" ">
                                            <input id="ctrl-fax_pt" data-field="fax_pt"  value="<?php  echo $data['fax_pt']; ?>" type="text" placeholder="Enter Fax Pt"  required="" name="fax_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="email_pt">Email Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-email_pt-holder" class=" ">
                                            <input id="ctrl-email_pt" data-field="email_pt"  value="<?php  echo $data['email_pt']; ?>" type="email" placeholder="Enter Email Pt"  required="" name="email_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="web_pt">Web Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-web_pt-holder" class=" ">
                                            <input id="ctrl-web_pt" data-field="web_pt"  value="<?php  echo $data['web_pt']; ?>" type="text" placeholder="Enter Web Pt"  required="" name="web_pt"  class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="control-label" for="logo_pt">Logo Pt <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div id="ctrl-logo_pt-holder" class=" ">
                                            <input id="ctrl-logo_pt" data-field="logo_pt"  value="<?php  echo $data['logo_pt']; ?>" type="text" placeholder="Enter Logo Pt"  required="" name="logo_pt"  class="form-control " />
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

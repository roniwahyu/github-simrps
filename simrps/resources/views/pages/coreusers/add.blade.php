<!-- 
expose component model to current view
e.g $arrDataFromDb = $comp_model->fetchData(); //function name
-->
@inject('comp_model', 'App\Models\ComponentsData')
<?php
    $pageTitle = "Add New Core User"; //set dynamic page title
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
                        <div class="h5 font-weight-bold text-primary">Add New Core User</div>
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
                        <form id="coreusers-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="{{ route('coreusers.store') }}" method="post">
                            @csrf
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ip_address">Ip Address </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-ip_address-holder" class=" ">
                                                <input id="ctrl-ip_address" data-field="ip_address"  value="<?php echo get_value('ip_address') ?>" type="text" placeholder="Enter Ip Address"  name="ip_address"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="username">Username </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-username-holder" class=" ">
                                                <input id="ctrl-username" data-field="username"  value="<?php echo get_value('username') ?>" type="text" placeholder="Enter Username"  name="username"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="password">Password <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-password-holder" class="input-group ">
                                                <input id="ctrl-password" data-field="password"  value="<?php echo get_value('password') ?>" type="password" placeholder="Enter Password"  required="" name="password"  class="form-control  password password-strength" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="fw-bold">Should contain</small>
                                                <small class="length chip">6 Characters minimum</small>
                                                <small class="caps chip">Capital Letter</small>
                                                <small class="number chip">Number</small>
                                                <small class="special chip">Symbol</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="confirm_password">Confirm Password <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-confirm_password-holder" class="input-group ">
                                                <input id="ctrl-password-confirm" data-match="#ctrl-password"  class="form-control password-confirm " type="password" name="confirm_password" required placeholder="Confirm Password" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Password does not match
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email">Email <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email-holder" class=" ">
                                                <input id="ctrl-email" data-field="email"  value="<?php echo get_value('email') ?>" type="email" placeholder="Enter Email"  required="" name="email"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email_login_hash">Email Login Hash </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email_login_hash-holder" class=" ">
                                                <input id="ctrl-email_login_hash" data-field="email_login_hash"  value="<?php echo get_value('email_login_hash') ?>" type="email" placeholder="Enter Email Login Hash"  name="email_login_hash"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="activation_selector">Activation Selector </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-activation_selector-holder" class=" ">
                                                <input id="ctrl-activation_selector" data-field="activation_selector"  value="<?php echo get_value('activation_selector') ?>" type="text" placeholder="Enter Activation Selector"  name="activation_selector"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="activation_code">Activation Code </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-activation_code-holder" class=" ">
                                                <input id="ctrl-activation_code" data-field="activation_code"  value="<?php echo get_value('activation_code') ?>" type="text" placeholder="Enter Activation Code"  name="activation_code"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="forgotten_password_selector">Forgotten Password Selector </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-forgotten_password_selector-holder" class="input-group ">
                                                <input id="ctrl-forgotten_password_selector" data-field="forgotten_password_selector"  value="<?php echo get_value('forgotten_password_selector') ?>" type="password" placeholder="Enter Forgotten Password Selector"  name="forgotten_password_selector"  class="form-control  password password-strength" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="fw-bold">Should contain</small>
                                                <small class="length chip">6 Characters minimum</small>
                                                <small class="caps chip">Capital Letter</small>
                                                <small class="number chip">Number</small>
                                                <small class="special chip">Symbol</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="confirm_password">Confirm Password </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-confirm_password-holder" class="input-group ">
                                                <input id="ctrl-forgotten_password_selector-confirm" data-match="#ctrl-forgotten_password_selector"  class="form-control password-confirm " type="password" name="confirm_password"  placeholder="Confirm Password" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Password does not match
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="forgotten_password_code">Forgotten Password Code </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-forgotten_password_code-holder" class="input-group ">
                                                <input id="ctrl-forgotten_password_code" data-field="forgotten_password_code"  value="<?php echo get_value('forgotten_password_code') ?>" type="password" placeholder="Enter Forgotten Password Code"  name="forgotten_password_code"  class="form-control  password password-strength" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                            </div>
                                            <div class="password-strength-msg">
                                                <small class="fw-bold">Should contain</small>
                                                <small class="length chip">6 Characters minimum</small>
                                                <small class="caps chip">Capital Letter</small>
                                                <small class="number chip">Number</small>
                                                <small class="special chip">Symbol</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="confirm_password">Confirm Password </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-confirm_password-holder" class="input-group ">
                                                <input id="ctrl-forgotten_password_code-confirm" data-match="#ctrl-forgotten_password_code"  class="form-control password-confirm " type="password" name="confirm_password"  placeholder="Confirm Password" />
                                                <button type="button" class="btn btn-outline-secondary btn-toggle-password">
                                                <i class="fa fa-eye"></i>
                                                </button>
                                                <div class="invalid-feedback">
                                                    Password does not match
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="forgotten_password_time">Forgotten Password Time </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-forgotten_password_time-holder" class=" ">
                                                <input id="ctrl-forgotten_password_time" data-field="forgotten_password_time"  value="<?php echo get_value('forgotten_password_time') ?>" type="number" placeholder="Enter Forgotten Password Time" step="any"  name="forgotten_password_time"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="remember_selector">Remember Selector </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-remember_selector-holder" class=" ">
                                                <input id="ctrl-remember_selector" data-field="remember_selector"  value="<?php echo get_value('remember_selector') ?>" type="text" placeholder="Enter Remember Selector"  name="remember_selector"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="remember_code">Remember Code </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-remember_code-holder" class=" ">
                                                <input id="ctrl-remember_code" data-field="remember_code"  value="<?php echo get_value('remember_code') ?>" type="text" placeholder="Enter Remember Code"  name="remember_code"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="created_on">Created On </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-created_on-holder" class=" ">
                                                <input id="ctrl-created_on" data-field="created_on"  value="<?php echo get_value('created_on') ?>" type="number" placeholder="Enter Created On" step="any"  name="created_on"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="last_login">Last Login </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-last_login-holder" class=" ">
                                                <input id="ctrl-last_login" data-field="last_login"  value="<?php echo get_value('last_login') ?>" type="number" placeholder="Enter Last Login" step="any"  name="last_login"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="active">Active </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-active-holder" class=" ">
                                                <input id="ctrl-active" data-field="active"  value="<?php echo get_value('active') ?>" type="number" placeholder="Enter Active" step="any"  name="active"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="first_name">First Name </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-first_name-holder" class=" ">
                                                <input id="ctrl-first_name" data-field="first_name"  value="<?php echo get_value('first_name') ?>" type="text" placeholder="Enter First Name"  name="first_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="last_name">Last Name </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-last_name-holder" class=" ">
                                                <input id="ctrl-last_name" data-field="last_name"  value="<?php echo get_value('last_name') ?>" type="text" placeholder="Enter Last Name"  name="last_name"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="company">Company </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-company-holder" class=" ">
                                                <input id="ctrl-company" data-field="company"  value="<?php echo get_value('company') ?>" type="text" placeholder="Enter Company"  name="company"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="phone">Phone </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-phone-holder" class=" ">
                                                <input id="ctrl-phone" data-field="phone"  value="<?php echo get_value('phone') ?>" type="text" placeholder="Enter Phone"  name="phone"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="picture">Picture </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-picture-holder" class=" ">
                                                <div class="dropzone " input="#ctrl-picture" fieldname="picture" uploadurl="{{ url('fileuploader/upload/picture') }}"    data-multiple="false" dropmsg="Choose files or drop files here"    btntext="Browse" extensions=".jpg,.png,.gif,.jpeg" filesize="3" maximum="1">
                                                    <input name="picture" id="ctrl-picture" data-field="picture" class="dropzone-input form-control" value="<?php echo get_value('picture') ?>" type="text"  />
                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="oauth_provider">Oauth Provider </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-oauth_provider-holder" class=" ">
                                                <input id="ctrl-oauth_provider" data-field="oauth_provider"  value="<?php echo get_value('oauth_provider') ?>" type="text" placeholder="Enter Oauth Provider"  name="oauth_provider"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="oauth_uid">Oauth Uid </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-oauth_uid-holder" class=" ">
                                                <input id="ctrl-oauth_uid" data-field="oauth_uid"  value="<?php echo get_value('oauth_uid') ?>" type="text" placeholder="Enter Oauth Uid"  name="oauth_uid"  class="form-control " />
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
                                            <label class="control-label" for="nim">Nim </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-nim-holder" class=" ">
                                                <input id="ctrl-nim" data-field="nim"  value="<?php echo get_value('nim') ?>" type="text" placeholder="Enter Nim"  name="nim"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="claimed">Claimed </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-claimed-holder" class="input-group ">
                                                <input id="ctrl-claimed" data-field="claimed" class="form-control datepicker  datepicker" value="<?php echo get_value('claimed') ?>" type="datetime"  name="claimed" placeholder="Enter Claimed" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="wa_activated">Wa Activated </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-wa_activated-holder" class=" ">
                                                <input id="ctrl-wa_activated" data-field="wa_activated"  value="<?php echo get_value('wa_activated') ?>" type="number" placeholder="Enter Wa Activated" step="any"  name="wa_activated"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="email_activated">Email Activated </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-email_activated-holder" class=" ">
                                                <input id="ctrl-email_activated" data-field="email_activated"  value="<?php echo get_value('email_activated') ?>" type="number" placeholder="Enter Email Activated" step="any"  name="email_activated"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="activated">Activated </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-activated-holder" class="input-group ">
                                                <input id="ctrl-activated" data-field="activated" class="form-control datepicker  datepicker" value="<?php echo get_value('activated') ?>" type="datetime"  name="activated" placeholder="Enter Activated" data-enable-time="true" data-min-date="" data-max-date="" data-date-format="Y-m-d H:i:S" data-alt-format="F j, Y - H:i" data-inline="false" data-no-calendar="false" data-mode="single" /> 
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="otp">Otp </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-otp-holder" class=" ">
                                                <input id="ctrl-otp" data-field="otp"  value="<?php echo get_value('otp') ?>" type="text" placeholder="Enter Otp"  name="otp"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="otp_login_code">Otp Login Code </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-otp_login_code-holder" class=" ">
                                                <input id="ctrl-otp_login_code" data-field="otp_login_code"  value="<?php echo get_value('otp_login_code') ?>" type="text" placeholder="Enter Otp Login Code"  name="otp_login_code"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="otp_backup_code">Otp Backup Code </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-otp_backup_code-holder" class=" ">
                                                <input id="ctrl-otp_backup_code" data-field="otp_backup_code"  value="<?php echo get_value('otp_backup_code') ?>" type="text" placeholder="Enter Otp Backup Code"  name="otp_backup_code"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="user_role_id">User Role Id </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-user_role_id-holder" class=" ">
                                                <input id="ctrl-user_role_id" data-field="user_role_id"  value="<?php echo get_value('user_role_id') ?>" type="number" placeholder="Enter User Role Id" step="any"  name="user_role_id"  class="form-control " />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="user_group_id">User Group Id </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div id="ctrl-user_group_id-holder" class=" ">
                                                <input id="ctrl-user_group_id" data-field="user_group_id"  value="<?php echo get_value('user_group_id') ?>" type="number" placeholder="Enter User Group Id" step="any"  name="user_group_id"  class="form-control " />
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

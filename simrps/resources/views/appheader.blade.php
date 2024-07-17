<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container-fluid justify-content-start">
        <button type="button" id="sidebarCollapse" class="sidebar-toggler btn btn-primary mx-2">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
    </div>
</div>
<nav id="sidebar" class="navbar-dark bg-primary">
{{ Html::render_menu(Menu::navbarsideleft()  , "nav navbar-nav w-100 flex-column align-self-start"  , "accordion") }}
</nav>

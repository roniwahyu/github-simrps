<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
    <div class="container-fluid ">
        <button type="button" id="sidebarCollapse" class="sidebar-toggler btn btn-primary mx-2">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/home">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" /> 
            {{ config('app.name') }}
        </a>
        <button type="button" class="navbar-toggler dropdown-toggle" data-bs-toggle="collapse" data-bs-target=".navbar-responsive-collapse">
        </button>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <div class="me-auto"></div>
            {{ Html::render_menu(Menu::navbartopright()  , "navbar-nav" ) }}
        </div>
    </div>
</div>
<nav id="sidebar" class="navbar-dark bg-primary">
{{ Html::render_menu(Menu::navbarsideleft()  , "nav navbar-nav w-100 flex-column align-self-start"  , "accordion") }}
</nav>

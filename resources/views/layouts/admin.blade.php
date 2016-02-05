<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
</head>

<body>

    <div id="wrapper">
        

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{!!URL::to('admin')!!}"><img src="img/logo_admin.png" class="img_logo_admin" /> La Hinchada</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                @yield('search')

                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    @if (Auth::check()){!!Auth::user()->nombre!!} @else Sesion no Iniciada @endif 
 <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/perfiles/show"><i class="fa fa-gear fa-fw"></i>Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{!!URL::to('/logout')!!}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        @if(Auth::user()->categoria_user_id == 5)
                                @include('menus.administrador')
                            @elseif(Auth::user()->categoria_user_id == 4)
                                @include('menus.editor')
                            @elseif(Auth::user()->categoria_user_id == 3)
                                @include('menus.autor')
                            @elseif(Auth::user()->categoria_user_id == 2)
                                @include('menus.colaborador')
                            @elseif(Auth::user()->categoria_user_id == 1)
                                @include('menus.suscriptor')
                        @endif
                        
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
    @yield('scripts')
    
     
</body>

</html>

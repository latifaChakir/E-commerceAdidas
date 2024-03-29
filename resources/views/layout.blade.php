
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="side">
            <div class="h-100">
                <div class="sidebar_logo d-flex align-items-end">

                    <a href="#" class="nav-link text-white-50">ADIDAS</a>

                </div>

             <ul class="sidebar_nav">
                @if($hasPermission['categories'])
                <li class="sidebar_item ">
                    <a href="/categories" class="sidebar_link"> <img src="{{ asset('img/task.svg') }}" alt="icon">Categories</a>
                </li>
                @endif

                @if($hasPermission['products'])
                <li class="sidebar_item ">
                    <a href="/products" class="sidebar_link"><img src="{{ asset('img/articles.svg') }}" alt="icon">Products</a>
                </li>
                @endif

                @if($hasPermission['clients'])
                <li class="sidebar_item ">
                    <a href="/clients" class="sidebar_link"><img src="{{ asset('img/agents.svg') }}" alt="icon">Clients</a>
                </li>
                @endif

                @if($hasPermission['roles'])
                <li class="sidebar_item ">
                    <a href="/roles" class="sidebar_link"><img src="{{ asset('img/articles.svg') }}" alt="icon">Roles</a>
                </li>
                @endif

                @if($hasPermission['users'])
                <li class="sidebar_item ">
                    <a href="/users" class="sidebar_link"><img src="{{ asset('img/agent.svg') }}" alt="icon">Administration</a>
                </li>
                @endif
            </ul>

                <div class="line"></div>
                <a href="#" class="sidebar_link"><img src="{{ asset('img/settings.svg') }}" alt="">Settings</a>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar justify-content-space-between pe-4 ps-2">
                <button class="btn open">
                    <span class="navbar-toggler-icon"> <i class='fa fa-bars'></i></span>
                </button>
                <div class="navbar" style="gap:20px !important;">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="{{ asset('img/search.svg') }}" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg') }}" alt="icon"> -->
                    <img class="notification" src="{{ asset('img/new.svg') }}" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="{{ asset('img/settingsno.svg') }}" alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="{{ asset('img/notif.svg') }}" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="{{ asset('img/notif.svg') }}" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="{{ asset('img/photo_admin.svg') }}" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="/logout">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content') 
            @yield('additional_content')
            <div class="container">
            @yield('editcategory')
            </div>
            @yield('products')
            @yield('addproduct')
            <div class="container">
            @yield('editproduit')
            </div>
            @yield('clients')
            @yield('addclients')
            <div class="container">
            @yield('editclient')
            </div>
            
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
    });
  </script>
    

</body>

</html>
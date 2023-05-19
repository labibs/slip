<nav class="navbar navbar-default navbar-fixed-top shadow">
  <div class="brand">
    <a href="index.html"><img src="{{asset('/admin/assets/img/kug.png')}}" alt="Klorofil Logo" class="img-responsive logo"></a>
  </div>
  <div class="container-fluid">
    <div class="navbar-btn">
      <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-menu"></i></button>
    </div>



    <div id="navbar-menu">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">

          </a>

        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <span>{{auth()->user()->name}}</span> <span>, Level User :</span> <span>{{auth()->user()->role}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
          <ul class="dropdown-menu">
           
            <li><a href="https://jne-cilacap.com/slip/public/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
          </ul>
        </li>
        <!-- <li>
          <a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="dashboard to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

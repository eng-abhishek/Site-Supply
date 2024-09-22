    <style>
        .notification-dropdown-list:hover ul.notification-hover-menu
        {
            display:block;
        }
        ul.notification-hover-menu
        {
            list-style:none;
            background: #3c8dbc;
            display: inline-block;
            position: absolute;
            right: 13%;
            top: 33px;
            z-index:9;
            display:none;
        }
        ul.notification-hover-menu li{margin-left:0px;padding: 5px 10px;}
        ul.notification-hover-menu li a{color:#fff;}
    </style>
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo"><b>Site</b> Supply</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Site Supply</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                    <p>
                  Site Supply
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="{{url('admin-logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

            <div class="notification-dropdown-list">
                <a href="#"><i class="fa fa-bell" style="float: right;margin-right:0;padding-top:19px;padding-right: 16px;font-size: 15px;color:white" aria-hidden="true">
              <sup class="countNotificationNumber" style="color: red;font-size: 13px;background: white;text-align: center;font-weight: 600;padding: 2px 4px;border-radius:25px;position:relative;top:-11px;left: -10px;">0</sup></i></a>
                  <ul class="notification-hover-menu">
                          <li><a href="{{url('view-booking-notification')}}"><font id="BOKNotify" style="font-weight:600"></font> Booking Notification</a></li>
                          <li><a href="{{url('view-enquiry-notification')}}"><font id="EnqNotify" style="font-weight:600"></font> Enquiry Notification</a></li>
                   </ul>
            </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Site Supply</p>

            </div>
          </div>
        
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
            </li>

             <li class="treeview">
              <a href="{{url('admin-dashboard')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
              </li>

            <li class="treeview">
              <a href="{{url('user')}}">
                <i class="fa fa-user"></i>
                <span>User Management</span>
              </a>
            </li>

            <li class="treeview">
              <a href="{{url('categories')}}">
                <i class="fa fa-th-large"></i>
                <span>Category Management</span>
            </a>
            </li>

              <li class="treeview">
              <a href="#">
                <i class="fa fa-copy"></i> <span>City Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('city')}}"><i class="fa fa-circle-o"></i>City</a></li>
                <li><a href="{{url('location')}}"><i class="fa fa-circle-o"></i>Location</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="{{url('shipping-management')}}">
              <i class="fa fa-truck"></i>
                <span>Shipping Management</span>
            </a>
            </li>

            <li class="treeview">
              <a href="{{url('rfq-list')}}">
              <i class="fa fa-weixin" aria-hidden="true"></i>
                <span>RFQ Management</span>
            </a>
            </li>


              <li class="treeview">
              <a href="#">
                <i class="fa fa-picture-o"></i> <span>Feature Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('brand')}}"><i class="fa fa-circle-o"></i>Brand</a></li>
                   
             </ul>
            </li>

            <li class="treeview">
              <a href="{{url('product')}}">
                <i class="fa fa-copy"></i><span>Product Management</span>
              </a>
            </li>
             <li>
             <a href="{{url('best-selling')}}">
                <i class="fa fa-tags"></i>
                <span>Best Selling Management</span>
              </a>  
            </li>
              <li class="treeview">
              <a href="{{url('testimonial')}}">
                <i class="fa fa-user"></i>
                <span>Testimonial Management</span>
              </a>
             </li>

              <li class="treeview">
              <a href="{{url('banner')}}">
                <i class="fa fa-picture-o"></i>
                <span>Banner Management</span>
              </a>
            </li>
            <li>
             <a href="{{url('view-material-calculation')}}">
                <i class="fa fa-calculator"></i>
                <span>Material Calculation Management</span>
              </a>  
            </li>
           
             <li>
             <a href="{{url('view-enquiry')}}">
                <i class="fa fa-circle-o-notch"></i>
                <span>Enquiry Management</span>
              </a>  
            </li>
            <li>
             <a href="{{url('view-company-address')}}">
                <i class="fa fa-clipboard"></i>
                <span>Company Address Management</span>
              </a>  
            </li>
            <li>
             <a href="{{url('quantity')}}">
                <i class="fa fa-bar-chart"></i>
                <span>Quantity Management</span>
              </a>  
            </li>
            <li>
             <a href="{{url('order')}}">
                <i class="fa fa-bar-chart"></i>
                <span>Booking Management</span>
              </a>  
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-copy"></i> <span>Report Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('payment-report')}}"><i class="fa fa-circle-o"></i>Payment Report</a></li>
                <li><a href="{{url('order-report')}}"><i class="fa fa-circle-o"></i>Booking Report</a></li>
                <li><a href="{{url('user-report')}}"><i class="fa fa-circle-o"></i>User Report</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
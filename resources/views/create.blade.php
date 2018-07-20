<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{URL::to('/')}}/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{URL::to('/')}}/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{URL::to('/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{URL::to('/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{URL::to('/css/paper-dashboard.css')}}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{URL::to('/css/demo.css')}}" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{URL::to('/css/themify-icons.css')}}" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="index">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="user">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="create">
                        <i class="ti-text"></i>
                        <p>create</p>
                    </a>
                </li>
                <li>
                    <a href="table">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="maps">
                        <i class="ti-map"></i>
                        <p>Items</p>
                    </a>
                </li>
                <li>
                    <a href="icons">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="notifications">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Borrow Item</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
            @if(session()->has('notif-update') || session()->has('notif-delete')
                || session()->has('notif-create'))
                <div class="row">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" area-hidden="true">&times;</button>
                        <strong>Notification</strong>
                        {{ session()->get('notif-create') }}
                        {{ session()->get('notif-update') }}
                        {{ session()->get('notif-delete') }}
                        {{ session()->get('notif-update') }}
                    </div>
                </div>
            @endif
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Borrowers Table</h4><br>
                                <p class="category">
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                                    <!-- sad -->
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">BORROW</button>
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="myTable">
                                    <thead>
                                        <th>Borrower</th>
                                        <th>Serial #</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Date borrowed</th>
                                        <th>Status</th>
                                        <th>Released by</th>
                                        <!-- <th>Country</th>
                                        <th>City</th> -->
                                    </thead>
                                    <tbody>
                                        @forelse($datas as $data)
                                        <tr data-toggle="modal" data-target="#myModal{{$data->id}}">
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->serial_number}}</td>
                                            <td>{{$data->item}}</td>
                                            <td>{{$data->qty}}</td>
                                            <td>{{$data->date_borrowed}}</td>
                                            <td>
                                                <span class="bg bg-danger text-danger">
                                                   {{$data->status}} 
                                                </span>
                                            </td>
                                            <td>{{$data->released_by}}</td>
                                        </tr>
                                        @empty
                                        <td>
                                            <td colspan="3">
                                                <p>NO DATA</p>
                                            </td>
                                        </td>
                                        @endforelse
                                      
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="#">khuzan</a>
                </div>
            </div>
        </footer>

    </div>
</div>
<!-- FORM MODAL -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Borrowing form</h4>
        </div>
        <form method="POST" action="/create">
        <!-- Modal body -->
        <div class="modal-body">
         <div class="content">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label>Enter Name</label>
                                                <input type="text" class="form-control border-input" name="name" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input type="text" class="form-control border-input" disabled placeholder="Company" value="IT DEPARTMENT">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="items">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Serial #</label>
                                                <input type="tel" name="sn[]" class="form-control border-input" placeholder="Serial #" required>
                                            </div>
                                         </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Select Item</label>
                                                <select class="form-control border-input" name="item[]" required>
                                                    <option selected></option>
                                                    <option value="Monitor">Monitor</option>
                                                    <option value="Laptop">Laptop</option>
                                                    <option value="Projector">Projector</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="tel" name="qty[]" maxlength="2" min="1" class="form-control border-input" required>
                                            </div>
                                         </div>
                                         <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;&nbsp;More</label>
                                                <button type="button" class="btn btn-success" title="Add" value="add-entry" id="add"><i class="ti ti-plus"></i></button>
                                            </div>
                                         </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Purpose</label>
                                                <textarea rows="5" class="form-control border-input" name="purpose" placeholder="Here can be your description" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd"><span class="ti-rocket"></span> Submit</button>
                                    </div>
                                    <div class="clearfix"></div>
                            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">        
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
       </form> 
      </div>
    </div>
  </div>
<!-- END -->
<!-- VIEW MODAL -->
<?php foreach ($datas as $data): ?>
  <div class="modal fade" id="myModal{{$data->id}}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Details</h4>
        </div>
        <form action="create/{{$data->id}}" method="POST">
        <!-- Modal body -->
        <div class="modal-body">
            <table class="table table-bordered" id="myTable">
            <tr>
                <td>Borrower</td>
                <td>Date Borrowed</td>
            </tr>
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->date_borrowed}}</td>
            </tr>
            </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
       </form> 
      </div>
    </div>
  </div>
  <?php endforeach ?>
</body>
    <!--   Core JS Files   -->
    <script src="{{URL::to('/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
	<script src="{{URL::to('/js/bootstrap.min.js')}}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{URL::to('/js/bootstrap-checkbox-radio.js')}}"></script>

	<!--  Charts Plugin -->
	<script src="{{URL::to('/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{URL::to('/js/bootstrap-notify.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{URL::to('/js/paper-dashboard.js')}}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{{URL::to('/js/demo.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            event.preventDefault();
            $('#add').click(function(e){
                $('#items').append('<div  id="remove"><div class="row"><div class="col-md-4"><input type="tel" name="sn[]" class="form-control border-input" placeholder="Serial #"></div>'+'<div class="col-md-4"><select class="form-control border-input" name="item[]"><option selected></option><option value="Monitor">Monitor</option><option value="Laptop">Laptop</option><option value="Projector">Projector</option></select></div>'+'<div class="col-md-2"><input type="tel" name="qty[]" maxlength="2" min="1" class="form-control border-input"></div>'+'<div class="col-md-2"><input type="button" value="Remove" id="delete" class="btn btn-danger btn-fill btn-sm"/></div></div><br></div>')
            });
            $('body').on('click','#delete',function(e){
                // $(this).parent('div').remove();
                $("#remove").remove();

            });
        });

        // SEARCH ENGINE JS
        function myFunction() {
              var input, filter, table, tr, td, i;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
    </script>
</html>

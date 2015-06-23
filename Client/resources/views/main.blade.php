<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>DeathmatchZ Client Area</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport">
<script src="{{ asset('js/html5-trunk.js') }}"></script>
<link href="{{ asset('icomoon/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{asset('css/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('css/wysiwyg/wysiwyg-color.css') }}" rel="stylesheet">
<link href="{{ asset('css/timepicker.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-editable.css') }}" rel="stylesheet">
<link href="{{ asset('css/select2.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.8.23.custom.min.js') }}"></script>
<script src="{{ asset('js/morris/morris.js') }}"></script>
<script src="{{ asset('js/morris/raphael-min.js') }}"></script>
<script src="{{ asset('js/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('js/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar.js') }}"></script>
<script src="{{ asset('js/tiny-scrollbar.js') }}"></script>
<script src="{{ asset('js/custom-index.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/custom-tables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/date-picker/date.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/date-picker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap-editable.min.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/custom-forms.js') }}"></script>
  </head>
  <body>
    <header>
      <a href="{{ asset('/home/') }}" class="logo">DeathmatchZ Client Area</a>
      <div id="mini-nav">
        <ul class="hidden-phone">
          <li><a href="{{ asset('/logout/') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <div class="container-fluid">
      <div id="mainnav" class="hidden-phone hidden-tablet">
        <ul>
          <li>
            <a href="{{ asset('/home/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe0a1;"></span>
              </div>Dashboard
            </a>
          </li>
          <li>
            <a href="{{ asset('/shop/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe097;"></span>
              </div>Shop
            </a>
          </li>
          <li>
            <a href="{{ asset('/characters/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe073;"></span>
              </div>Characters
            </a>
          </li>
          <li>
            <a href="{{ asset('/clan/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe047;"></span>
              </div>Clan
            </a>
          </li>
          <li>
            <a href="{{ asset('/items/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>
              </div>Items
            </a>
          </li>
          <li>
            <a href="{{ asset('/logout/') }}">
              <div class="icon"><span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span>
              </div>Logout
            </a>
          </li>
        </ul>
      </div>
      <div class="dashboard-wrapper">
        <div class="main-container">
            <div class="row-fluid">
                <div class="span12">
                    <ul class="breadcrumb-beauty">
                        <li>
                            <a href="{{ asset('/home/') }}"><span class="fs1" aria-hidden="true" data-icon="&#xe002;"></span> Dashboard</a>
                        </li>
                    @yield('breadcrum')
                    </ul>
                </div>
            </div>
            <br><br>
            @yield('content')
        </div>
      </div>
    </div>
    <footer>
      <p class="copyright">&copy; DeathmatchZ Client Area - <a href="http://drwhat.co/">DrWhat</a></p>
    </footer>
  </body>
</html>
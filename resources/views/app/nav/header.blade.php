<div class="navbar navbar-default">
    <div class="navbar-header" style="background-color:white">
        <a class="login-brand" href="/">
            <img src="/images/logos/logo.png" alt="{{Config::get('app.name')}}" height="50px" width="180px" style="margin-top:5px; margin-left:30px">
        </a>
        
    </div>
    <div class="navbar-toggleable">
        <nav id="navbar" class="navbar-collapse collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
            </span>
            </button>
            <ul class="nav navbar-nav navbar-right">
            
                <notification_message_wrapper />
                <nav_user_menu />
            
            </ul>
            <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">{{$view_name}}</span>
            </h1>
            </div>
        </nav>
    </div>
</div>
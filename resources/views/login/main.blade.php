<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/css.css">

</head>
<body>


<div class="form-Bg">
       
    <div class="form-header">
        <h1>Klinik Dokter Dina N.R</h1>
        
        <p>Silahkan Login Terlebih Dahulu</p>
    </div>
    @if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action = "/login" method ="post">
        @csrf
        <div class="form-group">
            <input placeholder="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" email="name@example.com" autofocus required value="{{ old ('email')}}">
        </div>
        @error('email')
        <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
        <div class="form-group">
            <input placeholder="password" type="password" name="password" class="form-control" id="password" required>
            
        </div>

        <div class="form-group">         
            <input class="inp-cbx" id="cbx" type="checkbox" style="display: none"/>
            <label class="cbx" for="cbx">
            <span>
                <svg width="12px" height="10px" viewbox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
            </span>
            <span>Remember Me</span>
            </label>
            
        </div>

        <div class="form-group">
            <button type="submit">Log In</button>
        </div>
    </form> 
</div>
    
    <div class="animation-area">
        <ul class="box-area">
            <li class="fa fa-plus"></li>
            <li></li>  
            <li class="fa fa-plus"></li>
            <li></li>
            <li class="fa fa-plus"></li>
            <li></li>
            <li class="fa fa-plus"></li>
            <li></li>
            <li class="fa fa-plus"></li>
            <li></li>
        </ul>
    </div>

</body>
</html>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('index') }}">LOGO</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('index') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Moje ogłoszenia</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="#">Kontakt</a>
      </li>
      <li class="nav-item">
      <a href="{{ route('adverts.create') }}">
        <button type="button" class="btn btn-danger"><img src="/img/plus-black-symbol.png"> <strong>Ogłoszenie</strong></button>
      </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('login') }}">
            <button type="button" class="btn btn-info" style="margin-left: 10px"><img src="/img/login_icon.png"> <strong>Login</strong></button>
          </a>
      </li>
      <li class="nav-item">
          <a href="{{ route('register') }}">
            <button type="button" class="btn btn-primary" style="margin-left: 10px"><img src="/img/login_icon.png"> <strong>Rejestracja</strong></button>
          </a>
      </li>
      
    </ul>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
      <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Email Checker is a free email verification tool.
    It helps you validate any email address online for free. Check if mailbox really exists.">
    <meta name="author" content="Nnaemeka Nweke">
    <title>Email Checker - Verify Email</title>

    <link rel="canonical" href="">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">

        <!-- Favicons -->
    <link rel="apple-touch-icon" href="" sizes="180x180">
    <link rel="icon" href="" sizes="32x32" type="image/png">
    <link rel="icon" href="" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="" color="#7952b3">
    <link rel="icon" href="">
    <meta name="theme-color" content="#7952b3">
  </head>
  <body>

<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About Developer</h4>
          <p class="text-muted">I am a passionate and experienced software developer with a proven track record of providing software solutions. A passionate problem solver with a big interest in using technology in solving complex problems with creative thinking.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="https://twitter.com/codegenty" target="_new" class="text-white">Follow me Twitter</a></li>
            <li><a href="{{ route('contact')}}" class="text-white">Email me here</a></li>
            <li><a href="{{ route('support')}}" class="text-white">Buy me Coffee</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="/" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Email Checker</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>
    @yield('content')
</main>

<footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1"> &copy; {{date('Y')}} <a href="https://twitter.com/codegenty" target="_ blank">Nnaemeka Nweke</a> </p>
      <p class="mb-0"><a href="/">Home</a> |
        <a href="{{ route('about')}}">About</a> | <a href="{{ route('privacy')}}">Privacy</a> | <a href="#">API</a> | <a href="{{ route('contact')}}">Contact </a> |
        <a href="{{ route('support')}}">Buy me Coffeee</a>
    </p>
    </div>
  </footer>
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>

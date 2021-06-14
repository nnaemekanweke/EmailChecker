@extends('layouts.main')
@section('content')

  <div class="album py-5 bg-light">
    <br>
    <div class="container">
        <h3 class="text-center">About </h3>
         <br>
        <p>
            <q>Email Checker is a free tool that may help you in cleaning your mailing list. It finds out if email address is good or bad (by checking whether the mailbox exist). New features will be added gradually to this web application to make it better by every update.
            </q>
            </p>

            <h5>Share Feedback</h5>
            <p>If you have any suggestion for improving this website or maybe you faced an issue or you find something wrong ? <a href="{{route('contact')}}">let me know</a>.</p>


         <p class="alert alert-warning"><b>Note:</b> We do not share email address (submitted for validation) with anyone.</p>

    </div>
  </div>

@endsection

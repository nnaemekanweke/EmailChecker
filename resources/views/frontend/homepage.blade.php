@extends('layouts.main')
@section('content')

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Email Checker</h1>
        <p class="lead text-muted">A simple tool to check whether an email address exists.</p>
            <form action="{{ route('check')}}" method="POST">
                @csrf
                <div class="row g-0 align-items-center">
                    <div class="col-10">
                        <input type="email" class="form-control btn-lg input-f" name="email" placeholder="someone@example.com" required>
                    </div>
                    <div class="col-2">
                      <span id="passwordHelpInline" class="form-text">
                        <button class="btn btn-primary btn-lg btn-home">Check</button>
                      </span>
                    </div>
                  </div>
            </form>
            <p>
                @if (!empty($data))
                   @if($data['status'] === 'valid')
                     <h3> Result: <b><span style="color:rgb(4, 218, 4);">OK</span></b> </h3>
                     <p>{{ $data['reason'] }}</p>
                    @elseif($data['status'] === 'invalid')
                    <h3> Result: <b><span style="color:rgb(255, 0, 0);">BAD</span></b> </h3>
                        <p>{{ $data['email'] }} does not exist.</p>
                    @else
                     <p style="color:rgb(255, 0, 0);">{{ $data['reason'] }}</p>
                    @endif
                @endif
            </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
        <p class="text-center">Email Checker is a nice little tool that helps you find out whether an email address is valid or not, within a second.</p>
    </div>
    <br>
    <div class="container">
        <h4 class="text-center">How do we verify an email? </h4>
         <br>
        <ol>
            <li>First it checks for email address format.</li>
            <li>Then make sure that domain name is valid. We also check whether it’s a disposable email address or not.</li>
            <li>In the final step, It extracts the MX records from the domain records and connects to the email server (over SMTP and also simulates sending a message) to make sure the mailbox really exists for that user/address. Some mail servers do not cooperate in the process, in such cases, the result of this email verification tool may not be as accurate as expected.</li>
        </ol>
        <h6 class="alert alert-primary">Help me improve this site</h6>
         <p>If you have any suggestion/idea for improving this website or adding new feature or something, feel free to email me <a href="{{ route('contact')}}">here</a>.</p>

         <p class="alert alert-warning sm"><b>Note:</b> We do not share email address (submitted for validation) with anyone.</p>

    </div>
  </div>

@endsection

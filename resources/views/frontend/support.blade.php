@extends('layouts.main')
@section('content')
<style>
    sections {
    display: grid;
    justify-content: center;
    align-content: center;
    gap: 4px;
    grid-auto-flow: column;
    }
    .c-btn {
    background-color: #354255;
    border-color: #354255;
    color:#fff;
    }

</style>

  <div class="album py-5 bg-light">
    <br>
    <div class="container">
         <h3 class="text-center">Buy me Coffee</h3>
         <p class="text-center">I need to your support to continue improve this application </p>
         <p class="text-center"><img src="{{ asset('img/coffee.png')}}" width="80"></a></p>
         <div class="container">
            <sections>
            <div class="row row-cols-1">
                   {{-- <form method="POST" action="{{ route('pay') }}" id="paymentForm"> --}}
                    <form method="POST" action="{{ route('pay') }}" role="form">
                    {{-- {{ dd($post) }} --}}
                    @csrf
                        <input type="text" hidden class="form-control" name="description" value="Email Checker tip">
                        <input type="text" hidden class="form-control" name="title" value="Coffee Tip">
                        <div class="form-group">
                            <label for="amount">Full Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <label for="amount">Amount<span style="color:#FF0000;">*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text">NGN</span>
                            </div>
                            <input type="number" placeholder="0.00" required class="form-control" name="amount">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="form-control btn btn-sm btn-primary btn-block c-btn">Donate Here</button>
                        </div>
                    </form>
                        <div class="col-sm-1">
                            <input type="text" hidden class="form-control" >
                        </div>
                </div><!-- row.// -->
            </sections>
        </div>
    </div>
  </div>

@endsection

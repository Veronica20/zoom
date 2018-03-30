<div class="container">
    <div class="stepsDiv">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="step {{ $path >=1 ? 'activeStep' : '' }}">1</div>
                <b>Գրանցման Տվյալներ</b>
            </div>
            <div class="col-md-3">
                <div class="step {{  $path >=2 ? 'activeStep' : '' }}">2</div>
                Վարկի պայմաններ
            </div>
            <div class="col-md-3">
                <div class="step {{ $path >=3 ? 'activeStep' : '' }}">3</div>
                Անձնական տվյալներ
            </div>
            @if(\Auth::check())
                <div class="col-md-2 logOutClass">
                    <a href="{{ url('/logout') }}">logout</a>
                </div>
            @endif
        </div>
    </div>
</div>

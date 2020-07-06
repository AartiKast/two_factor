<form action="" method="post">
     @csrf
     <div class="form-group">
         <label for="token">Token</label>
         <input type="text" name="token" placeholder="Enter OTP" class="form-control{{ $errors->has('token') ? ' is-invalid' : '' }}" id="token"> 
           @if($errors->has('token'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('token') }}</strong>
              </span> 
           @endif
        </div>
    <button class="btn btn-primary btn-large">Verify</button>
</form>
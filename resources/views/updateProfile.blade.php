<h1>Update Profile page</h1>

@if(session()->has('PassFailedUpdate'))
    <span style="color:red">{{session('PassFailedUpdate')}}</span>
@endif


<form action='/updateProfile' method="POST">
    
    @csrf
    <input type="hidden" name='id' value='{{$data->id}}'/>
    <input type="hidden" name='oldPasswordHash' value='{{$data->password}}'/>

    
    <input name='name' value='{{$data->name}}'/> <br><br>
    <span style="color:red">@error('name'){{$message}}@enderror</span> <br><br>
    
    <input name='email' value='{{$data->email}}'/> <br><br>
    <span style="color:red">@error('email'){{$message}}@enderror</span> <br><br>

    <input name='expertise' value='{{$data->expertise}}'/> <br><br>
    <span style="color:red">@error('expertise'){{$message}}@enderror</span> <br><br>
    
    <input name='oldPassword' placeholder="oldPassword"/> <br><br>
    <span style="color:red">@error('oldPassword'){{$message}}@enderror</span> <br><br>
    
    <input name='newPassword' placeholder="newPassword"/> <br><br>
    <span style="color:red">@error('newPassword'){{$message}}@enderror</span> <br><br>

    <input name='confirmPassword' placeholder='confirmPassword'/> <br><br>
    <span style="color:red">@error('confirmPassword'){{$message}}@enderror</span> <br><br>

    <input type='submit' value='submit'/>
</form>
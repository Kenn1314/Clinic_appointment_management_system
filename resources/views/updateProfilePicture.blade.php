<h1>Update Profile Picture page</h1>

<form action='/updateProfilePicture' method="POST" enctype="multipart/form-data">
  @csrf
  <label for="file-input">Choose a JPG file:</label>
  <input type="hidden" name="id" value="{{session('user_id')}}">
  <input type="file" name="profilePic" accept=".jpg, .png">
  <br><br>
  <input type="submit" value="Submit">
</form>
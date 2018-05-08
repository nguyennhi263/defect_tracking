<div class="container">
  <h2>Defect Tracking</h2>
  <form action="/defect_tracking/users/login" method="POST">
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="LoginName" placeholder="Enter usernmae" name="LoginName">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="UserPass" placeholder="Enter password" name="UserPass">
    </div>
    <button type="submit" class="btn btn-primary">Log in</button>
  </form>
</div>
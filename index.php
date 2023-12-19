<form action="collect.php" method="get" style="display: inline-block; margin: 10px; padding: 10px; border: 1px solid #ddd;">
  <div style="margin-bottom: 5px;">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>
  </div>
  <div style="margin-bottom: 5px;">
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" placeholder="Enter your age" min="0" max="120" required>
  </div>
  <div style="margin-bottom: 5px;">
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
      <option value="">Select your gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
  </div>
  <div>
    <input type="submit" value="Submit">
  </div>
</form>

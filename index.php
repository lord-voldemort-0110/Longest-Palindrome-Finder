<!DOCTYPE html>
<html>
<head>
  <title>Longest Palindrome Finder</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Longest Palindrome Finder</h1>
    <form method="post">
      <label for="inputString">Enter a string:</label>
      <input type="text" id="inputString" name="inputString" required>
      <button type="submit" name="submit">Find Longest Palindrome</button>
    </form>
    <?php
      if (isset($_POST['submit'])) {
        $inputString = $_POST['inputString'];
        $longestPalindrome = findLongestPalindrome($inputString);
        echo "<p>The longest palindrome in \"$inputString\" is \"$longestPalindrome\"</p>";
      }
      
      function findLongestPalindrome($str) {
        $n = strlen($str);
        $maxPalindrome = '';
        for ($i = 0; $i < $n; $i++) {
          for ($j = $i; $j < $n; $j++) {
            $subStr = substr($str, $i, $j - $i + 1);
            if (isPalindrome($subStr) && strlen($subStr) > strlen($maxPalindrome)) {
              $maxPalindrome = $subStr;
            }
          }
        }
        return $maxPalindrome;
      }
      
      function isPalindrome($str) {
        $n = strlen($str);
        for ($i = 0; $i < $n / 2; $i++) {
          if ($str[$i] != $str[$n - $i - 1]) {
            return false;
          }
        }
        return true;
      }
    ?>
  </div>
</body>
</html>

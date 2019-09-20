<?php
require '../../lib/phpass/PasswordHash.php';
header('Content-type: text/plain');

function fail($pub, $pvt = '')
{
	$msg = $pub;
	if ($pvt !== '')
		$msg .= ": $pvt";
	exit("An error occurred ($msg).\n");
}
// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;

$user = $_POST['user'];
// Should validate the username length and syntax here
$pass =trim($_POST['pass']);
echo $pass." : ";
$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
$hash = $hasher->HashPassword($pass);
if (strlen($hash) < 20)
	fail('Failed to hash new password');
//unset($hasher);
echo $hash;
echo '<br>';
$testHash = new PasswordHash(8, false);
$hash = $hasher->HashPassword('123456');
echo '<br>';
echo $hash;
echo '<br>';
var_dump($testHash->CheckPassword("123456", $hash));
?>

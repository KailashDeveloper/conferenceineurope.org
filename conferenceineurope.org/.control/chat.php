<?php

/*

Copyright (c) 2009 Anant Garg (anantgarg.com | inscripts.com)



This script may be used for non-commercial purposes only. For any

commercial purposes, please contact the author at 

anant.garg@inscripts.com



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,

EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES

OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND

NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT

HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,

WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING

FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR

OTHER DEALINGS IN THE SOFTWARE.



*/



include("mysqli_dbconn.php");





session_start();



if ($_GET['action'] == "chatheartbeat") { chatHeartbeat(); } 

if ($_GET['action'] == "sendchat") { sendChat(); } 

if ($_GET['action'] == "closechat") { closeChat(); } 

if ($_GET['action'] == "startchatsession") { startChatSession(); } 



if (!isset($_SESSION['chatHistory'])) {

	$_SESSION['chatHistory'] = array();	

}



if (!isset($_SESSION['openChatBoxes'])) {

	$_SESSION['openChatBoxes'] = array();	

}



function chatHeartbeat() {

	

	$sql = "select * from chat where (chat.to = '".mysqli_real_escape_string($link,$_SESSION['chat_user'])."' AND recd = 0) order by id ASC";

	$query = mysqli_query($link,$sql);

	$items = '';



	$chatBoxes = array();



	while ($chat = mysqli_fetch_array($query)) {



		if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {

			$items = $_SESSION['chatHistory'][$chat['from']];

		}



		$chat['message'] = sanitize($chat['message']);



		$items .= <<<EOD

					   {

			"s": "0",

			"f": "{$chat['from']}",

			"m": "{$chat['message']}"

	   },

EOD;



	if (!isset($_SESSION['chatHistory'][$chat['from']])) {

		$_SESSION['chatHistory'][$chat['from']] = '';

	}



	$_SESSION['chatHistory'][$chat['from']] .= <<<EOD

						   {

			"s": "0",

			"f": "{$chat['from']}",

			"m": "{$chat['message']}"

	   },

EOD;

		

		unset($_SESSION['tsChatBoxes'][$chat['from']]);

		$_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];

	}



	if (!empty($_SESSION['openChatBoxes'])) {

	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {

		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {

			$now = time()-strtotime($time);

			$time = date('g:iA M dS', strtotime($time));



			$message = "Sent at $time";

			if ($now > 180) {

				$items .= <<<EOD

{

"s": "2",

"f": "$chatbox",

"m": "{$message}"

},

EOD;



	if (!isset($_SESSION['chatHistory'][$chatbox])) {

		$_SESSION['chatHistory'][$chatbox] = '';

	}



	$_SESSION['chatHistory'][$chatbox] .= <<<EOD

		{

"s": "2",

"f": "$chatbox",

"m": "{$message}"

},

EOD;

			$_SESSION['tsChatBoxes'][$chatbox] = 1;

		}

		}

	}

}



	$sql = "update chat set recd = 1 where chat.to = '".mysqli_real_escape_string($link,$_SESSION['chat_user'])."' and recd = 0";

	$query = mysqli_query($link,$sql);



	if ($items != '') {

		$items = substr($items, 0, -1);

	}

header('Content-type: application/json');

?>

{

		"items": [

			<?php echo $items;?>

        ]

}



<?php

			exit(0);

}



function chatBoxSession($chatbox) {

	

	$items = '';

	

	if (isset($_SESSION['chatHistory'][$chatbox])) {

		$items = $_SESSION['chatHistory'][$chatbox];

	}



	return $items;

}



function startChatSession() {

	$items = '';

	if (!empty($_SESSION['openChatBoxes'])) {

		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {

			$items .= chatBoxSession($chatbox);

		}

	}





	if ($items != '') {

		$items = substr($items, 0, -1);

	}



header('Content-type: application/json');

?>

{

		"chat_user": "<?php echo $_SESSION['chat_user'];?>",

		"items": [

			<?php echo $items;?>

        ]

}



<?php





	exit(0);

}



function sendChat() {

	$from = $_SESSION['chat_user'];

	$to = $_POST['to'];

	$message = $_POST['message'];

	$ch_date_time=date("Y-m-d H:i:s");





	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());

	

	$messagesan = sanitize($message);



	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {

		$_SESSION['chatHistory'][$_POST['to']] = '';

	}



	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD

					   {

			"s": "1",

			"f": "{$to}",

			"m": "{$messagesan}"

	   },

EOD;





	unset($_SESSION['tsChatBoxes'][$_POST['to']]);

	$sql = "insert into chat (chat.from,chat.to,message,sent) values ('".mysqli_real_escape_string($link,$from)."', '".mysqli_real_escape_string($link,$to)."','".    mysqli_real_escape_string($link,$message)."',NOW())";

	$query = mysqli_query($link,$sql);

	echo "1";

	exit(0);

}



function closeChat() {



	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);

	

	echo "1";

	exit(0);

}



function sanitize($text) {

	$text = htmlspecialchars($text, ENT_QUOTES);

	$text = str_replace("\n\r","\n",$text);

	$text = str_replace("\r\n","\n",$text);

	$text = str_replace("\n","<br>",$text);

	return $text;

}
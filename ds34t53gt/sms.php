<?php if (isset($_POST['t_phone'])) $phone = $_POST['t_phone']; else $phone = '84914779999';
if (isset($_POST['t_message'])) $message = $_POST['t_message']; else $message = 'DA ';
if (isset($_POST['t_port'])) $port = $_POST['t_port']; else $port = 8077;
$select_port = '';
for ($i = 7; $i >= 0; $i--) {
    $j = '8' . $i . '77';
    if ($j == $port) {
        $select_port .= '<option value="' . $j . '" selected="selected">' . $j . '</option>';
    } else {
        $select_port .= '<option value="' . $j . '">' . $j . '</option>';
    }
}
if (isset($_GET['test']) && $_GET['test'] == 'true') {
    $content = $web_link . 'service/sms.php?message=' . $message . '&phone=' . $phone . '&port=' . $port . '&test=true&service=true&main=true&sub=true';
} else {
    $content = '';
}
$content = trim($content);
$main_content = $func->str_template($dir_admin . 'template/sms.html', array('tmp.phone' => $phone, 'tmp.message' => $message, 'tmp.select_port' => '<select name="t_port">' . $select_port . '</select>', 'tmp.content' => $content));

<?php
$headerelements = array(
    'title' => $title . " - Online Learning",
);
$this->load->view('includes/header', $headerelements);

if ($this->session->userdata('logged_in')) {
    $user = 'logged_in';
} elseif ($main_content == "login_view" || $main_content == "registration_view") {
    $user = 'logging_in';
} else {
    $user = 'visitor';
}
?>





<?php
//Top Navbar inclusion
//TODO include top navbar and sidebar separately

switch ($user) {
    case 'visitor':
        redirect('/login');
        break;

    case 'logged_in' :
        echo '<div id="wrapper">';
        echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">";
        $this->load->view('includes/top_navbar');
        $this->load->view('includes/sidebar_nav');
        echo "</nav >";

        echo '<div id="page-wrapper">';
        FB::log($main_content, 'The main content is');
        if (isset($data)) {
            $this->load->view($main_content, $data);
        } else {
            $this->load->view($main_content);
        }

        echo '</div></div>';
        break;
    case 'logging_in' :
        FB::log($main_content, 'The main content is');
        if (isset($data)) {
            $this->load->view($main_content, $data);
        } else {
            $this->load->view($main_content);
        }

        break;
}
?>

<?php
$this->load->view('includes/footer');




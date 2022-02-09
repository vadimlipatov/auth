<?php
use App\Services\Page;
use App\Services\Router;

if (isset($_SESSION['user']) && $_SESSION['user']['group'] != 2) {
    Router::redirect('/profile');
}
?>

<!doctype html>
<html lang="en">
<?php
Page::part('head');
?>
<body>
<?php
Page::part('navbar');
?>
<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Admin</h1>
        <p class="lead">Lorem ipsum dolor sit amet</p>
    </div>
</main>

</body>
</html>


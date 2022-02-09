<?php
use App\Services\Page;
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
        <h1 class="mt-5">Home Page</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem beatae dolor doloremque
            expedita incidunt ipsa qui repudiandae sed ullam. Adipisci corporis ex id molestiae repellendus!</p>
        <a href="/login" class="link-primary">Sign In</a>
    </div>
</main>

</body>
</html>


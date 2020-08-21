<!-- extend from template -->

<!-- redirected to here from PostController create() -->
<h1>hello</h1>
<form action="" method="POST">
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="content" placeholder="content">
    <input type="submit" name="submit" value="post">
</form>

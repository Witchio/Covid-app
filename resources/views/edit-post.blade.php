<!-- extend from tempate -->

<!-- section('content') -->
<form action="" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="title" id="" value="{{$post->title}}">
    <!-- <input type="text" name="content" id="" value="{{$post->content}}"> -->
    <textarea name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
    <input type="text" name="price" id="" value="{{$post->image}}">
    <input type="submit" value="Post Update">
</form>
<!-- endsection -->
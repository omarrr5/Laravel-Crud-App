<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel - CRUD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>

        @auth()
        <p>Congrats you are logged in!</p>
        <form action="/logout" method="post">
            @csrf
            <button>Log out</button>
        </form>

        <div style="border: 3px solid black;">
        <h2>Create a New Post</h2>
            <form action="/create-post" method="post">
                @csrf
                <input type="text" name="title" placeholder="post title">
                <textarea name="body" placeholder="body content....."></textarea>
                <button>Post now!</button>
            </form>
        </div>

        <div style="border: 3px solid black;">
            <h2>All Posts</h2>
            @foreach($posts as $post)
                <div style="background: grey; color: #e2e8f0; padding: 10px; margin: 10px;">
                    <h3>{{$post['title']}}</h3>
                    {{$post['body']}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        @else
            <div style="border: 3px solid black;">
                <h2>Register Your Account!</h2>
                <form action="/register" method="post">
                    @csrf
                    <input name="name" type="text" placeholder="name">
                    <input name="email" type="text" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <button>Register</button>
                </form>
            </div>


            <div style="border: 3px solid black;">
                <h2>Login to  Your Account!</h2>
                <form action="/login" method="post">
                    @csrf
                    <input name="loginName" type="text" placeholder="name">
                    <input name="loginPassword" type="password" placeholder="password">
                    <button>Login</button>
                </form>
            </div>
        @endauth
    </body>
</html>

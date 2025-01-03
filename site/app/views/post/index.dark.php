<extends:layout.base title="[[The PHP Framework for future Innovators]]"/>

<stack:push name="styles">
    <link rel="stylesheet" href="/styles/welcome.css"/>
</stack:push>

<define:body>
@foreach($posts as $post)
    <div>{{$post->getId()}}</div>
    <div>{{$post->getTitle()}}</div>
    <div>{{$post->getText()}}</div>
    <div>-----------------------</div>
@endforeach
</define:body>

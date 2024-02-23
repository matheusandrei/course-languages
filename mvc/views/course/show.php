{{include('layouts/header.php', {title: 'Show'})}}
<div class="container">
    <h2>Course Show</h2>
    <hr>
    <p><strong>Name:</strong> {{ courses.name }}</p>
    <p><strong>Description:</strong> {{ courses.description }}</p>

    <a href="{{base}}/course/edit?id={{courses.id}}" class="btn block">Edit</a>
    <form action="{{base}}/course/delete" method="post">
        <input type="hidden" name="id" value="{{ courses.id }}">
        <button class="btn block red">Delete</button>
    </form>
</div>
{{include('layouts/footer.php')}}
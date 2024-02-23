{{include('layouts/header.php', {title: 'Course'})}}
<h1>Description</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>description</th>
        </tr>
    </thead>
    <tbody>
        {% for course in courses %}
        <tr>
            <td><a href="{{ base }}/course/show?id={{ course.id }}">{{ course.name }}</a></td>
            <td>{{ course.description }}</td>
        </tr>
        {% endfor %}
    </tbody>
</table>
<a href="{{ base }}/course/create" class="btn">Course Create</a>

{{include('layouts/footer.php')}}
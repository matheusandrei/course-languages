{{include('layouts/header.php',{title: 'Edit'})}}
<div class="container">
    <h2>Course Edit</h2>
    <form method="post">
        <label>Name
            <input type="text" name="name" value="{{ courses.name }}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}
        <label>Description
            <input type="text" name="description" value="{{ courses.description }}">
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.description }}</span>
        {% endif %}
        <input type="submit" class="btn" value="Update">
    </form>
</div>
{{include('layouts/footer.php')}}
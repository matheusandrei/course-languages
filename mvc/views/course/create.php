{{ include('layouts/header.php', { title: 'Create' }) }}

<div class="container">
    <h2>Course Create</h2>
    <form method="post">
        <label>Name
            <input type="text" name="name" value="{{ courses.name }}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{ errors.name }}</span>
        {% endif %}
        <label>Description
            <textarea name="description" style="width: 300px; height: 100px;"></textarea>
        </label>
        {% if errors.description is defined %}
        <span class="error">{{ errors.address }}</span>
        {% endif %}
        <label>cle etrangere Teacher
            <input type="number" name="courseTeacher_id" value="{{ courses.courseTeacher_id }}">
        </label>
        {% if errors.name is defined %}
        <span class="error">{{ errors.courseTeacher_id }}</span>
        {% endif %}
        <input type="submit" class="btn" value="Save">
    </form>
</div>

{{ include('layouts/footer.php') }}

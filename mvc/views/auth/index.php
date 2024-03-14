{{ include('layouts/header.php', {title: 'Registration'})}}
<div class="container">
    {% if errors is defined %}
    <div class="error">
        <ul>
        {% for error in errors %}
            <li>{{ error }}</li>
        {% endfor %}
        </ul>
    </div>
    {% endif %}
    <form method="post">
        <h2>Login</h2>
        <label>Username
            <input type="email" name="username" >
        </label>
        <label>Password
            <input type="password" name="password" >
        </label>
 
    
        <input type="submit" class="btn" value="login">
    </form>
</div>
{{ include('layouts/footer.php')}}
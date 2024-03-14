{{ include('layouts/header.php', {title: 'Dashboard admin'} )}}

<div class="container">
    <h2>Dashboard</h2>

    <div class="card">
        {% for log in dashboard %}
        <div>
            <p><strong>User Id: </strong>{{log.userId}}</p>
            <p><strong>Username: </strong>{{ log.userName}}</p>
            <p><strong>IP address: </strong>{{ log.ipAddress}}</p>
            <p><strong>Date: </strong>{{ log.dateTime}}</p>
            <p><strong>Page: </strong>{{ log.page}}</p>
        </div>
        {% endfor%}
    </div>
</div>
{{ include('layouts/footer.php')}}
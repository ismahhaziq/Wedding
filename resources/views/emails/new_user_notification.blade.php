<!DOCTYPE html>

<style type="text/css">
    .card {
        width: 100%;
        max-width: 600px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        padding: 20px;
    }

    .card h2 {
        color: #3F51B5;
    }

    .card ul {
        list-style-type: none;
        padding: 0;
    }

    .card li {
        margin-bottom: 10px;
    }
</style>
<!DOCTYPE html>
<html>

<head>
    <title>New User Registration</title>
</head>

<body>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td>
                <div class="card">
                    <h2>Hello Admin,</h2>
                    <p>A new user has been registered with the following details:</p>
                    <ul>
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                    </ul>
                    <p>Thank you for using our application!</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 | Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c3e50;
        }

        .wrapper {
            background: #ffffff;
            max-width: 520px;
            width: 90%;
            padding: 50px 40px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.12);
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-size: 110px;
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h2 {
            font-size: 26px;
            margin-top: 10px;
            font-weight: 600;
        }

        p {
            font-size: 15px;
            margin-top: 15px;
            color: #6c757d;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-block;
            margin-top: 30px;
            padding: 14px 34px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(45deg, #667eea, #ff4b2b);
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.6);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 90px;
            }

            h2 {
                font-size: 22px;
            }

            .wrapper {
                padding: 40px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <h1>404</h1>
        <h2>Page Not Found</h2>
        <p>
            The page you are looking for might have been removed,
            had its name changed, or is temporarily unavailable.
        </p>

        <a href="{{ url('/') }}" class="btn-home">Back to Homepage</a>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Raihan</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 350px;
            width: 90%;
        }

        h1 {
            color: #2d3436;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        h1 span {
            color: #0984e3; /* Warna biru untuk nama */
            display: block;
            font-size: 1.8rem;
        }

        .hobi-container {
            list-style: none;
            padding: 0;
            margin-top: 1rem;
        }

        .hobi-item {
            background: #e1f5fe;
            color: #0277bd;
            margin: 8px 0;
            padding: 10px;
            border-radius: 8px;
            font-weight: 500;
            transition: transform 0.2s;
        }

        .hobi-item:hover {
            transform: scale(1.05);
            background: #0277bd;
            color: white;
        }

        .label {
            font-size: 0.8rem;
            text-transform: uppercase;
            color: #636e72;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="card">
        <p class="label">Selamat Datang</p>
        <h1>Halo, <span>{{ $name }}</span></h1>
        
        <hr style="border: 0; height: 1px; background: #eee; margin: 20px 0;">
        
        <p class="label">Hobi Saya:</p>
        <ul class="hobi-container">
            @foreach ($hobis as $hobi)
                <li class="hobi-item">{{ $hobi }}</li>
            @endforeach
        </ul>
    </div>

</body>
</html>
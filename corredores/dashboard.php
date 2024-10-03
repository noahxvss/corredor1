<?php
include 'auth.php'; // Protege a página
include 'db.php';

$sql = "SELECT nome, email, idade, genero, cidade, distancia_favorita, tempo_medio FROM usuarios";
$stmt = $conn->prepare($sql);
$stmt->execute();
$corredores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Corredores</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #eaeaea;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4a90e2;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4a90e2;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #4a90e2;
            color: white;
        }
        .btn-danger {
            background-color: #e94e77;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
<header>
    <h1>Sistema de Corredores</h1>
    <nav>
        <a href="perfil.php" class="btn btn-primary">Meu Perfil</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </nav>
</header>

<div class="container">
    <div class="table-container">
        <h2>Lista de Corredores</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Idade</th>
                    <th>Gênero</th>
                    <th>Cidade</th>
                    <th>Distância Favorita</th>
                    <th>Tempo Médio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corredores as $corredor): ?>
                <tr>
                    <td><?= htmlspecialchars($corredor['nome']); ?></td>
                    <td><?= htmlspecialchars($corredor['email']); ?></td>
                    <td><?= htmlspecialchars($corredor['idade']); ?></td>
                    <td><?= htmlspecialchars($corredor['genero']); ?></td>
                    <td><?= htmlspecialchars($corredor['cidade']); ?></td>
                    <td><?= htmlspecialchars($corredor['distancia_favorita']); ?></td>
                    <td><?= htmlspecialchars($corredor['tempo_medio']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inova Dev's API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #007BFF;
        }
        h2 {
            color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Inova Dev's API</h1>
    <p>Bem-vindo! Explore os endpoints disponíveis abaixo:</p>

    <!-- User Section -->
    <h2>Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>Endpoint</th>
                <th>Descrição</th>
                <th>Método</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/userService/readUser.php" target="_blank">Read Users</a></td>
                <td>Listar todos os usuários</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/userService/readUser.php?userId=14" target="_blank">Read User By ID</a></td>
                <td>Obter detalhes de um usuário pelo ID</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/userService/updateUser.php?userId=14" target="_blank">Update User</a></td>
                <td>Atualizar informações de um usuário</td>
                <td>PUT</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/userService/createUser.php" target="_blank">Create User</a></td>
                <td>Criar um novo usuário</td>
                <td>POST</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/userService/deleteUser.php?userId=14" target="_blank">Delete User</a></td>
                <td>Excluir um usuário pelo ID</td>
                <td>DELETE</td>
            </tr>
        </tbody>
    </table>

    <!-- Product Section -->
    <h2>Produtos</h2>
    <table>
        <thead>
            <tr>
                <th>Endpoint</th>
                <th>Descrição</th>
                <th>Método</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/productService/readProduct.php" target="_blank">Read Products</a></td>
                <td>Listar todos os produtos</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/productService/readProduct.php?productId=12" target="_blank">Read Product By ID</a></td>
                <td>Obter detalhes de um produto pelo ID</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/productService/createProduct.php" target="_blank">Create Product</a></td>
                <td>Criar um novo produto</td>
                <td>POST</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/productService/updateProduct.php?productId=12" target="_blank">Update Product</a></td>
                <td>Atualizar informações de um produto</td>
                <td>PUT</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/productService/deleteProduct.php?productId=8" target="_blank">Delete Product</a></td>
                <td>Excluir um produto pelo ID</td>
                <td>DELETE</td>
            </tr>
        </tbody>
    </table>

    <!-- Reservation Section -->
    <h2>Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>Endpoint</th>
                <th>Descrição</th>
                <th>Método</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/reservationService/readReservation.php" target="_blank">Read Reservations</a></td>
                <td>Listar todas as reservas</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/reservationService/readReservation.php?cpf=11199922218" target="_blank">Read Reservation By CPF</a></td>
                <td>Obter reservas pelo CPF</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/reservationService/updateReservation.php?reservationId=4" target="_blank">Update Reservation</a></td>
                <td>Atualizar informações de uma reserva</td>
                <td>PUT</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/reservationService/createReservation.php" target="_blank">Create Reservation</a></td>
                <td>Criar uma nova reserva</td>
                <td>POST</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/reservationService/deleteReservation.php?reservationId=5" target="_blank">Delete Reservation</a></td>
                <td>Excluir uma reserva pelo ID</td>
                <td>DELETE</td>
            </tr>
        </tbody>
    </table>

    <!-- Purchase Section -->
    <h2>Purchase</h2>
    <table>
        <thead>
            <tr>
                <th>Endpoint</th>
                <th>Descrição</th>
                <th>Método</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/purchaseService/readPurchase.php" target="_blank">Read Purchase</a></td>
                <td>Listar ordens de compra</td>
                <td>GET</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/purchaseService/createPurchase.php" target="_blank">Create Purchase</a></td>
                <td>Criar uma nova ordem de compra</td>
                <td>POST</td>
            </tr>
            <tr>
                <td><a href="https://inovadevsapi.onrender.com/service/purchaseService/deletePurchase.php?purchaseId=8" target="_blank">Delete Purchase</a></td>
                <td>Excluir ordem de compra</td>
                <td>DELETE</td>
            </tr>
        </tbody>
    </table>
</body>
</html>

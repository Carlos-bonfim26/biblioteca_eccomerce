<?php
require_once('../src/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Carlos Bonfim">
    <title>Vendas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/adm.css">

    <link rel="shortcut icon" href="../img/logoIcon.png" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="logo da compiloteca"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">

                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="livros.php">Livros registrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="vendas.php">Vendas feitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../src/logout.php">Sair</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="header-adm">
            <h2>Vendas Feitas</h2>
        </div>
        <table>
            <?php
            $sql = "SELECT 
    s.Id_Sale AS ID_Venda,
    s.Date_Sale AS Data_Pedido,
    c.Name_Client AS Cliente,
    GROUP_CONCAT(b.Tittle_book SEPARATOR ', ') AS Produtos_Comprados,
    SUM(io.Quantity) AS Quantidade_Total,
    SUM(io.Value_sale) AS Valor_Total,
    IF(s.statusPayment = 1, 'Pago', 'Pendente') AS Status_Pagamento
FROM sale s
JOIN item_order io ON s.Id_Sale = io.SaleID
JOIN books b ON io.BookID = b.Id_Book
JOIN clients c ON s.ClientID = c.Id_client
GROUP BY s.Id_Sale, s.Date_Sale, c.Name_Client, s.statusPayment
ORDER BY s.Date_Sale DESC";
            $result = $conexao->query($sql);

            if ($result->num_rows > 0) {

            ?>
                <thead>
                    <tr class="vendas">
                        <th>ID</th>
                        <th>Produtos comprados</th>
                        <th>Cliente</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Data pedido</th>
                        <th>Status da venda</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr class="vendas">
                            <td><?= $row['ID_Venda'] ?></td>
                            <td><?= $row['Produtos_Comprados'] ?></td>
                            <td><?= $row['Cliente'] ?></td>
                            <td>R$<?php 
                            echo number_format($row['Valor_Total'], 2, ',', '.');
                            ?></td>
                            <td><?= $row['Quantidade_Total'] ?></td>
                            <td><?= $row['Data_Pedido'] ?></td>
                            <td><?= $row['Status_Pagamento'] ?></td>
                            <td class="actions">
                                <a href='aprovarVenda.php?id=<?= $row['ID_Venda']?>' class="btn btn-success">Aprovar</a>
                            </td>

                        </tr>
                    <?php
                    }
                } else {


                    ?>

                </tbody>
        </table>
        <div class="alert alert-warning">
            <p>Não há livros cadastrados</p>
        </div>
    <?php
                } ?>
    </main>

    <script src="js/script.js"></script>
</body>

</html>
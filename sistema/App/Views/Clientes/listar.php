<?php
/** @var App\Models\Cliente[] $clientes */
?>
<a href="/sistema/clientes/criar">Novo Cliente</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td><?= htmlspecialchars($cliente->getId()) ?></td>
            <td><?= htmlspecialchars($cliente->getNome()) ?></td>
            <td><?= htmlspecialchars($cliente->getEmail()) ?></td>
            <td><?= htmlspecialchars($cliente->getTelefone()) ?></td>
            <td><?= htmlspecialchars($cliente->getEndereco()) ?></td>
            <td>
                <a href="/sistema/clientes/editar/<?= $cliente->getId() ?>">Editar</a> |
                <a href="/sistema/clientes/excluir/<?= $cliente->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

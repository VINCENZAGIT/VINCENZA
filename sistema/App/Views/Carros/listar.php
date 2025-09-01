<?php
/** @var App\Models\Carro[] $carros */
?>
<a href="/sistema/carros/criar">Novo Carro</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Ano</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($carros as $carro): ?>
        <tr>
            <td><?= htmlspecialchars($carro->getId()) ?></td>
            <td><?= htmlspecialchars($carro->getModelo()) ?></td>
            <td><?= htmlspecialchars($carro->getMarca()) ?></td>
            <td><?= htmlspecialchars($carro->getAno()) ?></td>
            <td>
                <a href="/sistema/carros/editar/<?= $carro->getId() ?>">Editar</a> |
                <a href="/sistema/carros/excluir/<?= $carro->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

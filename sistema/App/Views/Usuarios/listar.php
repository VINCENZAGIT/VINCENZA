<?php
/** @var App\Models\Usuario[] $usuarios */
?>
<a href="/sistema/usuarios/criar">Novo Usuário</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario->getId()) ?></td>
            <td><?= htmlspecialchars($usuario->getNome()) ?></td>
            <td><?= htmlspecialchars($usuario->getEmail()) ?></td>
            <td><?= htmlspecialchars($usuario->getSenha()) ?></td>
            <td>
                <a href="/sistema/usuarios/editar/<?= $usuario->getId() ?>">Editar</a> |
                <a href="/sistema/usuarios/excluir/<?= $usuario->getId() ?>">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

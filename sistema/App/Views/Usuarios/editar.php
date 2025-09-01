<?php
/** @var App\Models\Usuario $usuario */
?>
<form method="POST" action="/sistema/usuarios/salvar/<?= $usuario->getId() ?>">
    <label>Nome</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($usuario->getNome()) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($usuario->getEmail()) ?>" required>

    <label>Senha</label>
    <input type="password" name="senha" value="<?= htmlspecialchars($usuario->getSenha()) ?>" required>

    <button type="submit">Atualizar</button>
</form>
<a href="/sistema/usuarios">Voltar</a>

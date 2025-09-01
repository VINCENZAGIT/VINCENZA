<?php
/** @var App\Models\Cliente $cliente */
?>
<form method="POST" action="/sistema/clientes/salvar/<?= $cliente->getId() ?>">
    <label>Nome</label>
    <input type="text" name="nome" value="<?= htmlspecialchars($cliente->getNome()) ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= htmlspecialchars($cliente->getEmail()) ?>" required>

    <label>Telefone</label>
    <input type="text" name="telefone" value="<?= htmlspecialchars($cliente->getTelefone()) ?>" required>

    <label>Endereço</label>
    <input type="text" name="endereco" value="<?= htmlspecialchars($cliente->getEndereco()) ?>" required>

    <button type="submit">Atualizar</button>
</form>
<a href="/sistema/clientes">Voltar</a>

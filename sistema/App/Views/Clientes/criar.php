<?php
// Formulário simples para criar cliente
?>
<form method="POST" action="/sistema/clientes/salvar">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Telefone</label>
    <input type="text" name="telefone" required>

    <label>Endereço</label>
    <input type="text" name="endereco" required>

    <button type="submit">Salvar</button>
</form>
<a href="/sistema/clientes">Voltar</a>

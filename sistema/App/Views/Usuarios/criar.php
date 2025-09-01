<?php ?>
<form method="POST" action="/sistema/usuarios/salvar">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Senha</label>
    <input type="password" name="senha" required>

    <button type="submit">Salvar</button>
</form>
<a href="/sistema/usuarios">Voltar</a>

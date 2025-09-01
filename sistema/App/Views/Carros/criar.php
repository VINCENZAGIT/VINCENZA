<?php ?>
<form method="POST" action="/sistema/carros/salvar">
    <label>Modelo</label>
    <input type="text" name="modelo" required>

    <label>Marca</label>
    <input type="text" name="marca" required>

    <label>Ano</label>
    <input type="number" name="ano" required>

    <label>Preço</label>
    <input type="text" name="preco" required>

    <button type="submit">Salvar</button>
</form>
<a href="/sistema/carros">Voltar</a>

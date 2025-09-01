<?php
/** @var App\Models\Carro $carro */
?>
<form method="POST" action="/sistema/carros/salvar/<?= $carro->getId() ?>">
    <label>Modelo</label>
    <input type="text" name="modelo" value="<?= htmlspecialchars($carro->getModelo()) ?>" required>

    <label>Marca</label>
    <input type="text" name="marca" value="<?= htmlspecialchars($carro->getMarca()) ?>" required>

    <label>Ano</label>
    <input type="number" name="ano" value="<?= htmlspecialchars($carro->getAno()) ?>" required>

    <label>Preço</label>
    <input type="text" name="preco" value="<?= htmlspecialchars($carro->getPreco()) ?>" required>

    <button type="submit">Atualizar</button>
</form>
<a href="/sistema/carros">Voltar</a>

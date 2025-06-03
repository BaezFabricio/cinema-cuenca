<?php
$titulo = $_GET['titulo'] ?? 'Película no encontrada';
$horarios = [
  "Lilo y Stitch" => ["15:00", "18:00", "20:30"],
  "Destino Final: Lazos de Sangre" => ["16:00", "19:30", "22:00"],
  "Misión Imposible: Sentencia Final" => ["14:30", "17:45", "21:00"],
  "Thunderbolts" => ["15:15", "18:30", "21:45"],
  "Karate Kid Leyendas" => ["13:00", "16:00", "19:00"],
  "DEADPOOL & WOLWERINE" => ["17:00", "20:00", "23:00"],
  "Una Película de Minecraft" => ["12:30", "15:45", "19:00"],
  "El Contador 2" => ["14:00", "17:15", "20:30"]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Horarios - <?= htmlspecialchars($titulo) ?></title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1>Horarios para: <?= htmlspecialchars($titulo) ?></h1>
  <div style="text-align:center; margin-top:40px;">
    <?php if (array_key_exists($titulo, $horarios)): ?>
      <?php foreach ($horarios[$titulo] as $hora): ?>
        <div style="margin: 10px; font-size: 18px; color: #f1c40f;"><?= $hora ?></div>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="color: #e74c3c;">No hay horarios disponibles.</p>
    <?php endif; ?>
  </div>
</body>
</html>
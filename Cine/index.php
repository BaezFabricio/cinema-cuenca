<?php 
$peliculas = [
  [
    "titulo" => "Lilo y Stitch",
    "imagen" => "imagenes/lilo.jpg",
    "duracion" => "1h 48m",
    "formatos" => ["2D", "3D"],
    "clasificacion" => "ATP",
    "estreno" => true,
    "precio" => 4500
  ],
  [
    "titulo" => "Destino Final: Lazos de Sangre",
    "imagen" => "imagenes/destino.jpg",
    "duracion" => "1h 50m",
    "formatos" => ["2D"],
    "clasificacion" => "+16",
    "estreno" => true,
    "precio" => 5000
  ],
  [
    "titulo" => "Misión Imposible: Sentencia Final",
    "imagen" => "imagenes/mision.jpg",
    "duracion" => "2h 49m",
    "formatos" => ["2D", "4D"],
    "clasificacion" => "+13",
    "estreno" => true,
    "precio" => 5500
  ],
  [
    "titulo" => "Thunderbolts",
    "imagen" => "imagenes/thunderbolts.jpg",
    "duracion" => "2h 6m",
    "formatos" => ["2D"],
    "clasificacion" => "+13",
    "estreno" => true,
    "precio" => 5000
  ],
  [
    "titulo" => "Karate Kid Leyendas",
    "imagen" => "imagenes/karatekid.jpg",
    "duracion" => "1h 33m",
    "formatos" => ["2D"],
    "clasificacion" => "+13",
    "estreno" => true,
    "precio" => 4500
  ],
  [
    "titulo" => "DEADPOOL & WOLWERINE",
    "imagen" => "imagenes/deadpool.jpg",
    "duracion" => "2h 37m",
    "formatos" => ["2D","3D"],
    "clasificacion" => "+13",
    "estreno" => true,
    "precio" => 5500
  ],
  [
    "titulo" => "Una Película de Minecraft",
    "imagen" => "imagenes/minecraft.jpg",
    "duracion" => "1h 41m",
    "formatos" => ["2D"],
    "clasificacion" => "ATP",
    "estreno" => true,
    "precio" => 5000
  ],
  [
    "titulo" => "El Contador 2",
    "imagen" => "imagenes/elcontador2.png",
    "duracion" => "1h 58m",
    "formatos" => ["2D", "3D"],
    "clasificacion" => "+13",
    "estreno" => true,
    "precio" => 4500
  ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cartelera de Cine</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <nav class="menu">
    <ul>
      <li><a href="../Prueba/index.php">Principal</a></li> 
      <li><a href="#">Tienda</a></li>
      <li><a href="#" class="activo">Cartelera</a></li>
    </ul>
  </nav>

  <h1>Cartelera de Estrenos</h1>

  <div class="cartelera" id="cartelera">
    <?php foreach ($peliculas as $peli): ?>
    <div class="pelicula">
      <img src="<?= $peli['imagen'] ?>" alt="<?= $peli['titulo'] ?>">
      <div class="info">
        <h2><?= $peli['titulo'] ?></h2>
        <p class="duracion"><?= $peli['duracion'] ?></p>
        <p class="formatos"><?= implode(" • ", $peli['formatos']) ?></p>
        <span class="clasificacion"><?= $peli['clasificacion'] ?></span>
        <?php if ($peli['estreno']): ?>
          <div class="btn-estreno">🎬 Horarios</div>
        <?php endif; ?>
        <p class="precio">Precio: $<?= $peli['precio'] ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>


  <div id="vista-horarios" class="vista-horarios"></div>



  <script>
    const horariosPorPelicula = {
      "Lilo y Stitch": ["13:00", "15:30", "18:00"],
      "Destino Final: Lazos de Sangre": ["16:00", "20:00", "22:30"],
      "Misión Imposible: Sentencia Final": ["14:30", "18:30", "21:30"],
      "Thunderbolts": ["12:00", "16:15", "20:45"],
      "Karate Kid Leyendas": ["13:00", "17:00", "21:00"],
      "DEADPOOL & WOLWERINE": ["15:00", "19:00", "23:00"],
      "Una Película de Minecraft": ["10:00", "12:30", "15:00"],
      "El Contador 2": ["11:00", "14:00", "19:30"]
    };

    document.querySelectorAll(".btn-estreno, .pelicula").forEach(el => {
      el.addEventListener("click", function(e) {
        e.stopPropagation();
        const peliDiv = this.closest(".pelicula");
        const titulo = peliDiv.querySelector("h2").textContent;

        const horarios = horariosPorPelicula[titulo] || ["Próximamente"];
        const horariosHTML = horarios.map(h => `<li>${h}</li>`).join("");

        document.getElementById("cartelera").style.display = "none";
        const vista = document.getElementById("vista-horarios");
        vista.style.display = "block";
        vista.innerHTML = `
          <h2>Horarios para: ${titulo}</h2>
          <ul>${horariosHTML}</ul>
          <div class="btn-volver" onclick="volver()">⬅ Volver a la cartelera</div>
        `;
      });
    });

    function volver() {
      document.getElementById("vista-horarios").style.display = "none";
      document.getElementById("cartelera").style.display = "grid";
    }
  </script>
</body>
</html>

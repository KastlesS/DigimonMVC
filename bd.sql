drop database  if exists digimon;

CREATE database digimon;
commit;

USE  digimon;

CREATE TABLE `users` (
  'id' (INT, PRIMARY KEY, AUTO_INCREMENT)
  'nick' (VARCHAR(50), UNIQUE, NOT NULL)
  'password' (VARCHAR(255), NOT NULL) 
  'partidas_ganadas' (INT, DEFAULT 0) 
  'partidas_perdidas' (INT, DEFAULT 0) 
  'digievoluciones_disponibles' (INT, DEFAULT 0) 
  'created_at' (DATETIME, DEFAULT CURRENT_TIMESTAMP)
  'admin' (TINYINT(1), NOT NULL, DEFAULT 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `digimon` (
  'id' (INT, PRIMARY KEY, AUTO_INCREMENT)
  'nombre' (VARCHAR(50), UNIQUE, NOT NULL)
  'ataque' (INT, NOT NULL)
  'defensa' (INT, NOT NULL)
  'tipo' (ENUM('Vacuna', 'Virus', 'Animal', 'Planta', 'Elemental'), NOT NULL)
  'nivel' (TINYINT, NOT NULL) // 1 a 4
  'siguiente_evolucion_id' (INT, NULL, FOREIGN KEY REFERENCES digimones(id))
  'imagen' (VARCHAR(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `digimones_usuario` (
  'id' (INT, PRIMARY KEY, AUTO_INCREMENT)
  'usuario_id' (INT, FOREIGN KEY REFERENCES usuarios(id))
  'digimon_id' (INT, FOREIGN KEY REFERENCES digimones(id))
  'created_at' (DATETIME, DEFAULT CURRENT_TIMESTAMP)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `equipo_usuario` (
  'id' (INT, PRIMARY KEY, AUTO_INCREMENT)
  'usuario_id' (INT, FOREIGN KEY REFERENCES usuarios(id))
  'digimon_id' (INT, FOREIGN KEY REFERENCES digimones(id))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



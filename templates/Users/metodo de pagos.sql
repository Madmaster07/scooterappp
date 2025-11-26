
DROP TABLE IF EXISTS pagos;
DROP TABLE IF EXISTS metodo_de_pago;

CREATE TABLE metodo_de_pago (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,

    metodo VARCHAR(50) NOT NULL,

 
    numero_tarjeta VARCHAR(20) NULL,
    fecha_vencimiento DATE NULL,
    cvv VARCHAR(10) NULL,

    es_predeterminado TINYINT(1) NOT NULL DEFAULT 0,

    fecha_registro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_metodo_pago_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Índice para buscar rápido los métodos de un usuario
CREATE INDEX idx_metodo_pago_user_id ON metodo_de_pago(user_id);
CREATE TABLE pagos (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    viaje_id INT UNSIGNED NOT NULL,
    metodo_pago_id INT UNSIGNED NOT NULL,

    monto DECIMAL(10,2) NOT NULL,
    moneda VARCHAR(10) NOT NULL DEFAULT 'MXN',

    estado_pago VARCHAR(50) NOT NULL DEFAULT 'pendiente',


    referencia_externa VARCHAR(100) NULL, 

    fecha_pago DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_pagos_viajes
        FOREIGN KEY (viaje_id) REFERENCES viajes(id)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

    CONSTRAINT fk_pagos_metodo_pago
        FOREIGN KEY (metodo_pago_id) REFERENCES metodo_de_pago(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Índices para consultas frecuentes
CREATE INDEX idx_pagos_viaje_id ON pagos(viaje_id);
CREATE INDEX idx_pagos_metodo_pago_id ON pagos(metodo_pago_id);
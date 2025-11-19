CREATE TABLE users (
    id INT,
    username VARCHAR(50),
    password VARCHAR(255),
    rol VARCHAR(50),
    nombre VARCHAR(100),
    apellidos VARCHAR(100),
    correo VARCHAR(150),
    telefono VARCHAR(20),
    sexo VARCHAR(20),
    fecha_de_registro DATETIME
);

CREATE TABLE metodo_de_pago (
    id INT,
    user_id INT,
    metodo VARCHAR(50),
    numero_tarjeta VARCHAR(20),
    fecha_vencimiento DATE,
    cvv VARCHAR(10)
);

CREATE TABLE estaciones (
    id INT,
    nombre VARCHAR(100),
    direccion VARCHAR(255),
    latitud DECIMAL(10,6),
    longitud DECIMAL(10,6)
);

CREATE TABLE modelos (
    id INT,
    nombre VARCHAR(100),
    capacidad INT,
    velocidad_maxima DECIMAL(5,2),
    autonomia_km DECIMAL(6,2),
    descripcion TEXT
);

CREATE TABLE vehiculos (
    id INT,
    estacion_id INT,
    modelo_id INT,
    tipo VARCHAR(50),
    marca VARCHAR(50),
    num_serie VARCHAR(100),
    tarifa_minuto DECIMAL(10,2),
    descripcion TEXT,
    estado VARCHAR(50),
    nivel_bateria INT,
    latitud DECIMAL(10,6),
    longitud DECIMAL(10,6)
);

CREATE TABLE promociones (
    id INT,
    codigo VARCHAR(50),
    descripcion TEXT,
    porcentaje_descuento DECIMAL(5,2),
    fecha_inicio DATE,
    fecha_fin DATE
);

CREATE TABLE viajes (
    id INT,
    user_id INT,
    vehiculo_id INT,
    estacion_id INT,
    metodo_pago_id INT,
    promocion_id INT,
    fecha_inicio DATETIME,
    fecha_fin DATETIME,
    duracion_min INT,
    costo_total DECIMAL(10,2),
    estado VARCHAR(50)
);

CREATE TABLE pagos (
    id INT,
    viaje_id INT,
    metodo_pago_id INT,
    monto DECIMAL(10,2),
    fecha_pago DATETIME,
    estado_pago VARCHAR(50)
);


--extraer datos json--

SELECT JSON_UNQUOTE(JSON_EXTRACT(telefonos, '$.telf_2')) AS telf
FROM clientes;

--inner join para reporte--

SELECT 
    asistencias.id_cliente, 
    clientes.nombre AS nombre,
    clientes.identificacion AS cedula,
    clientes.telefonos AS telefono,
    clientes.genero AS genero,
    asistencias.id_reunion, 
    reuniones.fecha AS fecha,
    reuniones.nombre AS nombre_reunion,
    reuniones.descripcion AS descripcion
FROM asistencias
INNER JOIN clientes ON asistencias.id_cliente = clientes.id
INNER JOIN reuniones ON asistencias.id_reunion = reuniones.id;

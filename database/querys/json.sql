
--extraer datos json--

SELECT JSON_UNQUOTE(JSON_EXTRACT(telefonos, '$.telf_2')) AS telf
FROM clientes;

